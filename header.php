<?php
  global $post;

  $post_type = get_post_type();
  $post_id = get_the_ID();
  $taxonomy = '';
  $date_or_year = '';

  switch ($post_type) {
    case 'post':
      $taxonomy = 'category';
      $date_or_year = get_the_date('F d Y', $post_id);
    break;
    case 'project':
      $taxonomy = 'project-category';
      $names = array_column(get_the_terms($post_id, 'project-year'), 'name');
      $date_or_year = implode(', ', $names);
      
    break;
  };
  $this_post_terms = wp_get_post_terms($post_id, $taxonomy);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">
  <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">
  <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">
  </noscript>

  <title><?php echo esc_html(get_the_title()); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="covering-layer"></div>
  <header class="header">
    <div class="container container--wider container--header">
      <?php include get_template_directory() . '/inc/acf-menu/acf-menu.php' ?>  

      <div class="container container--title">
        <div class="header-content">
          <?php if (is_single()) : ?>
            <div class="header__post-meta">
              <ul class="header__post-categories">
                <?php foreach($this_post_terms as $term) : ?>
                  <li class="header__post-category">
                    <a class="header__post-category-link" href="<?= get_category_link($term->term_id); ?>">
                      <?= $term->name; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
              <span class="header__post-date">
                <?= $date_or_year ?>
              </span>
            </div>
          <?php endif; ?>
          
          <?php 
            $alternative_title = get_field('alternative_title', false, true, true);
            $excerpt = get_field('excerpt', false, true, true); 
          ?>
          
          <h1 class="header__page-title">
            <?php 
              if ($alternative_title) :
                echo $alternative_title;
              else :
                echo esc_html(get_the_title());
              endif;
            ?>
          </h1>
          <?= $excerpt ? '<p class="header__excerpt">' . $excerpt . '</p>' : NULL; ?>
        </div>
        
      </div>
        
    </div>
  </header>