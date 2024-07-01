<?
function register_app_type_taxonomy()
{
  register_taxonomy(
    'app-type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    ['lb-application'],             // post type name
    array(
      'label' => 'Types of Apps', // display name
      'public' => false,
      'show_in_nav_menus' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_tagcloud' => true,
      'hierarchical' => true,
      'show_admin_column' => true,
      'update_count_callback' => '',
      'rewrite' => true,
      'query_var' => true,
      'capabilities' => array(),
    )
  );
}

add_action( 'init', 'register_app_type_taxonomy' );