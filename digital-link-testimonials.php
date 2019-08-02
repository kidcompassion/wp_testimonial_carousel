<?php
/**
 * Plugin Name: Digital Link Testimonials
 * Plugin URI: http://digitallink.ca
 * Description: Creates a testimonials CPT with template for single post and archive.
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


function dl_testimonials_stylesheet() {
    wp_enqueue_style( 'testimonial-styles', plugins_url('testimonial_styles.css', __FILE__) );
    wp_enqueue_script( 'testimonial-js', plugins_url('testimonials.js', __FILE__), array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'dl_testimonials_stylesheet' );


/*
    Generates single template for testimonials
*/

function dl_custom_single_template( $template ) {
    global $post;

    if ( 'testimonials' === $post->post_type && locate_template( array( 'templates/testimonial.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'templates/testimonial.php';
    }
    return $template;
}

add_filter( 'single_template', 'dl_custom_single_template' );

/*
    Generates archive template for testimonials
*/

function dl_custom_archive_template( $template ) {
    global $post;
    if ( 'testimonials' === $post->post_type && locate_template( array( 'templates/testimonials-index.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'templates/testimonials-index.php';
    }
    return $template;
}
add_filter( 'archive_template', 'dl_custom_archive_template' );

function dl_testimonial_slider_shortcode( $atts ){
    // Uses output buffering so I can avoid manually concatenating the template.
    // WP shortcodes require a value be passed via "return" - if it isn't, it will, by default, load at the top of the page
    ob_start();
    include 'templates/testimonial-carousel.php';
    $ob = ob_get_clean();
    return $ob;
}
add_shortcode( 'testimonials_slider', 'dl_testimonial_slider_shortcode' );


/*
Check to see if testimonial scripts need to be loaded on a given page before loading them
if page is not testimonial
if carousel is not loaded

*/


