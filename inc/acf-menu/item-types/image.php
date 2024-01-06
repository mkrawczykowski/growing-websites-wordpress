<?php 
	if ($image = get_sub_field($menu_item_type)) :
		$image_id = $image['id'];
		$image_size = 'full';
		$max_width = $image['width']; 
		
		$align_left_class = get_sub_field('align_to_left') ? 'main-nav__align-left' : '';
		$custom_classes = get_sub_field('custom_classes');
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : '';
?>
		
	<li <?= $id_attribute; ?> class="main-nav__image <?= $align_left_class . ' ' . esc_html($custom_classes); ?>">
		<img class="" <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="" />
	</li>

<?php
	endif;
?>