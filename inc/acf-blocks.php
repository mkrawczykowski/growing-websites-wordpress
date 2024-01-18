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

$GLOBALS['gw_gutenberg_blocks_array_with_scripts_gw'] = array(
  array(
    'block-name' => 'post-blocks', 
    'block-scripts' => array('checkbox-dropdowns-filters', 'another-test-script', 'and-another-one-script')
  ),
  array(
    'block-name' => 'portfolio-experience', 
    'block-scripts' => array('checkbox-dropdowns-filters', 'another-test-script', 'and-another-one-script')
  )
);
 
function register_acf_blocks() {
  register_block_type( get_template_directory() . '/build/blocks/post-blocks');
  register_block_type( get_template_directory() . '/build/blocks/portfolio-experience');
}
add_action( 'init', 'register_acf_blocks', 5 );