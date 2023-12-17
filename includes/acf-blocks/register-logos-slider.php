<?php

acf_register_block(array(
  'name'              => 'logos-slider',
  'title'             => __('Logos slider'),
  'description'       => __('A block perfect to display a set of logos with a small text above'),
  'render_callback'   => 'logos_slider__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'logos', 'slider' ),
));

function logos_slider__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}