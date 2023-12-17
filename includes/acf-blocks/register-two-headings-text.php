<?php

acf_register_block(array(
  'name'              => 'two-headings-text',
  'title'             => __('Two headings and text'),
  'description'       => __('Two headings and a paragraph of text'),
  'render_callback'   => 'two_headings_text__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'heading', 'text', 'paragraph' ),
));

function two_headings_text__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}