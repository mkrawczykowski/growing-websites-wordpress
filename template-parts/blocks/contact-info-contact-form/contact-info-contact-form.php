<?php
/**
 * Block Name: Contact form
 *
 * This is the template that displays...
 */

$heading_small = get_field('heading_small');
$heading_main = get_field('heading_main');
$text = get_field('text');
$email = get_field('email');
$telephone = get_field('telephone');
$address = get_field('address');

$id = 'contact-info-contact-form-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<section class="contact-info-contact-form" id="porozmawiajmy">
  <div class="container">
    <div class="row">
      <div class="col col--50">
        <div class="headings-text headings-text--mobile-left headings-text--desktop-left">
          <?php
            echo $heading_small ? '<h3 class="headings-text__heading-small">' . $heading_small . '</h3>' : NULL;
          ?>
          <?php
            echo $heading_main ? '<h2 class="headings-text__heading-main headings-text__heading-main--font-small headings-text__heading-main--big">' . $heading_main . '</h2>' : NULL;
          ?>
          <?php
            echo $text ? '<p class="headings-text__paragraph headings-text__paragraph--desktop-mt-big">' . $text . '</p>' : NULL;
          ?>
        </div>
        <div class="contact-info-contact-form__contact-data">
          <?php
            echo $email ? '<p class="contact-info-contact-form__contact-data-email">' . $email . '</p>' : NULL;
          ?>
          <?php
            echo $telephone ? '<p class="contact-info-contact-form__contact-data-telephone">' . $telephone . '</p>' : NULL;
          ?>
          <?php
            echo $address ? '<p class="contact-info-contact-form__contact-data-address">' . $address . '</p>' : NULL;
          ?>
        </div>
      </div>
      <div class="col col--50">
        <?php echo do_shortcode('[contact-form-7 id="141" title="Formularz kontaktowy"]'); ?>
      </div>
    </div>
  </div>
</section>