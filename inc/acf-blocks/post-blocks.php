<?php

acf_register_block(array(
  'name'              => 'post-blocks',
  'title'             => __('Post blocks'),
  'description'       => __('A list of posts (from category, previous, etc.)'),
  'render_callback'   => 'post_blocks__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'post', 'posts', 'category' ),
));

function post_blocks__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}