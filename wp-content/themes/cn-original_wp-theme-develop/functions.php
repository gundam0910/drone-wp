<?php

// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 700;

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'themezee_enqueue_scripts');

if ( ! function_exists( 'themezee_enqueue_scripts' ) ):
function themezee_enqueue_scripts() { 
	
	// Register and Enqueue Stylesheet
	wp_register_style('themezee_zeeTastyPro_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('themezee_zeeTastyPro_stylesheet');
	
	// Enqueue jQuery Framework
	wp_enqueue_script('jquery');
	
	// Register and enqueue navigation.js
	wp_register_script('themezee_jquery_navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	wp_enqueue_script('themezee_jquery_navigation');
	
	// Register and Enqueue Fonts
	wp_register_style('themezee_default_font', 'http://fonts.googleapis.com/css?family=Arimo');
	wp_enqueue_style('themezee_default_font');
	
	wp_register_style('themezee_default_title_font', 'http://fonts.googleapis.com/css?family=Lobster');
	wp_enqueue_style('themezee_default_title_font');
	
}
endif;


// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'themezee_enqueue_comment_reply' );
	
function themezee_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'themezee_setup' );

if ( ! function_exists( 'themezee_setup' ) ):
function themezee_setup() { 
	
	// init Localization
	load_theme_textdomain('zeeTasty_lang', get_template_directory() . '/languages' );
	
	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array(
		'default-color' => 'ddd',
		'default-image' => get_template_directory_uri() . '/images/background.png'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
		'header-text' => false,
		'width'	=> 1140,
		'height' => 400,
		'flex-height' => true));
		
	// Register Navigation Menus
	register_nav_menu( 'main_navi', __('Main Navigation', 'zeeTasty_lang') );
}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'themezee_add_image_sizes' );

if ( ! function_exists( 'themezee_add_image_sizes' ) ):
function themezee_add_image_sizes() { 
	
	// Add Featured Image Size
	add_image_size( 'featured_image', 720, 180, true);
	
	// Add Frontpage Image Size
	add_image_size( 'frontpage_image', 1140, 400, true);
	
	// Add Widget Post Thumbnail Size
	add_image_size( 'widget_post_thumb', 60, 60, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'themezee_register_sidebars' );

if ( ! function_exists( 'themezee_register_sidebars' ) ):
function themezee_register_sidebars() {
	
	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'zeeTasty_lang' ),
		'id' => 'sidebar-main',
		'description' => __( 'Appears on posts and also pages (in case Sidebar Pages has no widgets) except frontpage/fullwidth template.', 'zeeTasty_lang' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Sidebar Pages', 'zeeTasty_lang' ),
		'id' => 'sidebar-pages',
		'description' => __( 'Appears on static pages only. Leave this widget area empty to use Main Sidebar on pages.', 'zeeTasty_lang' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	
	// Register Frontpage Template Widgets
	register_sidebar( array(
		'name' => __( 'Frontpage Widgets #1', 'zeeTasty_lang' ),
		'id' => 'frontpage-widgets-one',
		'description' => __( 'Three column horizontal widget area displayed on frontpage template.', 'zeeTasty_lang' ),
		'before_widget' => '<div class="widget-col-third"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Frontpage Widgets #2', 'zeeTasty_lang' ),
		'id' => 'frontpage-widgets-two',
		'description' => __( 'Two column horizontal widget area displayed on frontpage template.', 'zeeTasty_lang' ),
		'before_widget' => '<div class="widget-col-half"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

}
endif;


/*==================================== INCLUDE FILES ====================================*/

// Includes all files needed for theme options, custom JS/CSS and Widgets
add_action( 'after_setup_theme', 'themezee_include_files' );

if ( ! function_exists( 'themezee_include_files' ) ):
function themezee_include_files() { 

	// include Theme Option Files
	require( get_template_directory() . '/includes/options/options-setup.php' );
	require( get_template_directory() . '/includes/options/options-framework.php' );

	// include Customization Files
	require( get_template_directory() . '/includes/customization/custom-colors.php' );
	require( get_template_directory() . '/includes/customization/custom-layout.php' );
	require( get_template_directory() . '/includes/customization/custom-jscript.php' );
	
	// include Theme Hooks
	require( get_template_directory() . '/includes/theme-hooks.php' );
	
}
endif;


/*==================================== THEME FUNCTIONS ====================================*/

// Creates a better title element text for output in the head section
add_filter( 'wp_title', 'themezee_wp_title', 10, 2 );

function themezee_wp_title( $title, $sep = '' ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'themezee' ), max( $paged, $page ) );

	return $title;
}


// Add Default Menu Fallback Function
function themezee_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Display Credit Link Function
function themezee_credit_link() { ?>
	<a href="http://themezee.com/themes/zeetasty/"><?php _e('zeeTasty Theme', 'zeeTasty_lang'); ?></a>
<?php
}


// Add custom image size to Media Upload
add_filter( 'image_size_names_choose', 'themezee_add_image_size_names' );  
function themezee_add_image_size_names($sizes) {
	$custom_sizes = array(  
		'frontpage_image' => 'Frontpage Image'  
	);  
	return array_merge( $sizes, $custom_sizes );  
}


// Change maximum image size for Frontpage Image
add_filter( 'editor_max_image_size', 'themezee_change_max_image_size', 10, 2 );  
function themezee_change_max_image_size($max, $size) {
	if ($size == 'frontpage_image')
		return array(1140, 400);
}


// Change Excerpt More
add_filter('excerpt_more', 'themezee_excerpt_more');
function themezee_excerpt_more($more) {
    return '';
}


// Display Content Pagination
if ( ! function_exists( 'themezee_display_pagination' ) ):
function themezee_display_pagination() { 
	global $wp_query;
	
	if ( $wp_query->max_num_pages > 1 ) :

		if(function_exists('wp_pagenavi')) : // if PageNavi is activated
			
			wp_pagenavi();
		
		else : // Otherwise, use traditional Navigation ?>
			
			<div class="post-pagination clearfix">
				<span class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'zeeTasty_lang')) ?></span>
				<span class="alignright"><?php previous_posts_link (__('Recent Entries &raquo;', 'zeeTasty_lang')) ?></span>
			</div>
			
<?php 	
		endif;
	endif;
}
endif;


// Display Postmeta Data
if ( ! function_exists( 'themezee_display_postmeta' ) ):
function themezee_display_postmeta() { ?>
	<span class="meta-date">
	<?php printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'zeeTasty_lang'), 
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
	?>
	</span>
	<span class="meta-author sep">
	<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'zeeTasty_lang'), 
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'zeeTasty_lang' ), get_the_author() ) ),
			get_the_author()
		);
	?>
	</span>
<?php if ( comments_open() ) : ?>
	<span class="meta-comments sep">
		<?php comments_popup_link( __('Leave a comment', 'zeeTasty_lang'),__('One comment','zeeTasty_lang'),__('% comments','zeeTasty_lang') ); ?>
	</span>
<?php endif; ?>
<?php
	edit_post_link(__( 'Edit Post', 'zeeTasty_lang' ));
}
endif;


// Display Postinfo Data
if ( ! function_exists( 'themezee_display_postinfo' ) ):
function themezee_display_postinfo() { ?>
	<span class="meta-category">
		<?php printf(__('Posted in %1$s', 'zeeTasty_lang'), get_the_category_list(', ')); ?>
	</span>
	
<?php
	$tag_list = get_the_tag_list('', ', ');
	if ( $tag_list ) : ?>
		<span class="meta-tags">
			<?php printf(__('tagged with %1$s', 'zeeTasty_lang'), $tag_list); ?>
		</span>
<?php 
	endif; 
}
endif;

?>