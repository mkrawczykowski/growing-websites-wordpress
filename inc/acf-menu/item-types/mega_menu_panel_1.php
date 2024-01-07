<?php 

    if ($mega_menu_panel_1 = get_sub_field('mega_menu_panel_1')) :

        $menu_item_label = $mega_menu_panel_1['menu_item_label'];
        $custom_classes = get_sub_field('custom_classes');
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : ''; 
?>
        <li <?= $id_attribute; ?> class="main-nav__list-item main-nav__has-children main-nav__mega-menu-panel-1 <?= esc_html($custom_classes); ?>">
            <span class="">
                <?php echo esc_html( $menu_item_label ); ?>
            </span>
            <div class="main-nav__mega-menu-panel-1-container">
                sssss
            </div>
        </li>
    <?php
    endif;
?>