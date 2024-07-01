<?
function bookmaker_app_rewrite_rules()
{
  add_rewrite_tag('%bookmaker_app%', '([^&]+)');
  add_rewrite_tag('%app_type%', '([^&]+)');
  add_rewrite_rule('bookmaker/([^/]+)/([^/]+)/?$', 'index.php?post_type=lb-application&name=__mock__&bookmaker_app=$matches[1]&app_type=$matches[2]', 'top');
}

add_action('init', 'bookmaker_app_rewrite_rules');