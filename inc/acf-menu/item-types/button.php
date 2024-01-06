<?php 
    if ($button = get_sub_field('button')) :
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self'; ?>
        
        <li>
            <a class="" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
        </li>
    <?php
    endif;
?>