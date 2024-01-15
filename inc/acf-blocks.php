<?php

//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
//  wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

// function acf_init_blocks() {
//   if( function_exists('acf_register_block') ) {
//     require_once get_template_directory() . '/inc/acf-blocks/post-blocks.php';           
//   }
// }
// add_action('acf/init', 'acf_init_blocks');

/** 
 * Register ACF blocks via block.json 
 */
function register_acf_blocks() {
  register_block_type( get_template_directory() . '/build/blocks/post-blocks');
}
add_action( 'init', 'register_acf_blocks', 5 );