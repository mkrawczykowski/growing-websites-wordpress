    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col col--50">
            <nav>
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'footer-menu',
                  'container'      => 'div',
                  'container_class'=> 'footer-nav',
                  'menu_class'     => 'footer-nav__nav',
                ) );
              ?>
            </nav> 
          </div>
          <div class="col col--50">
            <p class="footer__company-name">
              2023 © nazwa
            </p>
          </div>
        </div>
      </div>
      
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>