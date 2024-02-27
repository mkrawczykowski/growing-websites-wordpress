<?php defined('ABSPATH') or die; ?>

<?php
  $posts_per_page = get_field('posts_per_page', false, true, true);
  $portfolio_filters = get_field('portfolio_filters', false, true, true);
  $GLOBALS['global_active_portfolio_filters'] = [];

  //margins for the block
  $margin_top_small = get_field('margin_top_small', false, true, true);
  $margin_bottom_small = get_field('margin_bottom_small', false, true, true);
  $breakpoints = get_field('breakpoints', false, true, true);
  
  generate_margins_styles_for_section('post-boxes', $margin_top_small, $margin_bottom_small, $breakpoints);
?>

<section class="portfolio-experience">
    <div class="container">
        <div class="portfolio-experience__filters">
            <?php
                if( have_rows('portfolio_filters') ):
                    while( have_rows('portfolio_filters') ) : the_row();
                        $filter_name = get_sub_field('filter_name', false, true, true);
                        $taxonomy_slug = get_sub_field('taxonomy_slug', false, true, true);
                        $this_taxonomy_exists = taxonomy_exists($taxonomy_slug);
                        $filter_type = get_sub_field('filter_type', false, true, true);
                        $template_path =  'template-parts/filters/filter-'. $filter_type. '.php';
                        $template_exists = locate_template($template_path, false, false);
                        $items_in_reverse_order = get_sub_field('items_in_reverse_order', false, true, true);
                        $enable_change_filtering_type = get_sub_field('enable_change_filtering_type', false, true, true);
                        $default_filtering_type = get_sub_field('default_filtering_type', false, true, true);
                        $default_filtering_type_label = get_sub_field('default_filtering_type_label', false, true, true);

                        if ($this_taxonomy_exists && $template_exists) : ?>

                            <?php
                                $active_terms_in_this_filter = get_sub_field('active_terms_in_this_filter', false, true, true);
                                $active_terms_in_this_filter_array = get_existing_terms_list(explode(",", $active_terms_in_this_filter), $taxonomy_slug);
                                $container_width = get_sub_field('full_width') ? 'full-width' : 'half-width';
                            ?>

                            <div class="portfolio-experience__filters-container <?= $container_width ?>">
                                <?php
                                    $args = [
                                        'filter_name' => $filter_name,
                                        'active_terms_in_this_filter_array' => $active_terms_in_this_filter_array,
                                        'taxonomy_slug' => $taxonomy_slug,
                                        'items_in_reverse_order' => $items_in_reverse_order,
                                        'enable_change_filtering_type' => $enable_change_filtering_type,
                                        'default_filtering_type' => $default_filtering_type,
                                        'default_filtering_type_label' => $default_filtering_type_label,
                                    ];

                                    echo get_template_part('template-parts/filters/filter', $filter_type, $args);
                                ?>
                            </div>
                        <?php endif;

                        if (!$this_taxonomy_exists || !$template_exists)  : ?>
                        <?php endif;
                    endwhile;
                endif;
            ?>            
        </div>

        <a class="button" href="#" id="js-portfolio-experience-apply-filters">Apply filters</a> 
    </div>
    <div class="posts-list">
        <?php
        $global_active_portfolio_filters = $GLOBALS['global_active_portfolio_filters'];

        $active_filters_taxonomies = array_keys($global_active_portfolio_filters);

        $args_test = array(
            'post_type'   => 'project',
            'fields'      => 'ids',
            'numberposts' => -1,
            'tax_query'   => array(
            'relation'    => 'AND',
            )
        );

    if ($active_filters_taxonomies){
        foreach($active_filters_taxonomies as $active_filters_taxonomy) :
            $args_test['tax_query'][] = array(
                'taxonomy' => $active_filters_taxonomy,
                'field'    => 'term_id',
                'terms'    => $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'],
                'operator' => $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type']
            );
        endforeach;
    }

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query($args_test);


    if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post(); 
        get_template_part('template-parts/post','box',
            array(
                'post_id'           => get_the_ID(),
                'date'              => 'year',
                'category_taxonomy' => 'project-category',
                'tag_taxonomy'      => 'project-tag',
            )
        );
    endwhile; ?>

    <div class="pagination">
        <?php 
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
        ?>
    </div>

    <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        </div>
    </div>
</section>