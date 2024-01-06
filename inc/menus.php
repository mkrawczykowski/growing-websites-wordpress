<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Nawigacja w stopce' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
?>