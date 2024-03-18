<?php defined('ABSPATH') or die; ?>

<?php
  $posts_per_page = get_field('posts_per_page', false, true, true);
  $portfolio_filters = get_field('portfolio_filters', false, true, true);
  $GLOBALS['global_active_portfolio_filters'] = [];

  //margins for the block
  $margin_top_small = get_field('margin_top_small', false, true, true);
  $margin_bottom_small = get_field('margin_bottom_small', false, true, true);
  $breakpoints = get_field('breakpoints', false, true, true);
  $class_name = 'portfolio-experience';
    
  $random_class_name = random_class_name($class_name);
  generate_margins_styles_for_section($random_class_name, $margin_top_small, $margin_bottom_small, $breakpoints);
  $all_class_names = $class_name . ' ' . $random_class_name;

  $default_posts_per_page = get_option( 'posts_per_page' );
?>

<section class="<?= $all_class_names; ?> js-portfolio-experience" data-posts-per-page="<?= $default_posts_per_page; ?>" data-rest-url="<?= site_url() . '/wp-json/wp/v2/project/?' ?>">
    <div class="container">
        <div class="portfolio-experience__filters">
            <?php
                if( have_rows('portfolio_filters') ):
                    while( have_rows('portfolio_filters') ) : the_row();
                        $filter_name = get_sub_field('filter_name', false, true, true);
                        $taxonomy_slug = get_sub_field('taxonomy_slug', false, true, true); //works fine
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

    <?php
        $args = array(
            'post_type'   => 'project',
            'fields'      => 'ids',
            'numberposts' => -1,
            'tax_query'   => array(
            'relation'    => 'AND',
            )
        );
        $query = array();
        $number_of_posts = count($query) ? count($query) : '0';
    ?>
    <h2 class="portfolio-experience__results-heading">Found <span><?= $number_of_posts; ?> </span> projects (out of 
    <?= wp_count_posts( 'project' )->publish; ?>)</h2>

    <div class="posts-list">
        <?php
        $posts = array();
        $global_active_portfolio_filters = $GLOBALS['global_active_portfolio_filters'];
        $active_filters_taxonomies = array_keys($global_active_portfolio_filters);

        // if ($active_filters_taxonomies){
        //     foreach($active_filters_taxonomies as $active_filters_taxonomy) :
        //         $args['tax_query'][] = array(
        //             'taxonomy' => $active_filters_taxonomy,
        //             'field'    => 'term_id',
        //             'terms'    => $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'],
        //             'operator' => $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type']
        //         );
        //         $posts_taxonomy = get_posts($args);
        //         echo $active_filters_taxonomy;
        //         echo '<br>get_posts<br>';
        //         var_dump($posts_taxonomy);
        //         echo '<br>';
        //         echo '$query before intersect:<br>';
        //         var_dump($query);echo '<br><br>';
        //         if (empty($query)){
        //             $query = $posts_taxonomy;
        //         }
        //         if (!empty($query)){
        //             echo '<br>array not empty<br>';
        //             $query = array_intersect($query, $posts_taxonomy);
        //         }
        //         echo 'after array_intersect:<br>';
        //         var_dump($query);echo '<br><br>';
        //         echo '############################################################################<br>';
        //     endforeach;

        // }

        // $active_filters_taxonomy = 'project-year';
        // // $default_filtering_type = $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
        // $default_filtering_type = 'IN';
        // echo $default_filtering_type;
        // echo '<br>';

        // $args['tax_query'][] = array(
        //     'taxonomy' => $active_filters_taxonomy,
        //     'field'    => 'term_id',
        //     'terms'    => $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'],
        //     'operator' => $default_filtering_type
        // );
        // $posts_taxonomy = get_posts($args);
        // var_dump($posts_taxonomy);

// ====================================   DZIAŁĄJĄCE project-tag 
        // echo '<br>';echo '<br>';echo '<br>';echo '<br>';


        // $active_filters_taxonomy = 'project-tag';
        // $default_filtering_type = $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
        // echo $default_filtering_type;
        // $active_terms_ids = $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'];
        // var_dump($active_terms_ids);
        // echo $default_filtering_type;
        // echo '<br>';

        // foreach ($active_terms_ids as $active_term_id){
        //     $args['tax_query'][] = array(
        //         'taxonomy' => $active_filters_taxonomy,
        //         'field'    => 'term_id',
        //         'terms'    => $active_term_id,
        //     );
        // }
        
        // $posts_taxonomy2 = get_posts($args);
        // var_dump($posts_taxonomy2);

// ====================================   KONIEC DZIAŁĄJĄCE project-tag 






// ====================================   DZIAŁĄJĄCE project-year 
        // echo '<br>';echo '<br>';echo '<br>';echo '<br>';

        // $args = array(
        //     'post_type'   => 'project',
        //     'fields'      => 'ids',
        //     'numberposts' => -1,
        //     'tax_query'   => array(
        //     'relation'    => 'OR',
        //     )
        // );
        // $active_filters_taxonomy = 'project-year';
        // $default_filtering_type = $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
        // echo $default_filtering_type;
        // $active_terms_ids = $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'];
        // var_dump($active_terms_ids);
        // echo $default_filtering_type;
        // echo '<br>';

        // foreach ($active_terms_ids as $active_term_id){
        //     $args['tax_query'][] = array(
        //         'taxonomy' => $active_filters_taxonomy,
        //         'field'    => 'term_id',
        //         'terms'    => $active_term_id,
        //     );
        // }
        
        // $posts_taxonomy2 = get_posts($args);
        // var_dump($posts_taxonomy2);
        
// ====================================   KONIEC DZIAŁĄJĄCE project-year 






// ====================================   DZIAŁĄJĄCE project-category 
        // echo '<br>';echo '<br>';echo '<br>';echo '<br>';


        $active_filters_taxonomy = 'project-category';
        $default_filtering_type = $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
        echo $default_filtering_type;
        $active_terms_ids = $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'];
        var_dump($active_terms_ids);
        echo $default_filtering_type;
        echo '<br>';

        foreach ($active_terms_ids as $active_term_id){
            $args['tax_query'][] = array(
                'taxonomy' => $active_filters_taxonomy,
                'field'    => 'term_id',
                'terms'    => $active_term_id,
            );
        }
        
        $posts_taxonomy2 = get_posts($args);
        var_dump($posts_taxonomy2);

// ====================================   KONIEC DZIAŁĄJĄCE project-category 



        // $links_in_pagination = $number_of_posts / $default_posts_per_page;
        // if ($query){
            
        //     for ($i = 0; $i < $default_posts_per_page; $i++){
        //         get_template_part('template-parts/post','box',
        //             array(
        //                 'post_id'           => $query[$i],
        //                 'date'              => 'year',
        //                 'category_taxonomy' => 'project-category',
        //                 'tag_taxonomy'      => 'project-tag',
        //             )
        //         );
        //     }
        // }

        ?>
    </div>
    <div class="pagination">
            <?php
                // for ($i = 0; $i < ceil($links_in_pagination); $i++){
                //     $button_class = 'pagination__button';
                //     $i == 0 ? $button_class = 'pagination__button pagination__button--active' : NULL;
                //     echo '<button data-pagination-page-number="' . $i+1 . '" class="' . $button_class . '">' . $i+1 . '</button>';
                // }
            ?>   
        </div>
</section>