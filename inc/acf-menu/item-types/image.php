<?php 
	$image_link = get_sub_field('link');
	if ($image = get_sub_field($menu_item_type)) :
		$image_alt = $image['alt'];
		$image_id = $image['id'];
		$image_size = 'full';
		$max_width = $image['width'];
		
		$align_left_class = get_sub_field('align_to_left') ? 'main-nav__list-item--left' : '';
		$custom_classes = get_sub_field('custom_classes');
        $id_attribute = ($custom_id = get_sub_field('custom_id')) ? 'id="' . $custom_id . '"' : '';
?>
		
	<li <?= $id_attribute; ?> class="main-nav__list-item logo main-nav__image <?= $align_left_class . ' ' . esc_html($custom_classes); ?>">
		<?php echo $image_link ? '<a href="' . $image_link . '">' : ''; ?>
			<img class="" <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="<?= $image_alt; ?>" />
		<?php echo $image_link ? '</a>' : ''; ?>
	</li>

<?php
	endif;
?>