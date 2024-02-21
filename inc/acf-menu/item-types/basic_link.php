<?php 
    if ($link = get_sub_field('basic_link', false, true, true)) :
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; 
    
        $custom_classes = get_sub_field('custom_classes', false, true, true);
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : ''; 
?>
        
        <li <?= $id_attribute; ?> class="main-nav__list-item main-nav__basic-link mobile-expandable <?= esc_attr($custom_classes); ?>">
            <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </li>
    <?php
    endif;
?>