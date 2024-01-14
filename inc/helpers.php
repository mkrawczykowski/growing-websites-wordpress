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
 * Show
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function get_yoast_primary_category($taxonomy, $post_id_or_object){
	echo 'test';
	echo $taxonomy;
	echo $post_id_or_object;
	$primary_term_id = yoast_get_primary_term_id($taxonomy, $post_id_or_object);
echo $primary_term_id;
// 	if ($primary_term_id) {
// 		$primary_term = get_term($primary_term_id);

// 		$primary_term;
// 	}
}



?>