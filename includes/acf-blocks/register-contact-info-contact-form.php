<?php

acf_register_block(array(
  'name'              => 'contact-info-contact-form',
  'title'             => __('Contact form'),
  'description'       => __('A block with video player'),
  'render_callback'   => 'contact_info_contact_form__callback',
  'category'          => 'custom',
  'icon'              => 'admin-comments',
  'keywords'          => array( 'contact', 'form', 'address', 'email', 'phone' ),
));

function contact_info_contact_form__callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
    
  if( file_exists( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/blocks/{$slug}/{$slug}.php") );
  }
}