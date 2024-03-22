<?php
    $post_id = array_key_exists('post_id', $args) ? $args['post_id'] : NULL;
    $excerpt = get_field('excerpt', $post_id, true, true);
    $date = array_key_exists('date', $args) ? $args['date'] : 'none';
    $category_taxonomy = array_key_exists('category_taxonomy', $args) ? $args['category_taxonomy'] : 'category';
    $tag_taxonomy = array_key_exists('tag_taxonomy', $args) ? $args['tag_taxonomy'] : 'post_tag';
    $post_categories = get_the_terms($post_id, $category_taxonomy);
    $post_tags = get_the_terms($post_id, $tag_taxonomy);
    $display_date = '';
    switch ($date){
        case 'year': 
            $names = array_column(get_the_terms($post_id, 'project-year'), 'name');
            $display_date = implode(', ', $names);
        break;
        case 'full':
            $display_date = get_the_date('F d Y', $post_id);
        break;
        case 'none':
        break;
    }
?>

<div class="post-box">
    <div class="post-box__texts">
        <div class="post-box__meta">
            <?php if ($post_categories) : ?>
                <ul class="post-box__categories">
                    <?php foreach($post_categories as $post_category) : ?>
                        <li class="post-box__category">
                            <a href="<?= get_category_link($post_category->term_id); ?>" class="post-box__category-link">
                                <?= $post_category->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($display_date) : ?>
                <div class="post-box__date"><?= $display_date; ?></div>
            <?php endif; ?>
        </div>
        
        <h3 class="post-box__title">
            <a href="<?= $post_id ? get_permalink($post_id) : ''; ?>" class="post-box__title-link">
                <?= $post_id ? get_the_title($post_id) : '' ; ?>
            </a>
        </h3>

        <?php if ($post_tags) : ?>
            <ul class="post-box__tags">
                <?php foreach($post_tags as $post_tag) : ?>
                    <li class="post-box__tag">
                        <a href="<?= get_category_link($post_tag->term_id); ?>" class="post-box__tag-link">
                            <?= $post_tag->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?= $excerpt ? '<p class="post-box__excerpt">' . $excerpt . '</p>' : NULL; ?></p>
    </div>
    <div class="post-box__image">
        <a href="<?= get_permalink($post_id); ?>"  class="post-box__image-link">
            <img class="" <?php acf_responsive_image(get_post_thumbnail_id($post_id),'full',1024); ?> alt="" />
        </a>
    </div>
</div>