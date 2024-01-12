<?php

if( have_rows('main_menu', 'options') ):
    while( have_rows('main_menu', 'options') ) : the_row();
        $menu_item_type = get_sub_field('menu_item_type');
        
        $possible_file = get_template_directory() . '/inc/acf-menu/item-types/' . $menu_item_type . '.php';
        if( file_exists( $possible_file ) ){
            include( $possible_file );
        }
    endwhile;
endif;