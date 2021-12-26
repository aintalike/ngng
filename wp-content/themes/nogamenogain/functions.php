<?php
/**
 * nogamenogain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nogamenogain
 */

if ( ! function_exists( 'nogamenogain_setup' ) ) :

	// Sets up theme defaults and registers support for various WordPress features
	function nogamenogain_setup() {
		
		// Make theme available for translation
		load_theme_textdomain( 'nogamenogain', get_template_directory() . '/languages' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Enable support for post thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		// Register navigation menu
		register_nav_menu( 'main', esc_html__( 'Main Navigation', 'nogamenogain' ) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'nogamenogain_setup' );

// Set the content width in pixels, based on the theme's design and stylesheet
function nogamenogain_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nogamenogain_content_width', 1220 );
}
add_action( 'after_setup_theme', 'nogamenogain_content_width', 0 );

// Register widget area
function nogamenogain_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nogamenogain' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nogamenogain' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nogamenogain_widgets_init' );

// Enqueue scripts and styles
function nogamenogain_scripts() {
	
	// Register and enqueue stylesheet
	wp_enqueue_style( 'nogamenogain-style', get_stylesheet_uri() );

	// Register and enqueue script.js
	wp_enqueue_script( 'nogamenogain-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.6.0', true );

	// Register comment reply script for threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' ); }
	
}
add_action( 'wp_enqueue_scripts', 'nogamenogain_scripts' );

// Custom template tags
require get_template_directory() . '/inc/template-tags.php';

// Load Jetpack compatibility file
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}