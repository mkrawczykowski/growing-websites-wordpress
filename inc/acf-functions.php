<?php
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page('Content settings');
  acf_add_options_page('Custom main menu');
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
  $path = get_stylesheet_directory() . '/json-acf';
 
  return $path;
}
