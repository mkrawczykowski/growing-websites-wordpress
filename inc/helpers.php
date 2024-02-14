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
	if (!is_array($posts_ids) || empty($posts_ids)) {
		return;
    }

    foreach($posts_ids as $post_id) : 
        get_template_part('template-parts/post','box',
        	array('post_id' => $post_id)
        );
    endforeach;
}



/**
 * Retrieves a list of existing terms in a given taxonomy based on an array of term slugs.
 *
 * @param array $array_from_acf_field An array of term slugs.
 * @param string $taxonomy The taxonomy to search in.
 * @return array An array of \WP_Term objects.
 */

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



/**
 * Removes all spaces from a given string and trims it.
 *
 * @param string $stringToClear The string to clear of spaces.
 * @return string The string without spaces.
 */

function removeSpacesFromTextField($stringToClear){
	return str_replace(' ', '', trim($stringToClear));
}   


function has_term_id($terms_array, $term_id) {
    foreach ($terms_array as $term) {
        if ($term->term_id == $term_id) {
            return true;
        }
    }
    return false;
}


if (!function_exists('generate_margins_styles_for_section')){
	function generate_margins_styles_for_section($class_name, $post_id){
		// echo get_field('margin_top', $post_id);
		if ($class_name && $post_id) : ?>
		<?= 'tessssssst'; ?>
		<?= $post_id; ?>
		<?php $test = get_field('margin_top', 43); 
		echo $test;
		?>
		<style>
		.<?= $class_name; ?>{
			margin-top: <?php the_field('margin_top', $post_id); ?>px;
			margin-bottom: <?= get_field('margin_bottom', $post_id); ?>px;

			<?php

			if( have_rows('breakpoints', $post_id) ):
			while( have_rows('breakpoints', $post_id) ) : the_row();
				$breakpoint = get_sub_field('breakpoint', $post_id);
				$margin_top = get_sub_field('margin_top', $post_id);
				$margin_bottom = get_sub_field('margin_bottom', $post_id);

				echo "@media only screen and (min-width: " . $breakpoint . "px) {\n";
					echo "margin-top: " . $margin_top . "px;\n";
					echo "margin-bottom: " . $margin_bottom . "px;\n";
				echo "}\n";
			endwhile;
			endif;

			?>
		}
		</style>      
	<?php endif;
	}	
}


?>