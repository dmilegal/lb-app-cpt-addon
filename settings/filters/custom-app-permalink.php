<?
function custom_app_cpt_permalink($post_link, $post)
{
  if ($post->post_type != 'lb-application')
    return $post_link;

  $type = "casino";
  if (get_field('parent_bookmaker', $post->ID)) {
    $type = "bookmaker";
  }
  // Получить родительский пост (parentcpt)
  if ($type === "bookmaker") {
    $parent_post_id = get_field('parent_bookmaker', $post->ID);
  } else {
    $parent_post_id = get_field('parent_casino', $post->ID);
  }
  
  $parent_post = get_post($parent_post_id);

  // Получить категорию (appname)
  $terms = wp_get_post_terms($post->ID, 'app-type');


  if (!empty($terms) && !is_wp_error($terms)) {
    $term_slug = $terms[0]->slug;
    
    // Строим новый URL
    if ($type === "bookmaker") {
      $post_link = home_url(user_trailingslashit('/bookmaker/' . $parent_post->post_name . '/' . $term_slug));
    } else {
      $post_link = home_url(user_trailingslashit('/casino/' . $parent_post->post_name . '/' . $term_slug));
    }
    
  }

  return $post_link;
}

add_filter('post_type_link', 'custom_app_cpt_permalink', 10, 2);
