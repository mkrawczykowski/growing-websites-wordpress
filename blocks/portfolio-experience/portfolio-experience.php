<?php defined('ABSPATH') or die; ?>

<?php
//   $heading = get_field('heading');
//   $which_posts = get_field('which_posts');
//   $post_type = get_field('post_type');
//   $posts_in_section = get_field('posts_in_section');
?>

<section class="portfolio-experience">
    <div class="container">
        <div class="years-filter">
        <h4 class="years-filter__heading">project year</h4>
            <ul class="years-filter__list">
                <li class="years-filter__item active" data-years-filter>2022</li>
                <li class="years-filter__item active" data-years-filter>2021</li>
                <li class="years-filter__item active" data-years-filter>2020</li>
                <li class="years-filter__item active" data-years-filter>2019</li>
                <li class="years-filter__item active" data-years-filter>2018</li>
                <li class="years-filter__item active" data-years-filter>2017</li>
                <li class="years-filter__item active" data-years-filter>2016</li>
                <li class="years-filter__item" data-years-filter>2015</li>
                <li class="years-filter__item" data-years-filter>2014</li>
                <li class="years-filter__item" data-years-filter>2013</li>
                <li class="years-filter__item" data-years-filter>2012</li>
            </ul>
        </div>
        <div class="filters-columns">


            <div class="filters-columns__filter">
                <div class="dropdown-checkboxes">
                    <select class="dropdown-checkboxes__select">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                    </select>
                    <div class="dropdown-checkboxes__active-wrapper">
                        <h4 class="dropdown-checkboxes__heading">project type</h4>
                        <ul class="dropdown-checkboxes__active-list" data-active-list>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="blogs">blogs</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="online stores">online stores</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="user interfaces">user interfaces</li>
                        </ul>
                    </div>
                    <ul class="dropdown-checkboxes__choices-list" data-choices-list>
                        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choice" data-value="websites">websites</li>
                    </ul>
                </div>
            </div>


            <div class="filters-columns__filter">
                <div class="dropdown-checkboxes">
                    <select class="dropdown-checkboxes__select">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                        <option value="2019">2019</option>
                    </select>
                    <div class="dropdown-checkboxes__active-wrapper">
                    <h4 class="dropdown-checkboxes__heading">technologies/solutions used</h4>
                        <ul class="dropdown-checkboxes__active-list" data-active-list>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="WooCommerce">WooCommerce</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="WordPress">WordPress</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="SCSS">SCSS</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="Quick.Cart">Quick.Cart</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="GeneratePress">GeneratePress</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="custom design">custom design</li>
                            <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="ACF Pro">ACF Pro</li>
                        </ul>
                    </div>
                    <ul class="dropdown-checkboxes__choices-list" data-choices-list>
                        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choice" data-value="websites">websites</li>
                    </ul>
                </div>
            </div>
                
        </div>
        <a class="button" href="#">Apply filters</a>

        <div class="posts-list">
            <?php
                
            ?>

            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array( 
                    'posts_per_page' => 10, 
                    'paged' => $paged, 
                    'post_type' => 'project'
                );
                $cpt_query = new WP_Query($args);
            ?>

            <?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); ?>
                
                <?php
                echo 'test';
                    get_template_part('template-parts/post','box',
                        array('post_id' => get_the_ID())
                    );
                ?>

            <?php endwhile; endif; ?>

            <nav>
                <ul>
                    <li><?php previous_posts_link( '&laquo; PREV', $cpt_query->max_num_pages) ?></li> 
                    <li><?php next_posts_link( 'NEXT &raquo;', $cpt_query->max_num_pages) ?></li>
                </ul>
            </nav>
        </div>
    </div>
</section>