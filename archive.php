<?php
  get_header();
  $queried_object = get_queried_object();
$category = $queried_object->term_id; 
var_dump($queried_object);
echo '----------------------------------------------------------------';

?>

	<main class="main">
		<div class="container container--narrower">
 
<?php



// WP_Query arguments for first loop
$args = array(
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
  'tax_query' => array(
    array(
      'taxonomy' => 'project-category',
      'terms' => $category,
    //   
      
    ),
  ),
);

// The Query
$query = new WP_Query( $args );

// var_dump($query);

// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    the_title();
    echo '<br><br>';
  } 
  wp_reset_postdata();
  ?>
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
<?php
} else {
  // no posts found
}
// Restore original Post Data

// $big = 9999; // need an unlikely integer
//         echo paginate_links( array(
//             'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
//             'format' => '?paged=%#%',
//             'current' => max(1, $query->get( 'paged' ) ),
//             'total' => $query->max_num_pages
//     ) );
// WP_Query arguments for second loop

// The Query




    // $args = array(
    //                         // 'post_type' => 'portfolio',
    //                         'post_type' => 'project',
    //                         'posts_per_page' => 4,
    //                         'paged' => $paged,
    //                         'tax_query' => array(             
    //                             array(
    //                                'taxonomy' => 'project-category',
    //                                'field' => 'slug',
    //                                'terms' => $queried_object->slug, // or the category name e.g. Germany
    //                            ),
    //                         )
    //                     ) ;
    
    
    
    
    
    
    // array(
    //     'post_type'         => 'post',
    //     'post_status'       => 'publish',
    //     'paged'             => $paged,
    //     'posts_per_page'    => 2
    // );




    // $query = array(
    //     'post_type' => 'project',
    //                         'posts_per_page' => 4,
    //                         'paged' => $paged,
    //                         'tax_query' => array(             
    //                             array(
    //                                'taxonomy' => 'project-category',
    //                                'field' => 'slug',
    //                                'terms' => $queried_object->slug, // or the category name e.g. Germany
    //                            ),
    //                         )

        // 'post_type' => 'post',
        // 'posts_per_page' => 2,
        // 'author'=>the_author_meta('id'),
        // 'ignore_sticky_posts' => true,
        // 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 
    // );
    // $loop = new WP_Query($query);
    
    // if( $loop->have_posts() ):
    //     while ( $loop->have_posts() ) : $loop->the_post();
    //        the_title();
    //        echo '<br /><br />';
    //     endwhile;
    // endif;
    
    // $big = 9999; // need an unlikely integer
    //     echo paginate_links( array(
    //         'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    //         'format' => '?paged=%#%',
    //         'current' => max(1, $loop->get( 'paged' ) ),
    //         'total' => $loop->max_num_pages
    // ) );
                
                ?>
               
		</div>
		
	</main>

<?php
get_footer();