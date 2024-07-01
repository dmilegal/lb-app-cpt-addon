<?

add_filter('manage_lb-application_posts_columns', 'set_custom_edit_lb_app_columns');
function set_custom_edit_lb_app_columns($columns)
{
	$columns['parent_casino'] = __('Parent Casino', 'aces');
	$columns['parent_bookmaker'] = __('Parent Bookmaker', 'aces');
	return $columns;
}

function lb_app_column_content($column, $post_id)
{
	switch ($column) {
		case 'parent_casino':
			$parent_casino = get_post_meta($post_id, 'parent_casino', true);
			if (!empty($parent_casino)) { ?>
				<a target="_blank" href="<?= get_edit_post_link($parent_casino) ?>"><?= get_the_title($parent_casino) ?></a>
			<? }
			break;
		case 'parent_bookmaker':
			$parent_bookmaker = get_post_meta($post_id, 'parent_bookmaker', true);
			if (!empty($parent_bookmaker)) { ?>
				<a target="_blank" href="<?= get_edit_post_link($parent_bookmaker) ?>"><?= get_the_title($parent_bookmaker) ?></a>
<? }
			break;
	}
}
add_action('manage_lb-application_posts_custom_column', 'lb_app_column_content', 10, 2);
