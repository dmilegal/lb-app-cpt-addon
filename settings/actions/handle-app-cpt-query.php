<?
function casino_app_handle_tags($query)
{

  if ($query->is_main_query() && !is_admin()) {


    $casino_childcpt_slug = get_query_var('casino_app', false);
    $bookmaker_childcpt_slug = get_query_var('bookmaker_app', false);
    $appname_slug = get_query_var('app_type', false);

    if (($bookmaker_childcpt_slug || $casino_childcpt_slug) && $appname_slug) {
      $query_list = [];
      if ($casino_childcpt_slug) {
        $parent_post = get_page_by_path($casino_childcpt_slug, OBJECT, 'casino');
        $query_list[] = [
          'key' => 'parent_casino',
          'value' =>  $parent_post->ID,
        ];
      }

      if ($bookmaker_childcpt_slug) {
        $parent_post = get_page_by_path($bookmaker_childcpt_slug, OBJECT, 'bookmaker');
        $query_list[] = [
          'key' => 'parent_bookmaker',
          'value' =>  $parent_post->ID,
        ];
      }

      $app_query = new WP_Query(array(
        'post_type' => 'lb-application',
        'posts_per_page' => 1,
        'meta_query' => array(
          'relation' => 'OR',
          ...$query_list
        ),
        'tax_query' => array(
          'relation' => 'OR',
          array(
            'taxonomy' => 'app-type',
            'field' => 'slug',
            'terms' => $appname_slug
          )
        )
      ));
      $apps = $app_query->get_posts();

      if ($apps) {
        $query->set('name', $apps[0]->post_name);
      }
    }
  }
}
add_action('pre_get_posts', 'casino_app_handle_tags');
