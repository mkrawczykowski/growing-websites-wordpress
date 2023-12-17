<?php
/**
 * Block Name: Two headings and text
 *
 * Two headings and a paragraph of text
 */

$heading_small = get_field('heading_small');
$heading_main = get_field('heading_main');
$text = get_field('text');

$id = 'two-headings-text-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<section class="two-headings-text" id="dla-kogo">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="headings-text headings-text--mobile-center headings-text--desktop-center">
          <?php
            echo $heading_small ? '<h3 class="headings-text__heading-small">' . $heading_small . '</h3>' : NULL;
          ?>
          <?php
            echo $heading_main ? '<h2 class="headings-text__heading-main headings-text__heading-main--font-small headings-text__heading-main--big">' . $heading_main . '</h2>' : NULL;
          ?>
          <?php
            echo $text ? '<p class="headings-text__paragraph headings-text__paragraph--font-small">' . $text . '</p>' : NULL;
          ?>
        </div>    
      </div>
    </div>
  </div>
</section>