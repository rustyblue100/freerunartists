<?php
/**
 * freerunartists-2019 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package freerunartists-2019
 */

if ( ! function_exists( 'freerunartists_2019_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freerunartists_2019_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on freerunartists-2019, use a find and replace
		 * to change 'freerunartists-2019' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'freerunartists-2019', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'freerunartists-2019' ),
			'menu-2' => esc_html__( 'Secondary', 'freerunartists-2019' ),
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
		add_theme_support( 'custom-background', apply_filters( 'freerunartists_2019_custom_background_args', array(
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
add_action( 'after_setup_theme', 'freerunartists_2019_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freerunartists_2019_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'freerunartists_2019_content_width', 640 );
}
add_action( 'after_setup_theme', 'freerunartists_2019_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freerunartists_2019_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'freerunartists-2019' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'freerunartists-2019' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'freerunartists_2019_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freerunartists_2019_scripts() {

	wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Forum|Gruppo');
	wp_enqueue_style( 'googleFonts');

	//wp_enqueue_style( 'font-awesome.', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'freerunartists-2019-style', get_template_directory_uri() . '/dist/css/style.min.css' );

	/* jquery.js  */	
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

	wp_enqueue_script( 'freerunartists-2019-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	/* barba.js  */	
/* 	wp_enqueue_script('barba-js',  '//cdnjs.cloudflare.com/ajax/libs/barba.js/1.0.0/barba.min.js', array(), '', true);
	wp_enqueue_script('barba-init-js', get_template_directory_uri() . '/dist/js/barba-init.min.js', array(), '', true);
 */
	/* fullPage.js  */	
	wp_enqueue_script('fullPage-js',  '//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js', array(), '', true);
	wp_enqueue_style('fullPage-css', '//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.css');

	/* GSAP.js  */	
	wp_enqueue_script('GSAP',  '//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js', array(), '', true);

	// Scroll Magic
	wp_enqueue_script( 'ScrollMagic','//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js', array(), null, false );
	wp_enqueue_script( 'scrollmagic-debug','//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js', array(), null, false );
	wp_enqueue_script( 'scrollmagic-gsap','//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js', array(), null, false );
	
	/* slick.js  */	
	wp_enqueue_script('slick-js',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"', array(), '', true);
	wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"');

	/* masonry.js  */	
	wp_enqueue_script('masonry-js', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '', true);

	/* freerunartists.js  */
	wp_enqueue_script('freerunartists-js', get_template_directory_uri() . '/dist/js/freerunartists.min.js', array(), '', true);
	wp_enqueue_script( 'freerunartists-2019-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'freerunartists_2019_scripts' );

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
 * Plugin Name: Press-This Custom Post Type And Taxonomy Term
 * Plugin URI:  http://wordpress.stackexchange.com/a/192065/26350
 */
/* add_filter( 'press_this_save_post', function( $data )
{
    //---------------------------------------------------------------
    // Edit to your needs:
    //
    $new_cpt    = 'press';              // new post type
    $taxonomy   = 'artists';            // existing taxonomy
    $term       = 'cristo';         	// existing term
    //---------------------------------------------------------------

    $post_object = get_post_type_object( $new_cpt );
    $tax_object  = get_taxonomy( $taxonomy );

    // Change the post type if current user can
    if( 
           isset( $post_object->cap->create_posts ) 
        && current_user_can( $post_object->cap->create_posts ) 
    ) 
        $data['post_type']  = $new_cpt;

    // Change taxonomy + term if current user can    
    if ( 
           isset( $tax_object->cap->assign_terms ) 
        && current_user_can( $tax_object->cap->assign_terms ) 
    ) 
        $data['tax_input'][$taxonomy]   = $term;

    return $data;

}, 999 ); */


/**
 * Register a custom post types.
 *
 * @see get_post_type_labels() for label keys.
 */
function fra_cpt_init() {

	//Register Credits
    $labels = array(
        'name'                  => _x( 'Credits', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Credit', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Credits', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Credit', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Credit', 'textdomain' ),
        'new_item'              => __( 'New Credit', 'textdomain' ),
        'edit_item'             => __( 'Edit Credit', 'textdomain' ),
        'view_item'             => __( 'View Credit', 'textdomain' ),
        'all_items'             => __( 'All Credits', 'textdomain' ),
        'search_items'          => __( 'Search Credits', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Credits:', 'textdomain' ),
        'not_found'             => __( 'No credits found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No credits found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Credit Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Credit archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into credit', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this credit', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter credits list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Credits list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Credits list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'credits' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
		'hierarchical'       => true,
		'taxonomies' 	      => array('category'),
		'menu_position'      => 9,
		'menu_icon'           => 'dashicons-awards',
        'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
    );

	register_post_type( 'credits', $args );
	
	//Register Press
/* 	$labels = array(
        'name'                  => _x( 'Press', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Press', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Press', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Press', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Press', 'textdomain' ),
        'new_item'              => __( 'New Press', 'textdomain' ),
        'edit_item'             => __( 'Edit Press', 'textdomain' ),
        'view_item'             => __( 'View Press', 'textdomain' ),
        'all_items'             => __( 'All Press', 'textdomain' ),
        'search_items'          => __( 'Search Press', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Press:', 'textdomain' ),
        'not_found'             => __( 'No press found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No press found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Press Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Press archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into press', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this press', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter press list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Press list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Press list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'press' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
		'hierarchical'       => true,
		'taxonomies' 	      => array('category'),
		'menu_position'      => 8,
		'menu_icon'           => 'dashicons-megaphone',
        'supports'           => array( 'title', 'thumbnail'),
    );
 
    register_post_type( 'press', $args ); */
}
 
add_action( 'init', 'fra_cpt_init' );


//Exclude pages and templates from search engine
add_action( 'wp_head', function() {


    if ( is_singular( 'credits' ) || is_post_type_archive( 'credits' ) || is_category() || in_category(7)) {
        echo '<meta name="robots" content="noindex, follow">';
	}
	
	
} );