<?php
  global $post;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Async Google Fonts from https://pagespeedchecklist.com/asynchronous-google-fonts -->
  <!-- connect to domain of font files -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- optionally increase loading priority -->
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">

  <!-- async CSS -->
  <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">

  <!-- no-JS fallback -->
  <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@400;600;800;900&display=swap">
  </noscript>

  <title><?php the_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="covering-layer"></div>
  <header class="header">
    <div class="container container--wider container--header">
      
      <?php include get_template_directory() . '/inc/acf-menu/acf-menu.php' ?>  

      <div class="container container--title">
        <div class="header__category">
        </div>
        <h1 class="header__page-title">
          <?php the_title(); ?>
        </h1>
      </div>
        
    </div>
  </header>