<?php
/**
 * Block Name: Video file
 *
 * A video from uploaded file
 */

$heading_small = get_field('heading_small');
$heading_main = get_field('heading_main');
$video_file = get_field('video_file');

$id = 'two-headings-text-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>

<section class="video-file">
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
        </div>  
          <?php
            if ($video_file) : ?>
              <div class="video-file__background">
                <div id="js-play-button" class="video-file__play-button">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.4375 1.02344C2.02344 0.671875 2.76562 0.671875 3.35156 1.0625L14.6016 7.89844C15.1484 8.25 15.5 8.875 15.5 9.5C15.5 10.1641 15.1484 10.7891 14.6016 11.1016L3.35156 17.9766C2.76562 18.3281 2.02344 18.3672 1.4375 18.0156C0.851562 17.7031 0.5 17.0781 0.5 16.375V2.625C0.5 1.96094 0.851562 1.33594 1.4375 1.02344ZM2.6875 2.11719C2.49219 2 2.25781 2 2.0625 2.11719C1.86719 2.19531 1.75 2.42969 1.75 2.625V16.375C1.75 16.6094 1.86719 16.8438 2.0625 16.9219C2.25781 17.0391 2.49219 17.0391 2.6875 16.9219L13.9375 10.0469C14.1328 9.92969 14.25 9.73438 14.25 9.5C14.25 9.30469 14.1328 9.10938 13.9375 8.99219L2.6875 2.11719Z"/>
                  </svg>

                </div>
                <video id="js-video-file" class="video-file__player" src=" <?php echo $video_file; ?>"></video>
              </div>
            <?php endif; ?>
      </div>
    </div>
  </div>
</section>