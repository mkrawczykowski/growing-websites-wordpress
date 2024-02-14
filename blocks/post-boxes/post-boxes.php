<?php defined('ABSPATH') or die; ?>

<?php
  $heading = get_field('heading');
  $which_posts = get_field('which_posts');
  $post_type = get_field('post_type');
  $posts_in_section = get_field('posts_in_section');
?>
<?=  get_field('margin_top'); ?>

  <?php
  generate_margins_styles_for_section('post-boxes', get_the_ID());
  
?>

<section class="post-boxes">
  <div class="container">
    <?= $heading ? '<h2 class="post-boxes__heading">' . $heading . '</h2>' : ''; ?>

    <?php 
      switch ($which_posts) {
        case 'previous_posts' :
          the_posts_by_ids(get_posts("post_type=project&numberposts=3&fields='ids'"));
        break;

        case 'featured_posts' :
          if ($posts_in_section){
            the_posts_by_ids($posts_in_section);
          }
        break;
      }
    ?>

  </div>
</section>