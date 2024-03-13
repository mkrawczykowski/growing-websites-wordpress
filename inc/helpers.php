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

function the_posts_by_ids($posts_ids, $taxonomy, $date){
	if (!is_array($posts_ids) || empty($posts_ids)) {
		return;
    }

    foreach($posts_ids as $post_id) : 
        get_template_part('template-parts/post','box',
        	array(
				'post_id' 			=> $post_id,
				'category_taxonomy'	=> $taxonomy,
				'date'				=> 'year'
				)
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

function random_class_name($class_name) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
	$randomLength = rand(12, 15);

    $max = strlen($characters) - 1;
    for ($i = 0; $i < $randomLength; $i++) {
        $randomString .= $characters[rand(0, $max)];
    }
    return $class_name . '__' . $randomString;
}


if (!function_exists('generate_margins_styles_for_section')){
	
	/**
     * Generate margins styles for section
     *
     * @param string $class_name the class name of the section
     * @param int $margin_top_small the top margin for small screens
     * @param int $margin_bottom_small the bottom margin for small screens
     * @param array $breakpoints an array of breakpoints with their margin values
     */

	function generate_margins_styles_for_section($class_name, $margin_top_small, $margin_bottom_small, $breakpoints){
		if (!$class_name && !$margin_top_small && !$margin_bottom_small && !$breakpoints) {
			return;
		}

		?>

		<style>
		<?= '.' . $class_name . '{'; ?>
			<?= 
				$margin_top_small ? 'margin-top: ' . $margin_top_small . 'px;' : '';
				$margin_bottom_small ? 'margin-top: ' . $margin_bottom_small . 'px;' : '';
			?>

			<?php
			if ($breakpoints && is_array($breakpoints)){
				foreach ($breakpoints as $breakpoint){
					if ($breakpoint['margin_top'] || $breakpoint['margin_bottom']) : 
						echo '@media only screen and (min-width: ' . $breakpoint['breakpoint'] . 'px) {';
						
							echo $breakpoint['margin_top'] ? 'margin-top: ' . $breakpoint['margin_top'] . 'px' : '';
							echo $breakpoint['margin_bottom'] ? 'margin-bottom: ' . $breakpoint['margin_bottom'] . 'px' : '';
							
						echo '}';
					endif;
					
				}
			}

			echo '}'; ?>
		</style>
		<?php 
	}	
}




function the_proper_title(){
	if (!is_category()){
		if ($alternative_title){
			return $alternative_title;	
		}
		if (!$alternative_title){
			return get_the_title();
		}
	}
	if (is_category()){
		return single_cat_title();
	}
}


?>