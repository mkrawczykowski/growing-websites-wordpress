<?php defined('ABSPATH') or die; ?>

<?php
  $active_year_filters = get_field('active_year_filters');
  $project_type_filters = get_field('project_type_filters');
  $project_technology_filters = get_field('project_technology_filters');
  $posts_per_page = get_field('posts_per_page');

  if (!function_exists('removeSpacesFromTextField')){
    function removeSpacesFromTextField($stringToClear){
        return str_replace(' ', '', trim($stringToClear));
    }    
  }
  
    if (!function_exists('get_existing_terms_list')){
        function get_existing_terms_list($array_from_acf_field, $taxonomy){
                $existing_terms_array = [];
                foreach($array_from_acf_field as $type_name) {
                    $term = get_term_by('slug', $type_name, $taxonomy);
                    if ($term) {
                        array_push($existing_terms_array, $term);
                    }
                }
                 return $existing_terms_array;
            }    
    }
    

    echo esc_html(removeSpacesFromTextField($active_year_filters));
    echo '<br>';
    $project_type_filters_array = explode(",", $project_type_filters);
    get_existing_terms_list($project_type_filters_array, 'project-category');
    $existing_terms_list = get_existing_terms_list($project_type_filters_array, 'project-category'); 
    echo '<br><br>';
    echo $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<section class="portfolio-experience">
    <div class="container">
        <div class="years-filter">
            <h4 class="years-filter__heading">project year</h4>
            <ul class="years-filter__list">
                <li class="years-filter__item active" data-years-filter>2022</li>
                <li class="years-filter__item active" data-years-filter>2021</li>
                <li class="years-filter__item active" data-years-filter>2020</li>
                <li class="years-filter__item active" data-years-filter>2019</li>
                <li class="years-filter__item active" data-years-filter>2018</li>
                <li class="years-filter__item active" data-years-filter>2017</li>
                <li class="years-filter__item active" data-years-filter>2016</li>
                <li class="years-filter__item" data-years-filter>2015</li>
                <li class="years-filter__item" data-years-filter>2014</li>
                <li class="years-filter__item" data-years-filter>2013</li>
                <li class="years-filter__item" data-years-filter>2012</li>
            </ul>
        </div>

        
        <div class="filters-columns">


            <div class="filters-columns__filter">
                <div class="dropdown-checkboxes" data-dropdown-checkboxes="1">
                    <select class="dropdown-checkboxes__select">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                    </select>
                    <div class="dropdown-checkboxes__active-wrapper">
                        <h4 class="dropdown-checkboxes__heading">project type</h4>

                        <?php if (!empty($existing_terms_list)) : ?>




                        <?php endif; ?>
                    
                        <ul class="dropdown-checkboxes__active-list" data-active-list>
                            
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="online stores">online stores</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="user interfaces">user interfaces</li>
                        </ul>
                    </div>
                    <ul class="dropdown-checkboxes__choices-list" data-choices-list>
                        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choices" data-value="websites">websites</li>
                    </ul>
                </div>
            </div>


            <div class="filters-columns__filter">
                <div class="dropdown-checkboxes" data-dropdown-checkboxes="2">
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
                </div>
            </div>
                
        </div>
        <a class="button" href="#">Apply filters</a>

        <div class="posts-list">
        <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query( array(
        'posts_per_page' => $posts_per_page, 
                    'paged' => $paged, 
                    'post_type' => 'project'
    ) );
?>

<?php if ( $query->have_posts() ) : ?>

<!-- begin loop -->
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

<?php
get_template_part('template-parts/post','box',
                        array('post_id' => get_the_ID())
                    );
?>
<?php endwhile; ?>
<!-- end loop -->


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









            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array( 
                    'posts_per_page' => $posts_per_page, 
                    'paged' => $paged, 
                    'post_type' => 'project'
                );
                $cpt_query = new WP_Query($args);
            ?>

            <?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); ?>
                
                <?php
                    
                ?>

            <?php endwhile; endif; ?>

            <?php echo my_pagination(); ?>

            <!-- <nav>
                <ul>
                    <li><?php previous_posts_link( '&laquo; PREV', $cpt_query->max_num_pages) ?></li> 
                    <li><?php next_posts_link( 'NEXT &raquo;', $cpt_query->max_num_pages) ?></li>
                </ul>
            </nav> -->
        </div>
    </div>
</section>