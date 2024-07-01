<?
function casino_app_rewrite_rules()
{
  add_rewrite_tag('%casino_app%', '([^&]+)');
  add_rewrite_tag('%app_type%', '([^&]+)');
  add_rewrite_rule('casino/([^/]+)/([^/]+)/?$', 'index.php?post_type=lb-application&name=__mock__&casino_app=$matches[1]&app_type=$matches[2]', 'top');
}

add_action('init', 'casino_app_rewrite_rules');