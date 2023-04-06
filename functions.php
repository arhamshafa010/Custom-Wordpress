<?php
/**
 * Arham functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Arham
 */

if ( ! function_exists( 'arham_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support for post thumbnails.
     */
    function arham_setup() {

        // Make theme available for translation.
        load_theme_textdomain( 'arham', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in two locations.
        function register_my_menus() {
            register_nav_menus(
                array(
                    'header-menu' => __( 'Header Menu' ),
                    'footer-menu' => __( 'Footer Menu' )
                )
            );
        }
        add_action( 'init', 'register_my_menus' );

        // Switch default core markup for search form, comment form, and comments
        // to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'arham_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        // Add theme support for Elementor Pro
        add_theme_support( 'elementor' );
    }
endif;
add_action( 'after_setup_theme', 'arham_setup' );
function custom_css() {
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'custom_css' );
function enqueue_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/dist/css/bootstrap.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/css/bootstrap/dist/js/bootstrap.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
function theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_setup' );

function custom_theme_setup() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

//service custom post

function custom_post_type_services() {

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Services', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Service', 'twentytwentyone' ),
        'all_items'           => __( 'All Services', 'twentytwentyone' ),
        'view_item'           => __( 'View Service', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Service', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Service', 'twentytwentyone' ),
        'update_item'         => __( 'Update Service', 'twentytwentyone' ),
        'search_items'        => __( 'Search Service', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'services', 'twentytwentyone' ),
        'description'         => __( 'Service news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'can_export'          => true,
        'menu_icon'             => 'dashicons-clipboard',
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    // Registering your Custom Post Type
    register_post_type( 'services', $args );

}

add_action( 'init', 'custom_post_type_services', 0 );



?>



