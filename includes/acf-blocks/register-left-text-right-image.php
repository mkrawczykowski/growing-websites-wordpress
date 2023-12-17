<?php

acf_register_block(array(
  'name'              => 'left-text-right-image',
  'title'             => __('Left text, right image'),
  'description'       => __('A block perfect for hero section'),
  'render_callback'   => 'left_text_right_image__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'text', 'image', 'hero' ),
));

function left_text_right_image__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}