<?php
/**
 * Plugin Name: Digital Link Testimonials Slider
 * Plugin URI: http://digitallink.ca
 * Description: Creates a testimonials CPT and widget that rotates testimonials
 * Version: 1.0
 * Author: Sally Poulsen
 * Author URI: http://sallypoulsen.com
 */

/*
*	Sets up the testimonial custom post type
*/

function dl_create_testimonials() {
 
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' ),
                'add_new' => __( 'Add New Testimonial' ),
                'add_new_item' => __( 'Add New Testimonial' ),
                'edit_item' => __( 'Edit Testimonial' ),
                'new_item' => __( 'New Testimonial' ),
                'view_item' => __( 'View Testimonial' ),
                'view_items' => __( 'View Testimonials' ),
                'search_items' => __( 'Search Testimonials' ),
                'not_found' => __( 'Testimonials Not Found' ),
                'not_found_in_trash' => __( 'Testimonials Not Found in Trash' ),
                'all_items' => __( 'All Testimonials' ),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
        )
    );
}

add_action( 'init', 'dl_create_testimonials' );
