<?php
/**************************************************************************************
 * jetsy functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jetsy
 */

if ( ! function_exists( 'jetsy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jetsy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jetsy, use a find and replace
		 * to change 'jetsy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jetsy', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'jetsy' ),
		    'menu-2' => esc_html__( 'Social-Header', 'jetsy' ),
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
		// allows admin to change custom color and background.
		// Remove if you don't want to allow those changes.
		add_theme_support( 'custom-background', apply_filters( 'jetsy_custom_background_args', array(
			'default-color' => '',
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
add_action( 'after_setup_theme', 'jetsy_setup' );



/*******************************************************************************************
 /**
 * Register custom fonts.
 */

function jetsy_fonts_url() {
    $fonts_url = '';  //sets to an empty string
    
    /*
     * Translators: If there are characters in your language that are not
     * supported by Lato Sans, Georgia serif and Fjalla One..translate this to 'off'. Do not translate
     * into your own language without changing the font.
     */
    
    $lato_sans = _x ( 'on', 'Lato font: on or off', 'jetsy' );
    $fjalla_sans = _x ( 'on', 'Fjalla Sans font: on or off', 'jetsy' );
        
    $font_families = array();
    
    
    //edit your fonts here when you add or remove
    if ( 'off' !== $lato_sans ) {
         $font_families[] = 'Lato:400,700i,900';
    }
    
    if ( 'off' !== $fjalla_sans ) {
         $font_families[] = 'Fjalla+One';
    }
        
    if ( in_array( 'on', array($lato_sans, $fjalla_sans) ) ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
    }
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
       
    return esc_url_raw( $fonts_url );
    }

/******************************************************
 * Auto preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */

function jetsy_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'jetsy-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    
    return $urls;
}
add_filter( 'wp_resource_hints', 'jetsy_resource_hints', 10, 2 );





/*******************************************************************************************
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jetsy_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'jetsy_content_width', 640 );
}
add_action( 'after_setup_theme', 'jetsy_content_width', 0 );

/************************************************************************
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jetsy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jetsy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jetsy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jetsy_widgets_init' );



/**********************************************************
 * Enqueue scripts and styles.
 */
function jetsy_scripts() {
    
    //my google fonts. change link to change label and update .scss
    wp_enqueue_style( 'jetsy-fonts', jetsy_fonts_url() );
        
	wp_enqueue_style( 'jetsy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jetsy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jetsy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jetsy_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
