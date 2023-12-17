<?php

acf_register_block(array(
  'name'              => 'video-file',
  'title'             => __('Video'),
  'description'       => __('A block with video player'),
  'render_callback'   => 'video_file__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'video', 'player' ),
));

function video_file__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}