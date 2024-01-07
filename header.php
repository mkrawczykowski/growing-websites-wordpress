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
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,600;8..144,800;8..144,900&display=swap">

  <!-- async CSS -->
  <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,600;8..144,800;8..144,900&display=swap">

  <!-- no-JS fallback -->
  <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,600;8..144,800;8..144,900&display=swap">
  </noscript>

  <title><?php the_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body>
  <div class="covering-layer"></div>
  <header class="header">
    <div class="container container--wider">
      
      <nav class="main-nav">
        <ul class="main-nav__list">
          <?php include get_template_directory() . '/inc/acf-menu/acf-menu.php' ?>  
        </ul>
        <div class="main-nav__hamburger" id="js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>

      <div class="container">
        <h1 class="header__page-title">
          <?php the_title(); ?>
        </h1>
      </div>
        
    </div>
  </header>