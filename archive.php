<?php
    get_header();
    $queried_object = get_queried_object();
    $category = $queried_object->term_id;   
    $date_format = $queried_object->taxonomy == 'project-category' ? 'year' : 'full';
?>

	<main class="main">
	<div class="container">

<?php

$args = array(
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
  'tax_query' => array(
    array(
      'taxonomy' => $queried_object->taxonomy,
      'terms' => $category,
    ),
  ),
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    get_template_part('template-parts/post','box',
        array(
            'post_id' => get_the_ID(),
            'category_taxonomy' => $queried_object->taxonomy,
            'date'              => $date_format,
          )
    );
  } 
  wp_reset_postdata();
  ?>
  <div class="pagination">
    <?php 
        $pagination_links = paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => false,
            'add_args'     => false,
            'add_fragment' => '',
        ) );
        $pagination_links_ul = str_replace( 'page-numbers', 'pagination__button', $pagination_links );
        echo str_replace( ' current', ' pagination__button--active', $pagination_links_ul );
        // echo $pagination_links_ul;
    ?>
</div>
<?php
} else {
}

                
                ?>
               
		</div>
		
	</main>

<?php
get_footer();