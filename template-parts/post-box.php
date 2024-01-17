<?php
    $post_id = $args['post_id'];
    $post_categories = get_the_category($post_id);
?>

<div class="post-box">
    <div class="post-box__texts">
        <div class="post-box__meta">
            <?php if ($post_categories) : ?>
                <ul class="post-box__categories">
                    <?php foreach($post_categories as $post_category) : ?>
                        <li class="post-box__category">
                            <a href="<?= get_category_link($post_category->term_id); ?>" class="post__link">
                                <?= $post_category->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="post-box__data"><?= get_the_date('F d Y', $post_id); ?></div>
            <?php endif; ?>
        </div>
        
        <h3 class="post-box__title"><?= get_the_title($post_id); ?></h3>
        <p class="post-box__excerpt"><?= get_the_excerpt($post_id) ?></p>
    </div>
    <div class="post-box__image">
        <img class="" <?php acf_responsive_image(get_post_thumbnail_id($post_id),'full',1024); ?> alt="" />
    </div>
</div>