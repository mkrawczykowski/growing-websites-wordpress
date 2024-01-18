<?php

function disable_classic_theme_styles() {
    wp_deregister_style('classic-theme-styles');
    wp_dequeue_style('classic-theme-styles');
}
add_filter('wp_enqueue_scripts', 'disable_classic_theme_styles', 100);


function my_scripts(){
  wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/build/theme/index.css');
  wp_enqueue_script('main-scripts', get_stylesheet_directory_uri() . '/build/theme/index.js');

  $global_blocks_array = $GLOBALS['gw_gutenberg_blocks_array_with_scripts_gw'];

  if (is_array($global_blocks_array)){
    foreach($global_blocks_array as $block){
        
      $global_scripts_array = $block['block-scripts'];

      if (is_array($global_scripts_array)){
        foreach($global_scripts_array as $script){
          wp_enqueue_script($script, get_stylesheet_directory_uri() . '/build/scripts/' . $script . '.js'); 
        }
      }
    }
  }
  
}
add_action('wp_enqueue_scripts', 'my_scripts');