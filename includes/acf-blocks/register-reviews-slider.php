<?php

acf_register_block(array(
  'name'              => 'reviews-slider',
  'title'             => __('Reviews slider'),
  'description'       => __('A block with reviews slider'),
  'render_callback'   => 'reviews_slider__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'reviews', 'slider' ),
));

function reviews_slider__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}