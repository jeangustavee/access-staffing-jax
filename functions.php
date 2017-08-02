<?php
/**
 * Access Staffing Jax functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Access_Staffing_Jax
 */

if ( ! function_exists( 'access_staffing_jax_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function access_staffing_jax_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Access Staffing Jax, use a find and replace
		 * to change 'access-staffing-jax' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'access-staffing-jax', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'access-staffing-jax' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'access_staffing_jax_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'access_staffing_jax_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function access_staffing_jax_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'access_staffing_jax_content_width', 640 );
}
add_action( 'after_setup_theme', 'access_staffing_jax_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function access_staffing_jax_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'access-staffing-jax' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'access-staffing-jax' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'access_staffing_jax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function access_staffing_jax_scripts() {
    wp_enqueue_style( 'access-staffing-jax-icons', get_template_directory_uri() . '/css/access-icons.css');
    wp_enqueue_style( 'access-staffing-jax-tether', get_template_directory_uri() . '/css/tether.min.css');
    wp_enqueue_style( 'access-staffing-jax-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'access-staffing-styles', get_template_directory_uri() . '/css/styles.css');
    wp_enqueue_style( 'access-staffing-jax-dropdown', get_template_directory_uri() . '/css/dropdown.css');
    wp_enqueue_style( 'access-staffing-jax-animate', get_template_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style( 'access-staffing-jax-style', get_stylesheet_uri() );
    wp_enqueue_style( 'access-staffing-jax-global', get_template_directory_uri() . '/css/mbr-additional.css');


	wp_enqueue_script( 'access-staffing-jax-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'access-staffing-jax-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'access-staffing-jax-jquery', get_template_directory_uri() . '/js/jquery.min.js');
	wp_enqueue_script( 'access-staffing-jax-tether', get_template_directory_uri() . '/js/tether.min.js');
	wp_enqueue_script( 'access-staffing-jax-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
	wp_enqueue_script( 'access-staffing-jax-smoothscroll', get_template_directory_uri() . '/js/smooth-scroll.js');
	wp_enqueue_script( 'access-staffing-jax-touch', get_template_directory_uri() . '/js/jquery.touch-swipe.min.js');
	wp_enqueue_script( 'access-staffing-jax-viewport', get_template_directory_uri() . '/js/jquery.viewportchecker.js');
	wp_enqueue_script( 'access-staffing-jax-jarallax', get_template_directory_uri() . '/js/jarallax.min.js');
	wp_enqueue_script( 'access-staffing-jax-scriptmin', get_template_directory_uri() . '/js/script.min.js');
	wp_enqueue_script( 'access-staffing-jax-script', get_template_directory_uri() . '/js/script.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'access_staffing_jax_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
