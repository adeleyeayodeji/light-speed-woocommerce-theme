<?php

/**
 * Light Speed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Light_Speed
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', time());
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function light_speed_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Light Speed, use a find and replace
	 * to change 'light-speed' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('light-speed', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'light-speed'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'light_speed_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'light_speed_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function light_speed_content_width()
{
	$GLOBALS['content_width'] = apply_filters('light_speed_content_width', 640);
}
add_action('after_setup_theme', 'light_speed_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function light_speed_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'light-speed'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'light-speed'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'light_speed_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function light_speed_scripts()
{

	wp_enqueue_script('light-speed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	//light speed bootstrap css
	wp_enqueue_style('light-speed-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
	//bootstrap utility css
	wp_enqueue_style('light-speed-bootstrap-utility', get_template_directory_uri() . '/assets/css/bootstrap-utilities.min.css', array(), _S_VERSION);
	//bootstrap grid css
	wp_enqueue_style('light-speed-bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), _S_VERSION);

	//light speed bootstrap js
	wp_enqueue_script('light-speed-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);

	//core js
	wp_enqueue_script('light-speed-core', get_template_directory_uri() . '/assets/js/core.js', array(), _S_VERSION, true);

	//core style css
	wp_enqueue_style('light-speed-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('light-speed-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'light_speed_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//register new menu location light speed
function register_light_speed_menu()
{
	register_nav_menus(
		array(
			'light-speed-menu' => __('Light Speed Menu'),
		)
	);
}
add_action('init', 'register_light_speed_menu');


//elementor theme support
require get_template_directory() . '/elementor/init.php';
