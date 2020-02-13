<?php
/**
 * Plugin Name: Custom Testimonials
 * Plugin URI: http://sallypoulsen.com
 * Description: Creates a testimonials carousel based off of CPT with templates for single post and archive.
 * Version: 1.4
 * Author: Sally Poulsen
 * Author URI: http://sallypoulsen.com
 */

/**
 * Testimonials Custom Post Type
 *
 * @return void
 */

function x_testimonials_create_testimonials() {
 
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
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' )
        )
    );
}

add_action( 'init', 'x_testimonials_create_testimonials' );


/**
 * Enqueue the styles and JS
 *
 * @return void
 */

function x_testimonials_testimonials_stylesheet() {
    wp_enqueue_style( 'testimonial-styles', plugins_url('testimonial_styles.css', __FILE__) );
    wp_enqueue_script( 'testimonial-js', plugins_url('testimonials.js', __FILE__), array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'x_testimonials_testimonials_stylesheet' );


/**
 * Sets up custom single template for individual testimonials
 *
 * @param [type] $template
 * @return void
 */
function x_testimonials_custom_single_template( $template ) {
    global $post;

    // If the post type is 'testimonials', find and load the correct single template
    if ( 'testimonials' === $post->post_type && locate_template( array( 'templates/testimonial.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'templates/testimonial.php';
    }
    return $template;
}

add_filter( 'single_template', 'x_testimonials_custom_single_template' );

/**
 * Sets up archive page for testimonials
 *
 * @param [type] $template
 * @return void
 */

function x_testimonials_custom_archive_template( $template ) {
    global $post;

    // If the post type is 'testimonials', find and load the correct archive template
    if ( is_post_type_archive ( 'testimonials' ) ) {
        if ( 'testimonials' === $post->post_type && locate_template( array( 'templates/testimonials-index.php' ) ) !== $template ) {
            return plugin_dir_path( __FILE__ ) . 'templates/testimonials-index.php';
        }
    }
    return $template;
}
add_filter( 'archive_template', 'x_testimonials_custom_archive_template' );


/**
 * Creates the [testimonials_slider] shortcode 
 *
 * @param [type] $atts
 * @return void
 */
function x_testimonials_testimonial_slider_shortcode( $atts ){
    // Uses output buffering so I can avoid manually concatenating the template.
    // WP shortcodes require a value be passed via "return" - if it isn't, it will, by default, load at the top of the page
    ob_start();
    include 'templates/testimonial-carousel.php';
    $ob = ob_get_clean();
    return $ob;
}
add_shortcode( 'testimonials_slider', 'x_testimonials_testimonial_slider_shortcode' );


/**
 * Add metabox to attribution fields
 *
 * @return void
 */

function x_testimonials_register_meta_boxes() {
    add_meta_box( 'x-1', __( 'Testimonial Attribution', 'x' ), 'x_testimonials_display_callback', 'testimonials', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'x_testimonials_register_meta_boxes' );



/**
 * Callback loads the form for the attribute fields into the metabox
 *
 * @param [type] $post
 * @return void
 */

function x_testimonials_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './templates/form.php';

}

/**
 * Save contents of metabox
 *
 * @param [type] $post_id
 * @return void
 */
function x_testimonials_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }

    $fields = [
        'x_testimonials_attr_name', // Attribution name field
        'x_testimonials_attr_title', // Attribution title field
    ];

    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}

add_action( 'save_post', 'x_testimonials_save_meta_box' );




/**
 * Sets up custom thumbnail size for the carousel
 */

add_image_size( 'testimonial-carousel-thumb', 790, 585, array( 'center', 'top' ) ); 