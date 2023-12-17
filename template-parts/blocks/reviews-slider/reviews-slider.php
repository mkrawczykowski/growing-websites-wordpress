<?php
/**
 * Block Name: Reviews slider
 *
 * This is the template that displays a slider of reviews.
 */

$heading_small = get_field('heading_small');
$heading_main = get_field('heading_main');

$id = 'reviews-slider-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<section class="reviews-slider" id="opinie">
  <div class="container container--left-auto">
    <div class="row">
      <div class="col col--heading">
        <div class="headings-text headings-text--mobile-left headings-text--desktop-left">
          <?php
            echo $heading_small ? '<h3 class="headings-text__heading-small">' . $heading_small . '</h3>' : NULL;
          ?>
          <?php
            echo $heading_main ? '<h2 class="headings-text__heading-main headings-text__heading-main--font-small headings-text__heading-main--big">' . $heading_main . '</h2>' : NULL;
          ?>
        </div>
      </div>
      <div class="col col--logos">
        <?php if( have_rows('reviews') ): ?>
          <div class="reviews-slider__slider reviews-swiper swiper">
            <ul class="reviews-slider__reviews-list swiper-wrapper">
            <?php
              while( have_rows('reviews') ) : the_row();
                $reviews__text = get_sub_field('reviews__text');
                $reviews__name = get_sub_field('reviews__name');
                $reviews__position = get_sub_field('reviews__position');

                echo '<li class="reviews-slider__person swiper-slide">';
                  echo '<p class="reviews-slider__person-text">' . $reviews__text . '</p>';
                  echo '<p class="reviews-slider__person-name">' . $reviews__name . '</p>';
                  echo '<p class="reviews-slider__person-position">' . $reviews__position . '</p>';
                echo '</li>';
              endwhile; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php if( have_rows('reviews') ): ?>
          <div class="reviews-slider__nav">
            <div class="swiper-pagination"></div>

            <div class="reviews-slider__nav-arrows">
              <div class="reviews-slider__nav-arrow swiper-button-prev"></div>
              <div class="reviews-slider__nav-arrow swiper-button-next"></div>  
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>