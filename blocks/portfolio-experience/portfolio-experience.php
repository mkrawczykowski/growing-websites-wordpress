<?php defined('ABSPATH') or die; ?>

<?php
  $posts_per_page = get_field('posts_per_page');
  $portfolio_filters = get_field('portfolio_filters');
  $GLOBALS['global_active_portfolio_filters'] = [];
?>

<section class="portfolio-experience">
    <div class="container">
        <div class="portfolio-experience__filters">
            <?php
                if( have_rows('portfolio_filters') ):
                    while( have_rows('portfolio_filters') ) : the_row();
                        $filter_name = get_sub_field('filter_name');
                        $taxonomy_slug = get_sub_field('taxonomy_slug');
                        $this_taxonomy_exists = taxonomy_exists($taxonomy_slug);
                        $filter_type = get_sub_field('filter_type');
                        $template_path =  'template-parts/filters/filter-'. $filter_type. '.php';
                        $template_exists = locate_template($template_path, false, false);
                        $items_in_reverse_order = get_sub_field('items_in_reverse_order');
                        $enable_change_filtering_type = get_sub_field('enable_change_filtering_type');
                        $default_filtering_type = get_sub_field('default_filtering_type');
                        $default_filtering_type_label = get_sub_field('default_filtering_type_label');

                        if ($this_taxonomy_exists && $template_exists) : ?>

                            <?php
                                $active_terms_in_this_filter = get_sub_field('active_terms_in_this_filter');
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
                            <!-- 
                                something's missing:
                                taxonomy: <?= $taxonomy_slug; ?>
                                template: <?= $template_path; ?>
                            -->
                        <?php endif;
                    endwhile;
                endif;
            ?>            
        </div>

            
            
            



                <!-- <div class="dropdown-checkboxes" data-dropdown-checkboxes="2">
                    <select class="dropdown-checkboxes__select">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                    </select>
                    <div class="dropdown-checkboxes__active-wrapper">
                    <h4 class="dropdown-checkboxes__heading">technologies/solutions used</h4>
                        <ul class="dropdown-checkboxes__active-list" data-active-list>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="WooCommerce">WooCommerce</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="WordPress">WordPress</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="SCSS">SCSS</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="Quick.Cart">Quick.Cart</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="GeneratePress">GeneratePress</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="custom design">custom design</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="ACF Pro">ACF Pro</li>
                        </ul>
                    </div>
                    <ul class="dropdown-checkboxes__choices-list" data-choices-list>
                        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choices" data-value="websites">websites</li>
                    </ul>
                </div> -->





        <a class="button" href="#">Apply filters</a>
<br>
<br>
<br>
<br>
<div>
        <?php

$args_test = array(
    'post_type' => 'post',
);

$args_test['posts_per_page'] = 23;
$args_test['tax_query'] = array();
$args_test['tax_query']['relation'] = 'AND';
$args_test['tax_query'][] = array(
    'taxonomy' => 'taxonomy1',
            'field'    => 'slug', // Możesz zmienić na 'term_id', 'name' lub 'slug', w zależności od sposobu identyfikacji
            'terms'    => array( 'term1', 'term2' ), // Przykładowe termy z taxonomii 1
            'operator' => 'IN', // Wybiera posty, które mają przynajmniej jeden z podanych termów
);
$args_test['tax_query'][] = array(
    'taxonomy' => 'taxonomyDDD2',
            'field'    => 'slug', // Możesz zmienić na 'term_id', 'name' lub 'slug', w zależności od sposobu identyfikacji
            'terms'    => array( 'termDDD1', 'termDDD2' ), // Przykładowe termy z taxonomii 1
            'operator' => 'IN', // Wybiera posty, które mają przynajmniej jeden z podanych termów
);
var_dump($args_test);
?>
</div>
<br>
<br>
<br>
<br>
<br>
        <div class="posts-list">
        <?php
        $global_active_portfolio_filters = $GLOBALS['global_active_portfolio_filters'];
        // echo '------ $global_active_portfolio_filters --------';
        // echo '<br>';
        // var_dump($global_active_portfolio_filters);
        // echo '------ END $global_active_portfolio_filters --------';
        // echo '<br>';
        // echo '<br>';
    $active_filters_taxonomies = array_keys($global_active_portfolio_filters);
    // var_dump($active_filters_taxonomies);
    // echo '<br>';
    // echo '<br>';
    // echo '<br>';
   

    $args_test = array(
        'post_type' => 'project',
                'fields'         => 'ids',
                'numberposts' => -1,
                'tax_query' => array(
                    'relation' => 'AND',
                )
    );

    if ($active_filters_taxonomies){
        // $query_string = '';
        foreach($active_filters_taxonomies as $active_filters_taxonomy) :
            $args_test['tax_query'][] = array(
                'taxonomy' => $active_filters_taxonomy,
                        'field'    => 'term_id', // Możesz zmienić na 'term_id', 'name' lub 'slug', w zależności od sposobu identyfikacji
                        'terms' => $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'],
                        'operator' => $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type']
            );
            // $posts = get_posts(array(
            //     'post_type' => 'project',
            //     'fields'         => 'ids',
            //     'numberposts' => -1,
            //     'tax_query' => array(
            //         'relation' => $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'],
            //     //   array(
            //     //     'taxonomy' => $active_filters_taxonomy,
            //     //     'field' => 'term_id', 
            //     //     'terms' => $global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids'],
            //     //     'include_children' => false,
            //     //     'operator' => $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type']
            //     //   )
            //     )
            //   ));


            // echo '<br>';
            // echo '--$active_filters_taxonomy--';
            // echo '<br>';
            // echo $active_filters_taxonomy;
            // echo '<br>';
            // var_dump($global_active_portfolio_filters[$active_filters_taxonomy]['active_terms_ids']);
            
            // echo '<br>';
            // echo $global_active_portfolio_filters[$active_filters_taxonomy]['default_filtering_type'];
            // echo '<br>';


            


            //   foreach($posts as $post) :
            //     echo get_the_title($post) . '<br>';
            // if (!$all_queried_posts){
            //             $merged_array = $posts;
            //         }
            //         if ($all_queried_posts){
            //             $merged_array = array_intersect($all_queried_posts, $posts);
            //         }
            // $all_queried_posts = $merged_array;
            
            // foreach ($all_queried_posts as $post) :
            //     echo get_the_title($post). '<br>';
            // endforeach;
            // echo '<br>=====================</br>';
            // endforeach;
            //   if ($posts){
            //     echo 'posts!';
            //     echo '<br>';
                
            //     echo '<br>';
            //     // foreach($posts as $post){

            //     // }
            //     echo '================= $all_queried_posts ===================';
            //     echo '<br>';
            //     if (!$all_queried_posts){
            //         $merged_array = $posts;
            //     }
            //     if ($all_queried_posts){
                    
            //     }
                
            //     var_dump($merged_array);
            //     echo '<br>';
            //     $all_queried_posts = $merged_array;
                
            //     foreach ($all_queried_posts as $post) :
            //         echo get_the_title($post). '<br>';
            //     endforeach;
            //     echo '================= //// $all_queried_posts //// ===================';
            //     echo '<br>';
                
            //   }
              
            // $query_string .= $active_filters_post_type . '=';
            // $query_string .= implode(',',$global_active_portfolio_filters[$active_filters_post_type]);
            // $query_string .= '&';
            // echo '<br>';
            // var_dump($posts);
            // echo '<br>';
            // echo '<br>';
            // echo '<br>';echo '================================================================';
        endforeach;
        echo 'args_test';
        echo '<br>';
        var_dump($args_test);


echo '<br>';
echo '<br>';
echo '<br>';
        // echo 'all_queried_posts';
        // echo '<br>';
        // // var_dump($all_queried_posts);
        // foreach($all_queried_posts as $post) :
        //     echo get_the_title($post) . '<br>';

        // endforeach;
        // $query_string .= "&numberposts=3&fields='ids'";
        // echo $query_string;
        echo '<br>';
    }

                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    // if ($all_queried_posts){
                    //     $query = new WP_Query( array(
                    //         'post_type' => 'any', // any post type
                    //         'post__in'  => $all_queried_posts, // our merged queries
                    //     ) );    
                    // }
    
                    $query = new WP_Query($args_test);
    // $query = new WP_Query( array(
    //     'posts_per_page' => $posts_per_page, 
    //                 'paged' => $paged, 
    //                 'post_type' => 'project'
    // ) );

    // $query = get_posts($query_string);
    // var_dump($query);
    // echo '<br /><br /><br /><br /><br />';


if ( $query->have_posts() ) :
   while ( $query->have_posts() ) : $query->the_post(); 
    get_template_part('template-parts/post','box',
                            array('post_id' => get_the_ID())
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





            <!-- <nav>
                <ul>
                    <li><?php previous_posts_link( '&laquo; PREV', $cpt_query->max_num_pages) ?></li> 
                    <li><?php next_posts_link( 'NEXT &raquo;', $cpt_query->max_num_pages) ?></li>
                </ul>
            </nav> -->
        </div>
    </div>
</section>