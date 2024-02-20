<?php

function fwd_register_custom_post_types()
{

    //Staff CPT
    $labels = array(
        'name' => _x('Staff', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Staff', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Staff', 'text_domain'),
        'name_admin_bar' => __('Staff', 'text_domain'),
        'archives' => __('Staff Archives', 'text_domain'),
        'attributes' => __('Staff Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Staff:', 'text_domain'),
        'all_items' => __('All Staff', 'text_domain'),
        'add_new_item' => __('Add New Staff', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Staff', 'text_domain'),
        'edit_item' => __('Edit Staff', 'text_domain'),
        'update_item' => __('Update Staff', 'text_domain'),
        'view_item' => __('View Staff', 'text_domain'),
        'view_items' => __('View Staff', 'text_domain'),
        'search_items' => __('Search Staff', 'text_domain'),
        'not_found' => __('Staff Not found', 'text_domain'),
        'not_found_in_trash' => __('Staff Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into staff', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this staff', 'text_domain'),
        'items_list' => __('Staff list', 'text_domain'),
        'items_list_navigation' => __('Staff list navigation', 'text_domain'),
        'filter_items_list' => __('Filter staff list', 'text_domain'),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-archive',
        'supports' => array('title'),

    );
    register_post_type('fwd-staff', $args);


}
add_action('init', 'fwd_register_custom_post_types');

function custom_register_taxonomies()
{
    $labels = array(
        'name' => _x('Staff Categories', 'taxonomy general name'),
        'singular_name' => _x('Staff Category', 'taxonomy singular name'),
        'search_items' => __('Search Staff Categories'),
        'all_items' => __('All Staff Categories'),
        'parent_item' => __('Parent Staff Category'),
        'parent_item_colon' => __('Parent Staff Category:'),
        'edit_item' => __('Edit Staff Category'),
        'view_item' => __('View Staff Category'),
        'update_item' => __('Update Staff Category'),
        'add_new_item' => __('Add New Staff Category'),
        'new_item_name' => __('New Staff Category Name'),
        'menu_name' => __('Staff Categories'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menu' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'staff-categories'),
    );
    register_taxonomy('fwd-staff-category', array('fwd-staff'), $args);
}

add_action('init', 'custom_register_taxonomies');






