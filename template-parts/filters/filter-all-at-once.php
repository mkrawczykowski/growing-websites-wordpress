<?php defined('ABSPATH') or die; ?>

<?php
    $filter_name = $args['filter_name'];
    $active_terms_in_this_filter_array = $args['active_terms_in_this_filter_array'];
    $taxonomy_slug = $args['taxonomy_slug'];
    $items_in_reverse_order = $args['items_in_reverse_order'];
    $enable_change_filtering_type = $args['enable_change_filtering_type'];
    $default_filtering_type = $args['default_filtering_type'];
    $default_filtering_type_label = $args['default_filtering_type_label'];
    $array_of_active_terms_ids = [];
?>

<div class="all-at-once">
<?= $filter_name ? '<h4 class="all-at-once__heading">' . $filter_name . '</h4>' : ''; ?>

<?php
    $terms = get_terms( array(
        'taxonomy'   => $taxonomy_slug,
        'hide_empty' => false,
    ) );

    if ($items_in_reverse_order){
        $terms = array_reverse($terms);
    }

    if ($terms) : ?>
        <ul class="all-at-once__list" data-filter-operator>
            <?php
                foreach ($terms as $term) :
                    if (has_term_id($active_terms_in_this_filter_array, $term->term_id)){
                       $active_class = 'active';
                       array_push($array_of_active_terms_ids, $term->term_id);
                    }
                    if (!has_term_id($active_terms_in_this_filter_array, $term->term_id)){
                       $active_class = '';
                    }
                    echo '<li class="all-at-once__item ' . $active_class . '" data-all-at-once>' . $term->name . '</li>';
                endforeach;
                $GLOBALS['global_active_portfolio_filters'][$taxonomy_slug]['active_terms_ids'] = $array_of_active_terms_ids;
                $GLOBALS['global_active_portfolio_filters'][$taxonomy_slug]['default_filtering_type'] = $default_filtering_type;
            ?>
        </ul>
    <?php endif; ?>
</div>