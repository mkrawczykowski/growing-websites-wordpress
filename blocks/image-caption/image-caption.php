<?php defined('ABSPATH') or die; ?>

<?php
    $image = get_field('image', false, true, true);
    $image_alt = $image['alt'];
    $image_id = $image['id'];
    $image_size = 'full';
    $max_width = $image['width'];
    $caption = get_field('caption', false, true, true);
  
    $GLOBALS['global_active_portfolio_filters'] = [];

    //margins for the block
    $margin_top_small = get_field('margin_top_small', false, true, true);
    $margin_bottom_small = get_field('margin_bottom_small', false, true, true);
    $breakpoints = get_field('breakpoints', false, true, true);
    $class_name = 'image-caption';
    
    $random_class_name = random_class_name($class_name);
    generate_margins_styles_for_section($random_class_name, $margin_top_small, $margin_bottom_small, $breakpoints);
    $all_class_names = $class_name . ' ' . $random_class_name;
?>

<?= $caption ? '<figure class="' . $all_class_names . '">' : NULL; ?>
    <img 
        <?= $caption ? NULL : 'class="' . $all_class_names . '"'; ?>
        <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="<?= $image_alt; ?>" 
    />
  <?= $caption ? '<figcaption>' . $caption  . '</figcaption>' : NULL; ?>
<?= $caption ? '</figure>' : NULL; ?>