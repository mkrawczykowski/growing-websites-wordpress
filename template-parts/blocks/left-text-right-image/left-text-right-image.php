<?php
/**
 * Block Name: Left text, right image
 *
 * This is the template that displays the hero block.
 */

$heading_small = get_field('heading_small');
$heading_main = get_field('heading_main');
$text = get_field('text');
$image = get_field('image');

$id = 'left-text-right-image-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<section class="left-text-right-image">
  <div class="container">
    <div class="row">
      <div class="col col--60">
        <div class="headings-text headings-text--mobile-center headings-text--desktop-left">
          <?php
            echo $heading_small ? '<h3 class="headings-text__heading-small headings-text__heading-small--mb-small">' . $heading_small . '</h3>' : NULL;
          ?>
          <?php
            echo $heading_main ? '<h2 class="headings-text__heading-main headings-text__heading-main--big">' . $heading_main . '</h2>' : NULL;
          ?>
          <?php
            echo $text ? '<p class="headings-text__paragraph">' . $text . '</p>' : NULL;
          ?>          
        </div>
        <div class="button button--big button--blue button--desktop-left button--mobile-center">
          <a href="" class="button__link">Porozmawiajmy!</a>
        </div>
      </div>
      <div class="col col--40 left-text-right-image__image-col">
        <?php echo wp_get_attachment_image($image, 'full', NULL, array('class' => 'left-text-right-image__image', 'loading' => 'eager' )); ?>
      </div>
    </div>
  </div>
</section>