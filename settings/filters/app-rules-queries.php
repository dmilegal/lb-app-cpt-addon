<?
function casino_app_query_vars_filter($vars) {
  $vars[] = 'casino_app';
  $vars[] = 'app_type';
  $vars[] = 'bookmaker_app';
  return $vars;
}

add_filter('query_vars', 'casino_app_query_vars_filter');