<?php
/**************************************************************************************
 * jetsy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jetsy
 */

if (!function_exists('jetsy_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function jetsy_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on jetsy, use a find and replace
         * to change 'jetsy' to the name of your theme in all the template files.
         */
        load_theme_textdomain('jetsy', get_template_directory() . '/languages');

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
        add_image_size('jetsy-full-bleed', 2000, 1200, true);
        add_image_size('jetsy-index-img', 900, 550, true);
        /* NOTE: !!!!!!!!!! remember to regenerate thumbnails if you change settings!! */


        // To add/remove menu
        register_nav_menus(array(
            'primary' => esc_html__('Header', 'jetsy'),
            'social' => esc_html__('Social Media Menu', 'jetsy'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        // allows admin to change custom color and background.
        // Remove if you don't want to allow those changes.
        add_theme_support('custom-background', apply_filters('jetsy_custom_background_args', array(
            'default-color' => 'white',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        /* Editor styles
         *
         */

        add_editor_style(array('inc/editor-styles.css', jetsy_fonts_url()));

    }
endif;
add_action('after_setup_theme', 'jetsy_setup');


/**
 * Register custom fonts.
 */

function jetsy_fonts_url()
{
    $fonts_url = '';  //sets to an empty string

    /*
     * Translators: If there are characters in your language that are not
     * supported by Lato Sans, Georgia serif and Fjalla One..translate this to 'off'. Do not translate
     * into your own language without changing the font.
     */

    $lato_sans = _x('on', 'Lato font: on or off', 'jetsy');
    $fjalla_sans = _x('on', 'Fjalla Sans font: on or off', 'jetsy');

    $font_families = array();


    //edit your fonts here when you add or remove
    if ('off' !== $lato_sans) {
        $font_families[] = 'Lato:400,700i,900';
    }

    if ('off' !== $fjalla_sans) {
        $font_families[] = 'Fjalla+One';
    }

    if (in_array('on', array($lato_sans, $fjalla_sans))) {
        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );
    }
    $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

    return esc_url_raw($fonts_url);
}


function jetsy_resource_hints($urls, $relation_type)
{
    if (wp_style_is('jetsy-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}

add_filter('wp_resource_hints', 'jetsy_resource_hints', 10, 2);


/*******************************************************************************************
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jetsy_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('jetsy_content_width', 640);
}

add_action('after_setup_theme', 'jetsy_content_width', 0);


/**
 * USE ON ALL THEMES
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array $size Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function jetsy_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];

    /* if min width of screen is wider than 900px than image is 700.
     if narrower, up to 900px  */

    if (900 <= $width) {
        $sizes = '(min-width: 900px) 700px, 900px';
    }

    /* sidebar-2 is the optional 'page.php' sidebar so this reduces */
    if (is_active_sidebar('sidebar-1') || is_active_sidebar('sidebar-2')) {
        $sizes = '(min-width: 900px) 600px, 900px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'jetsy_content_image_sizes_attr', 10, 2);

/**
 * Filter the `sizes` value in the header image markup.
 * USE ON ALL THEMES*
 * @origin Twenty Seventeen 1.0
 *
 * @param string $html The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array $attr Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function jetsy_header_image_tag($html, $header, $attr)
{
    if (isset($attr['sizes'])) {
        $html = str_replace($attr['sizes'], '100vw', $html);
    }
    return $html;
}

add_filter('get_header_image_tag', 'jetsy_header_image_tag', 10, 3);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 ** USE ON ALL THEMES
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */


/*this is for thumbnails only */
function jetsy_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    /*checks for not singular because they are full bleed by default */
    if (!is_singular()) {
        if (is_active_sidebar('sidebar-1')) {
            $attr['sizes'] = '(max-width: 900px) 90vw, 800px';
        } else {  /* no sidebar */
            $attr['sizes'] = '(max-width: 1000px) 90vw, 1000px';
        }
    } else {
        $attr['sizes'] = '100vw';
    }

    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'jetsy_post_thumbnail_sizes_attr', 10, 3);


/************************************************************************
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jetsy_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'jetsy'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'jetsy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    /* sidebar-2 is the optional 'page.php' sidebar  */
    register_sidebar(array(
        'name' => esc_html__('Page Sidebar', 'jetsy'),
        'id' => 'sidebar-2',
        'description' => esc_html__('Add page sidebar here.', 'jetsy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

//footer widget
    register_sidebar(array(
        'name' => esc_html__('Footer Widgets', 'jetsy'),
        'id' => 'footer-1',
        'description' => esc_html__('Add footer widgets here.', 'jetsy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    add_action('widgets_init', 'jetsy_widgets_init');

}

add_action('widgets_init', 'jetsy_widgets_init');


/**********************************************************
 * Enqueue scripts and styles.
 */
function jetsy_scripts()
{

    wp_enqueue_style('jetsy-fonts', jetsy_fonts_url());

    //main stylesheet for site.  all compiled by sass
    if (!is_page('home')) {
        wp_enqueue_style('jetsy-style', get_stylesheet_uri());
    }

    //different stylesheet for front page.  not sass compiled
    if (is_page('home')) {
        wp_enqueue_style('jetsy-stylefront', get_template_directory_uri() . '/stylefront.css');
    }


    wp_enqueue_script('jetsy-navigation', get_template_directory_uri() . '/js/navigation.js',
        array('jquery'), '20151215', true);

    wp_localize_script('jetsy-navigation', 'jetsyScreenReaderText',
        array(
            'expand' => __('Expand child menu', 'jetsy'),
            'collapse' => __('Collapse child menu', 'jetsy'),
        ));

    /* wrap these images to get full bleed / needed to be in containers*/
    wp_enqueue_script('jetsy-functions', get_template_directory_uri() . '/js/functions.js',
        array('jquery'), '20190807', true);

    wp_enqueue_script('jetsy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js',
        array('jquery'), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'jetsy_scripts');

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
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';


/**
 * Add Jen Jetson icon to the end of content
 */

//added logo to the end of content on front page and pages.
add_filter('the_content', 'filter_the_content_in_the_main_loop');
function filter_the_content_in_the_main_loop($content)
{
    if (is_front_page() || (is_page())) {
        return $content .= '<img src="/wp/wp-content/uploads/2020/04/logo.png" alt="logo" width="50px" align="right" >';
    }
    return $content;
}