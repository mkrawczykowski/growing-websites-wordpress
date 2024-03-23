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
  echo $default_posts_per_page;
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

        <button class="button" href="#" id="js-portfolio-experience-apply-filters">Apply filters</button> 
    </div>

    <?php
        $posts = array();
        $global_active_portfolio_filters = $GLOBALS['global_active_portfolio_filters'];
        $active_filters_taxonomies = array_keys($global_active_portfolio_filters);

        if ($active_filters_taxonomies) :
            foreach($active_filters_taxonomies as $index=>$active_filters_taxonomy) :
                $default_filtering_type = $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
                $args = array(
                    'post_type'   => 'project',
                    'fields'      => 'ids',
                    'numberposts' => -1,
                    'tax_query'   => array(
                    'relation'    => $default_filtering_type,
                    )
                );
                
                $active_terms_ids = $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'];

                foreach ($active_terms_ids as $active_term_id){
                    $args['tax_query'][] = array(
                        'taxonomy' => $active_filters_taxonomy,
                        'field'    => 'term_id',
                        'terms'    => $active_term_id,
                    );
                }
                
                $array_of_taxonomies_posts[$index] = get_posts($args);

            endforeach;
            $filtered_posts = find_common_elements($array_of_taxonomies_posts);
        endif;

        $filtered_posts_length = count($filtered_posts);
        $projects_string = '';
        if ($filtered_posts_length === 1){
            $projects_string = 'project';
        }
        if ($filtered_posts_length > 1){
            $projects_string = 'projects';
        }
        $number_of_posts = $filtered_posts_length ? $filtered_posts_length : '0';
        $links_in_pagination = $number_of_posts / $default_posts_per_page;
    ?>

    <div class="posts-list">
        <?php
        var_dump($filtered_posts);
        if ($filtered_posts){
            for ($i = 0; $i < $default_posts_per_page-1; $i++){

                echo $i;
                get_template_part('template-parts/post','box',
                    array(
                        'post_id'           => $filtered_posts[$i],
                        'date'              => 'year',
                        'category_taxonomy' => 'project-category',
                        'tag_taxonomy'      => 'project-tag',
                    )
                );
            }
        }
        ?>
    </div>
    <div class="pagination">
            <?php
                for ($i = 0; $i < ceil($links_in_pagination); $i++){
                    $button_class = 'pagination__button';
                    $i == 0 ? $button_class = 'pagination__button pagination__button--active' : NULL;
                    echo '<button data-pagination-page-number="' . $i+1 . '" class="' . $button_class . '">' . $i+1 . '</button>';
                }
            ?>   
        </div>
</section>