<?php 
    if ($button = get_sub_field('button')) :
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        
        $align_right_class = get_sub_field('align_to_right') ? 'main-nav__list-item--right' : '';
        $custom_classes = get_sub_field('custom_classes');
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : ''; 
?>

    <li <?= $id_attribute; ?> class="main-nav__list-item main-nav__button mobile-expandable <?= $align_right_class . ' ' . esc_html($custom_classes); ?>">
        <a class="button button--transparent-light" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
    </li>

<?php
    endif;
?>