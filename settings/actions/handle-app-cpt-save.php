<?
function check_duplicate_childcpt_before_save($post_id, $post, $update)
{
  // Если это авторевизии или автосохранения, то не выполняем код
  if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
    return;
  }

  // Получаем родительский пост parentcpt
  $parent_post_id = get_field('parent_casino', $post->ID);

  // Получаем категорию appname
  $terms = wp_get_post_terms($post->ID, 'app-type');
  if (empty($terms) || is_wp_error($terms)) {
    // Если нет категории, пропускаем
    return;
  }
  $appname_term_id = $terms[0]->term_id;

  // Проверяем, есть ли другие посты с таким же родительским parentcpt и категорией appname
  $args = array(
    'post_type' => 'lb-application',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => array($post_id), // исключаем текущий пост из поиска
    'meta_query' => array(
      array(
        'key' => 'parent_casino',
        'value' => $parent_post_id,
      ),
    ),
    'tax_query' => array(
      array(
        'taxonomy' => 'app-type',
        'field'    => 'term_id',
        'terms'    => $appname_term_id,
      ),
    ),
  );
  $query = new WP_Query($args);

  if ($query->have_posts()) {
    // Если найдены дубликаты, делайте здесь необходимые действия.
    // Например, вы можете удалить пост или установить его в черновик.
    // wp_delete_post($post_id);
    wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
    wp_die('Ошибка: уже сть похожий пост.');
  }
}

//add_action('save_post_lb-application', 'check_duplicate_childcpt_before_save', 10, 3);

function check_app_cpt_fields($post_id, $post, $update)
{
  if (
    wp_is_post_revision($post_id) ||
    wp_is_post_autosave($post_id) ||
    (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  ) {
    return; // если это не наш тип поста, просто возвращаемся
  }


  // проверяем значение acf поля parent_casino
  $parent_casino = get_field('parent_casino', $post_id);

  //  проверяем, есть ли термины в таксономии 'app-type'
  $has_app_type_terms = has_term('', 'app-type', $post_id);

  // если какое-то из условий не выполнено, выводим ошибку
  if (/*!$parent_casino ||*/ !$has_app_type_terms) {
    $err_fields = [];
    // if (!$parent_casino)
    //   $err_fields[] = "parent casino";
    if (!$has_app_type_terms)
      $err_fields[] = "Types of Apps category";

    wp_die("Please select the " . implode(', ', $err_fields) . '.', 'Error on saving');
  }
}

// Вешаем нашу функцию на action hook save_post с приоритетом 10 и 3 аргументами, которые будут переданы в функцию.
//add_action('save_post_lb-application', 'check_app_cpt_fields', 9999, 3);
