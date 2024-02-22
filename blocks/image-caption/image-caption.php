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
  
    generate_margins_styles_for_section('image-caption', $margin_top_small, $margin_bottom_small, $breakpoints);
?>

<?= $caption ? '<figure class="image-caption">' : NULL; ?>
    <img 
        <?= $caption ? NULL : 'class="image-caption"'; ?>
        <?php acf_responsive_image($image_id,$image_size,$max_width); ?> alt="<?= $image_alt; ?>" 
    />
  <?= $caption ? '<figcaption>' . $caption  . '</figcaption>' : NULL; ?>
<?= $caption ? '</figure>' : NULL; ?>