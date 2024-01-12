<?php
/**
 * Block Name: Cards with icons
 *
 * This is the template that displays a grid of cards with icons
 */

$id = 'left-text-right-image-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<section class="cards-with-icons">
  <div class="container">
    <div class="row">
      <div class="col">
        <?php
          if( have_rows('cards') ): ?>
            <div class="cards-with-icons__grid">
            <?php
              while( have_rows('cards') ) : the_row();
                $cards__icon = get_sub_field('cards__icon');
                $cards__name = get_sub_field('cards__name');
                $cards__url = get_sub_field('cards__url');
                ?>

                  <a target="_blank" href="<?php echo $cards__url; ?>" class="cards-with-icons__card">
                    <?php
                      echo wp_get_attachment_image($cards__icon, 'full', NULL, array('class' => 'cards-with-icons__icon', 'loading' => 'lazy' ));

                      echo '<h4 class="cards-with-icons__name">' . $cards__name . '</h4>';

                      echo '<p class="cards-with-icons__download">Pobierz materiały</p>';
                    ?>
                  </a>

                <?php
                endwhile; ?>
              </div>
          <?php    
          endif;
        ?>
      </div>
    </div>
  </div>
</section>