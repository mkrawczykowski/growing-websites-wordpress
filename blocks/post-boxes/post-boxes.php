<?php defined('ABSPATH') or die; ?>

<?php
  $heading = get_field('heading', false, true, true);
  $which_posts = get_field('which_posts', false, true, true);
  $post_type = get_field('post_type', false, true, true);
  $posts_in_section = get_field('posts_in_section', false, true, true);
  switch ($post_type) {
    case 'post':
      $taxonomy = 'category';
      $date = 'full';
    break;
    case 'project':
      $taxonomy = 'project-category';
      $date = 'year';
    break;
  };

  //margins for the block
  $margin_top_small = get_field('margin_top_small', false, true, true);
  $margin_bottom_small = get_field('margin_bottom_small', false, true, true);
  $breakpoints = get_field('breakpoints', false, true, true);

  generate_margins_styles_for_section('post-boxes', $margin_top_small, $margin_bottom_small, $breakpoints);
?>

<section class="post-boxes" data-type="<?= $post_type; ?>">
  <div class="container">
    <?= $heading ? '<h2 class="post-boxes__heading">' . $heading . '</h2>' : ''; ?>

    <?php 
      switch ($which_posts) {
        case 'previous_posts' :
          the_posts_by_ids(get_posts("post_type=project&numberposts=3&fields='ids'"), $taxonomy, $date);
        break;

        case 'featured_posts' :
          if ($posts_in_section){
            the_posts_by_ids($posts_in_section, $taxonomy, $date);
          }
        break;
      }
    ?>

  </div>
</section>