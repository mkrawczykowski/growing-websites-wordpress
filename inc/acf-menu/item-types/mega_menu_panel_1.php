<?php 

    if ($mega_menu_panel_1 = get_sub_field('mega_menu_panel_1')) :

        $menu_item_label = $mega_menu_panel_1['menu_item_label'];
        $featured_post = $mega_menu_panel_1['featured_post'];
        $featured_post_id = $featured_post->ID;
        $featured_post_title = $featured_post->post_title;
        $featured_post_permalink = get_permalink($featured_post_id);
        
        $featured_categories = $mega_menu_panel_1['featured_categories'];
        $featured_clink_in_the_cornerategories = $mega_menu_panel_1['link_in_the_corner'];
        $custom_classes = get_sub_field('custom_classes');
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : ''; 
?>
        <li <?= $id_attribute; ?> class="main-nav__list-item main-nav__has-children main-nav__mega-menu-panel-1 <?= esc_html($custom_classes); ?>">
            <span class="">
                <?php echo esc_html( $menu_item_label ); ?>
            </span>
            <div class="main-nav__mega-menu-panel-1-container">
                <div class="panel-1-container__post">
                    <div class="panel-1-container__post-row-1">
                        <div class="panel-1-container__post-col-1">
                            <?php wp_get_attachment_image($featured_post_id); ?>
                        </div>
                        <div class="panel-1-container__post-col-2">
                            <div class="panel-1-container__post-meta">
                                <ul class="panel-1-container__post-categories">
                                    <?php 
                                        foreach(get_the_category($featured_post_id) as $category) : ?>
                                            <li>
                                                <a href="<?= get_category_link($category->term_id); ?>">
                                                    <?= $category->name; ?>
                                                </a>
                                            </li>
                                    <?php
                                        endforeach;
                                    ?>
                                </ul>
                                <span class="panel-1-container__post-date">
                                    <?= get_the_date('F d Y', $featured_post_id); ?>
                                </span>
                            </div>
                        </div>
                    
                        <a class="panel-1-container__post-title-link" href="<?= $featured_post_permalink; ?>">
                            <h3 class="panel-1-container__post-title-text"><?php echo esc_html( $featured_post_title ); ?></h3>
                        </a>
                        <a href="<?= $featured_post_permalink; ?>" class="panel-1-container__post-button">Read more</a>
                    </div>
                    <div class="panel-1-container__post-row-2">
                        <div class="panel-1-container__post-col-1">
                            <h4 class="panel-1-container__featured-categories-title">Featured blog categories</h4>
                            <ul class="panel-1-container__featured-categories-list">
                                <li class="panel-1-container__featured-category-item">
                                    <a class="panel-1-container__featured-category-link"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-1-container__post-col-2">
                            <a class="panel-1-container__link" href="">Go to blog page</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php
    endif;
?>