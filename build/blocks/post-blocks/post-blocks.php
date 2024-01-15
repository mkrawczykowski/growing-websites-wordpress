<?php defined('ABSPATH') or die; ?>

<?php
  $heading = get_field('heading');
  $which_posts = get_field('which_posts');
  $post_type = get_field('post_type');
  $posts_in_section = get_field('posts_in_section');

  if (!function_exists('the_featured_posts')){
    function the_featured_posts($featured_posts){
      foreach($featured_posts as $featured_post) : 
        $featured_post_id = $featured_post->ID;
        $featured_post_categories = get_the_category($featured_post_id);
        ?>
        <div class="post">
          <div class="post_texts">
            <div class="post__meta">
              <?php if ($featured_post_categories) : ?>
                <ul class="post__categories">
                  
                  <?php foreach($featured_post_categories as $featured_post_category) : ?>
                    <li class="post__category">
                      <a href="<?= get_category_link($featured_post_category->term_id); ?>" class="post__link">
                        <?= $featured_post_category->name; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>

                </ul>
              <?php endif; ?>

              <div class="post__data"><?= get_the_date('F d Y', $featured_post_id); ?></div>
            </div>
            <h3 class="post__title"><?= $featured_post->post_title; ?></h3>
            <p class="post__title"><?= $featured_post->post_excerpt; ?></p>
          </div>
          <div class="post_image">
            <img class="" <?php acf_responsive_image(get_post_thumbnail_id($featured_post_id),'full',1024); ?> alt="" />
          </div>
        </div>
      <?php endforeach;
    }
  }



?>

<section class="post-blocks">
  <div class="container">
    <?= $heading ? '<h2 class="post-blocks__heading">' . $heading . '</h2>' : ''; ?>

    <?php 
    if ($posts_in_section){
      switch ($which_posts) {
        case 'previous_posts' :
          echo 'previous_posts';
        break;

        case 'featured_posts' :
          the_featured_posts($posts_in_section);
        break;
      }      
    }

    ?>
  </div>
</section>