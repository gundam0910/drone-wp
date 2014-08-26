<?php
/**
 * drone functions and definitions
 *
 * @package drone
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'drone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function drone_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on drone, use a find and replace
	 * to change 'drone' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'drone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'drone' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'drone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // drone_setup
add_action( 'after_setup_theme', 'drone_setup' );
/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function drone_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'drone' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'drone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function drone_scripts() {
	wp_enqueue_style( 'drone-style', get_stylesheet_uri() );

	wp_enqueue_script( 'drone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'drone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drone_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// ADD CUSTOM POST TYPE: SHOWS
add_action( 'init', 'create_static_block' );

function create_static_block() {
		if (function_exists('register_post_type')) {
			register_post_type('static_block',
				array(
					//'singular_label'      => __('Static Block', THEME_NAME),
					//'label'               => __('Static Content', THEME_NAME),
					'labels'              => array(
							'name' =>				__('Static Content Blocks', 'post type general name'),
							'singular_name' =>		__('Static Block', 'post type singular name'),
							'add_new' =>			__('Add New', 'block'),
							'add_new_item' =>		__('Add New Block'),
							'edit_item' =>			__('Edit Block'),
							'new_item' =>			__('New Block'),
							'all_items' =>			__('Static Blocks'),
							'view_item' =>			__('View Block'),
							'search_items' =>		__('Search'),
							'not_found' =>			__('No blocks found'),
							'not_found_in_trash' =>	__('No blocks found in Trash'), 
							'parent_item_colon' => '',
							'menu_name' => 'Static Content'
						),
					'exclude_from_search' => true,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'query_var'           => 'static_block',
					'rewrite'             => array('slug' => 'static_block'),
					'supports'            => array(
						'title',
						'editor',
						'revisions',
					),
				)
			);
		}
	}