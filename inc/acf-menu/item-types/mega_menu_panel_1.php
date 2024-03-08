<?php 

    if ($mega_menu_panel_1 = get_sub_field('mega_menu_panel_1')) :
        $mega_menu_item_portfolio_count = get_sub_field('mega_menu_panel_portfolio_count');
        $menu_item_label = $mega_menu_panel_1['menu_item_label'];
        $featured_post = $mega_menu_panel_1['featured_post'];
        $featured_post_id = $featured_post->ID;
        $featured_post_title = $featured_post->post_title;
        $featured_post_permalink = get_permalink($featured_post_id);
        
        $featured_categories = $mega_menu_panel_1['featured_categories'];
        $link_in_the_corner = $mega_menu_panel_1['link_in_the_corner'];
        $custom_classes = get_sub_field('custom_classes', false, true, true);
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : ''; 
?>
        <li <?= $id_attribute; ?> class="main-nav__list-item main-nav__has-children mobile-expandable main-nav__mega-menu-panel-1 <?= esc_html($custom_classes); ?>"><!-- add .active if you want the menu always visible -->
            
            
            <span class="main-nav__item-name">
                <?php if ($mega_menu_item_portfolio_count) : ?>
                    <span class="main-nav__portfolio-count">
                        <?php
                            echo wp_count_posts( 'project' )->publish;
                        ?>
                    </span>
                <?php endif; ?>
                <?php echo esc_html( $menu_item_label ); ?>
            </span>
            <div class="panel-1-container">
                <div class="panel-1-container__post">
                    <div class="panel-1-container__row-1">
                        <div class="panel-1-container__col-1">
                            <a class="panel-1-container__back mega-menu-panel-back">
                                <?php echo esc_html( $menu_item_label ); ?>
                            </a>
                            <div class="panel-1-container__image">
                                <?php echo get_the_post_thumbnail($featured_post_id); ?>
                            </div>
                        </div>
                        <div class="panel-1-container__col-2">
                            <h4 class="panel-1-container__featured-post-heading">Featured post</h4>
                            <div class="panel-1-container__post-meta">
                                <ul class="panel-1-container__post-categories">
                                    <?php 
                                        foreach(get_the_category($featured_post_id) as $category) : ?>
                                            <li class="panel-1-container__post-category">
                                                <a class="panel-1-container__post-category-link" href="<?= get_category_link($category->term_id); ?>">
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
                            <a class="panel-1-container__post-title-link" href="<?= $featured_post_permalink; ?>">
                                <h3 class="panel-1-container__post-title-text"><?php echo esc_html( $featured_post_title ); ?></h3>
                            </a>
                            <a href="<?= $featured_post_permalink; ?>" class="panel-1-container__post-button button button--light-blue button--smaller">Read the post</a>
                        </div>
                    </div>
                    <div class="panel-1-container__row-2">
                        <div class="panel-1-container__col-1">
                            <?php if ($featured_categories) : ?>
                                <h4 class="panel-1-container__featured-categories-title">Featured blog categories</h4>
                                <ul class="panel-1-container__featured-categories-list">
                                    <?php 
                                        foreach($featured_categories as $featured_category) : ?>
                                            <li class="panel-1-container__featured-category">
                                                <a class="panel-1-container__featured-category-link" href="<?= get_category_link($featured_category['category_url']); ?>">
                                                    <?= $featured_category['category_name']; ?>
                                                </a>
                                            </li>
                                    <?php
                                        endforeach;
                                    ?>
                                </ul>
                            <?php endif ; ?>
                        </div>
                        <div class="panel-1-container__col-2">
                            <a class="panel-1-container__link" href="<?= $link_in_the_corner['url']; ?>"><?= $link_in_the_corner['title']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php
    endif;
?>