<?php 
	if ($image = get_sub_field($menu_item_type)) :
		$image_id = $image['id'];
		$image_size = 'full';
		$max_width = $image['width']; ?>
		
		<li>
			<img class="my_class" <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="text" />
		</li>
	<?php	
	endif;
?>