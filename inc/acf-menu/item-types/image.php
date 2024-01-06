<?php 
	if ($image = get_sub_field($menu_item_type)) :
		$image_id = $image['id'];
		$image_size = 'full';
		$max_width = $image['width']; 
		
		$align_left_class = get_sub_field('align_to_left') ? 'main-nav__align-left' : '';
?>
		
	<li class="main-nav__image <?= $align_left_class; ?>">
		<img class="" <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="" />
	</li>

<?php
	endif;
?>