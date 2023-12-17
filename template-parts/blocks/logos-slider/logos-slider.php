<?php
/**
 * Block Name: Logos slider
 *
 * This is the template that displays a slider of logos.
 */

$heading_part_1 = get_field('heading_part_1');
$heading_part_2 = get_field('heading_part_2');
$text = get_field('logos');

$id = 'logos-slider-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<section class="logos-slider">
  <div class="container">
    <div class="row">
      <div class="col col--heading">
        <?php
          echo ($heading_part_1 && $heading_part_2) ?
            '<h2 class="logos-slider__heading">'
            . '<span>' . $heading_part_1 . '</span> '
            . $heading_part_2
            . '</h2>' : NULL;
        ?>
      </div>
      <div class="col col--logos">
        <?php if( have_rows('logos') ): ?>
          <div class="logos-slider__slider swiper">
            <ul class="logos-slider__logos-list swiper-wrapper">
            <?php
              while( have_rows('logos') ) : the_row();
                $logo_image = get_sub_field('logo_image');
                echo '<li class="logos-slider__item swiper-slide">';
                  echo wp_get_attachment_image($logo_image, 'full', NULL, array('class' => 'logos-slider__logo' ));
                echo '</li>';
              endwhile; ?>
            </ul>
          </div>
        <?php endif; ?>
        
        
      </div>
    </div>
  </div>
</section>