<?php

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function acf_responsive_image($image_id,$image_size,$max_width){
	if($image_id != '') {
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
	}
}


/**
 * Function to display posts by IDs
 *
 * @param array $posts_ids array od posts IDs
 */

function the_posts_by_ids($posts_ids){
    foreach($posts_ids as $post_id) : 
        get_template_part('template-parts/post','box',
        	array('post_id' => $post_id)
        );
    endforeach;
}
?>