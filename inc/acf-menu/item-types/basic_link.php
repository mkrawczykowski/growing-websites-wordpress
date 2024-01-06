<?php 
    if ($link = get_sub_field('basic_link')) :
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        
        <li class="main-nav__basic-link">
            <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </li>
    <?php
    endif;
?>