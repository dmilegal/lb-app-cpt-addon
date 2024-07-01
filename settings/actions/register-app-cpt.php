<?
function register_app_cpt()
{
	$labels = array(
		'name'               => __('Applications', 'text-domain'),
		'singular_name'      => __('Application', 'text-domain'),
		'add_new'            => _x('Add New Application', 'text-domain', 'text-domain'),
		'add_new_item'       => __('Add New Application', 'text-domain'),
		'edit_item'          => __('Edit Application', 'text-domain'),
		'new_item'           => __('New Application', 'text-domain'),
		'view_item'          => __('View Application', 'text-domain'),
		'search_items'       => __('Search Applications', 'text-domain'),
		'not_found'          => __('No Applications found', 'text-domain'),
		'not_found_in_trash' => __('No Applications found in Trash', 'text-domain'),
		'parent_item_colon'  => __('Parent Application:', 'text-domain'),
		'menu_name'          => __('Applications', 'text-domain'),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'taxonomies'          => array('app-type'),
		'description'         => 'description',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			// 'trackbacks',
			// 'comments',
			// 'revisions',
			'page-attributes',
			// 'post-formats',
		),
	);

	register_post_type( 'lb-application', $args );
}

add_action('init', 'register_app_cpt');
