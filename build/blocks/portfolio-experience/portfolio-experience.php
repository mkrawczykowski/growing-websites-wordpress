<?php defined('ABSPATH') or die; ?>

<?php
//   $heading = get_field('heading');
//   $which_posts = get_field('which_posts');
//   $post_type = get_field('post_type');
//   $posts_in_section = get_field('posts_in_section');
?>

<!-- <section class="portfolio-experience">
    <div class="container">
        <div class="filters">
            <div class="dropdown-checkboxes">
                <ul class="dropdown-checkboxes__active-list">
                    <li class="dropdown-checkboxes__active-list-item" data-active-item="2022">2022</li>
                    <li class="dropdown-checkboxes__active-list-item" data-active-item="2021">2021</li>
                    <li class="dropdown-checkboxes__active-list-item" data-active-item="2020">2020</li>
                    <li class="dropdown-checkboxes__active-list-item" data-active-item="2019">2019</li>
                </ul>
                <ul class="dropdown-checkboxes__choices-list">
                    <li class="dropdown-checkboxes__choices-list" data-choice-item="2018">2018</li>
                    <li class="dropdown-checkboxes__choices-list" data-choice-item="2017">2017</li>
                    <li class="dropdown-checkboxes__choices-list" data-choice-item="2016">2016</li>
                </ul>
            </div>
        </div>
    </div>
</section> -->

<?php
    $gw_gutenberg_blocks_array_with_scripts_gw = $GLOBALS['gw_gutenberg_blocks_array_with_scripts_gw'];
    // var_dump($gw_gutenberg_blocks_array_with_scripts_gw);

    foreach($gw_gutenberg_blocks_array_with_scripts_gw as $block){
        var_dump($block['block-name']);
        echo '<br>';
        var_dump($block['block-scripts'][0]);
        echo '<br>';
        echo '============================';
        echo '<br>';
    }
?>