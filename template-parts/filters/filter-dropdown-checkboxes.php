<?php defined('ABSPATH') or die; ?>

<?php
    $filter_name = $args['filter_name'];
    $active_terms_in_this_filter_array = $args['active_terms_in_this_filter_array'];
    $taxonomy_slug = $args['taxonomy_slug'];
    $enable_change_filtering_type = $args['enable_change_filtering_type'];
    $default_filtering_type = $args['default_filtering_type'];
    $default_filtering_type_label = $args['default_filtering_type_label'];
    $array_of_active_terms = [];
    $array_of_active_terms_ids = [];
    $array_of_inactive_terms = [];

    $terms = get_terms( array(
        'taxonomy'   => $taxonomy_slug,
        'hide_empty' => false,
    ) );

    if ($terms){
        foreach ($terms as $term) :
            $active_term = has_term_id($active_terms_in_this_filter_array, $term->term_id) ? true : false;
            if ($active_term){
                array_push($array_of_active_terms, $term);
                array_push($array_of_active_terms_ids, $term->term_id);
            }
            if (!$active_term){
                array_push($array_of_inactive_terms, $term);
            }
        endforeach;
        $GLOBALS['global_active_portfolio_filters'][$taxonomy_slug]['active_terms_ids'] = $array_of_active_terms_ids;
        $GLOBALS['global_active_portfolio_filters'][$taxonomy_slug]['default_filtering_type'] = $default_filtering_type;
    }
?>

<div class="dropdown-checkboxes" data-dropdown-checkboxes="1">
    <!-- <select class="dropdown-checkboxes__select">
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2019">2019</option>
        <option value="2019">2019</option>
    </select> -->
    <div class="dropdown-checkboxes__active-wrapper">
        <?= $filter_name ? '<h4 class="dropdown-checkboxes__heading">' . $filter_name . '</h4>' : ''; ?>
        
        <?php
            if ($enable_change_filtering_type){ ?>
                
                    <label class="dropdown-checkboxes__checkbox-label"><?php echo $default_filtering_type_label ;?>
                        <input type="dropdown-checkboxes__checkbox-input">
                        <span class="chedropdown-checkboxes__checkbox-checkmark"></span>
                    </label>

            <?php }
        ?>
        <?php
        if($array_of_active_terms) : ?>
            <ul class="dropdown-checkboxes__active-list" data-active-list>
                <?php
                    foreach ($array_of_active_terms as $active_term) :
                        $term_name = $active_term -> name; ?>
                       <li class="dropdown-checkboxes__active-list-item" data-item-type="active" data-value="<?= $term_name ?>"><?= $term_name ?></li>
                    <?php endforeach;
                ?>
            </ul>
        <?php endif; ?>

        </ul>
    </div>

    <?php 
        if($array_of_inactive_terms) : ?>
            <ul class="dropdown-checkboxes__choices-list" data-choices-list>
                <?php
                    foreach ($array_of_inactive_terms as $inactive_term) : 
                        $term_name = $inactive_term -> name; ?>
                        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choices" data-value="<?= $term_name ?>"><?= $term_name ?></li>
                    <?php endforeach;
                ?>
            </ul>
    <?php endif; ?>


    <!-- <ul class="dropdown-checkboxes__choices-list" data-choices-list>
        <li class="dropdown-checkboxes__choices-list-item" data-item-type="choices" data-value="websites">websites</li>
    </ul> -->
</div>