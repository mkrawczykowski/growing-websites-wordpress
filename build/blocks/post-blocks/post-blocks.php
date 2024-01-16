<?php defined('ABSPATH') or die; ?>

<?php
  $heading = get_field('heading');
  $which_posts = get_field('which_posts');
  $post_type = get_field('post_type');
  $posts_in_section = get_field('posts_in_section');

  if (!function_exists('the_featured_posts')){
    function the_featured_posts($featured_posts_ids){
      foreach($featured_posts_ids as $featured_post_id) : 
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
            <h3 class="post__title"><?= get_the_title($featured_post_id); ?></h3>
            <p class="post__title"><?= get_the_excerpt($featured_post_id) ?></p>
          </div>
          <div class="post_image">
            <img class="" <?php acf_responsive_image(get_post_thumbnail_id($featured_post_id),'full',1024); ?> alt="" />
          </div>
        </div>
      <?php endforeach;
    }
  }

  if (!function_exists('the_previous_posts')){
    function the_previous_posts(){



      $latest_cpt = get_posts("post_type=project&numberposts=3");
      // print_r($latest_cpt);
      foreach ($latest_cpt as $post){
        echo $post->ID;
      }


    }
  }



?>

<section class="post-blocks">
  <div class="container">
    <?= $heading ? '<h2 class="post-blocks__heading">' . $heading . '</h2>' : ''; ?>

    <?php 
      switch ($which_posts) {
        case 'previous_posts' :
          the_previous_posts();
        break;

        case 'featured_posts' :
          if ($posts_in_section){
            the_featured_posts($posts_in_section);
          }
        break;
      }
    ?>

  </div>
</section>