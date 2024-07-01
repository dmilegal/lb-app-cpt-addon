<?
add_action('acf/include_fields', function () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array(
    'key' => 'group_660b34dd51901',
    'title' => 'App Parent',
    'fields' => array(
      array(
        'key' => 'field_660b34dd4d17d',
        'label' => 'Parent casino',
        'name' => 'parent_casino',
        'aria-label' => '',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'casino',
        ),
        'post_status' => array(
          0 => 'publish',
          1 => 'draft',
        ),
        'taxonomy' => '',
        'return_format' => 'id',
        'multiple' => 0,
        'allow_null' => 1,
        'bidirectional' => 0,
        'ui' => 1,
        'bidirectional_target' => array(),
      ),
      array(
        'key' => 'field_663bd715115ab',
        'label' => 'Parent bookmaker',
        'name' => 'parent_bookmaker',
        'aria-label' => '',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => array(
          0 => 'bookmaker',
        ),
        'post_status' => array(
          0 => 'publish',
          1 => 'draft',
        ),
        'taxonomy' => '',
        'return_format' => 'id',
        'multiple' => 0,
        'allow_null' => 1,
        'bidirectional' => 0,
        'ui' => 1,
        'bidirectional_target' => array(),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'lb-application',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));
});
