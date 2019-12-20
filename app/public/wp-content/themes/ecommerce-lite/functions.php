<?php
/**
 * eCommerce Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eCommerce_lite
 */
class eCommerce_Lite_Functions{

	//Construct Function
	public function __construct(){
		/** Add Action */
		add_action( 'after_setup_theme',array($this,'ecommerce_lite_setup') );
		add_action( 'after_setup_theme',array($this,'ecommerce_lite_content_width'), 0 );
		add_action( 'widgets_init',array($this,'ecommerce_lite_widgets_init') );
    	add_action( 'wp_enqueue_scripts',array($this,'ecommerce_lite_scripts') );
		
		add_filter( 'nav_menu_submenu_css_class',array($this,'ecommerce_lite_nav_menu_submenu_css_class') );
	}

	/*===============================================================================*
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *===============================================================================*/
	function ecommerce_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on eCommerce Lite, use a find and replace
		 * to change 'ecommerce-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ecommerce-lite', get_template_directory() . '/languages' );

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
			'primary-menu' => esc_attr__( 'Primary', 'ecommerce-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ecommerce_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Registers an editor stylesheet for the theme.
		 */
		function ecommerce_lite_add_editor_styles() {
			add_editor_style( 'ecommerce-lite-custom-css' );
		}
		add_action( 'admin_init', 'ecommerce_lite_add_editor_styles' );


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
	
	/*===========================================================================
	* Sub Menu Item Add
	*=============================================================================*/
	function ecommerce_lite_nav_menu_submenu_css_class( $classes ) {
	    $classes[] = 'sidenav-dropdown';
	    return $classes;
	}
	


	/*===============================================================================
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 *===============================================================================*/
	function ecommerce_lite_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'ecommerce_lite_content_width', 640 );
	}


	/**=================================================================================
	 * Register widget area.
	 *===================================================================================*/
	function ecommerce_lite_widgets_init() {
		//Right Sidebar
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar', 'ecommerce-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="ecommerce-lite-sidebar widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );

		//woocommerce Sidebar
		register_sidebar( array(
			'name'          => esc_attr__( 'WooCommerce Sidebar', 'ecommerce-lite' ),
			'id'            => 'woocommerce',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="ecommerce-lite-sidebar widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );


		//Footer 1
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer 1', 'ecommerce-lite' ),
			'id'            => 'footer-1',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="uppercase white widget-title">',
			'after_title'   => '</h6>',
		) );

		//Footer 2
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer 2', 'ecommerce-lite' ),
			'id'            => 'footer-2',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="uppercase white widget-title">',
			'after_title'   => '</h6>',
		) );

		//Footer 3
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer 3', 'ecommerce-lite' ),
			'id'            => 'footer-3',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="uppercase white widget-title">',
			'after_title'   => '</h6>',
		) );

		//Footer 4
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer 4', 'ecommerce-lite' ),
			'id'            => 'footer-4',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="uppercase white widget-title">',
			'after_title'   => '</h6>',
		) );

		//Footer 5
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer 5', 'ecommerce-lite' ),
			'id'            => 'footer-5',
			'description'   => esc_attr__( 'Add widgets here.', 'ecommerce-lite' ),
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="uppercase white widget-title">',
			'after_title'   => '</h6>',
		) );

	}

	/**====================================================================================================
	 * Enqueue scripts and styles.
	 *===================================================================================================*/
	function ecommerce_lite_scripts() {
		//Theme Version Check
		$eCommerceLiteVer = wp_get_theme();
		$theme_version = $eCommerceLiteVer->get( 'Version' );

		//Google Fonts Enqueue
		$ecommerce_lite_google_fonts_list = array('Poppins','Roboto');
		foreach(  $ecommerce_lite_google_fonts_list as $google_font ){
			wp_enqueue_style( 'ecommerce-lite-google-fonts-'.$google_font, '//fonts.googleapis.com/css?family='.$google_font.':300italic,400italic,700italic,400,700,300', false ); 
		}
		
		//Enqueu The Style File
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/css/bootstrap.css', array(), esc_attr( $theme_version ) );#bootstrap
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.css', array(), esc_attr( $theme_version ) );#fontawesome-all
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/library/owl-carousel/css/owl.carousel.css', array(), esc_attr( $theme_version ) );#fontawesome-all
		
		wp_enqueue_style( 'ecommerce-lite-style', get_stylesheet_uri() );#main file
		wp_enqueue_style( 'ecommerce-lite-reset-css', get_template_directory_uri() . '/assets/css/reset.css', array(), esc_attr( $theme_version ) );#reset	
		wp_enqueue_style( 'ecommerce-lite-custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), esc_attr( $theme_version ) );#reset
		

		//Enqueu The JS File  
		wp_enqueue_script( 'jquery.matchHeight-min', get_template_directory_uri() . '/assets/library/jquery-match-height/jquery.matchHeight-min.js', array(), esc_attr( $theme_version), true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/library/bootstrap/js/bootstrap.js', array(), esc_attr( $theme_version), true );
		wp_enqueue_script( 'ecommerce-lite-sidenav-min', get_template_directory_uri() . '/assets/js/sidenav.min.js', array(), esc_attr( $theme_version), true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/library/owl-carousel/js/owl.carousel.js', array(), esc_attr( $theme_version), true );

		wp_enqueue_script( 'ecommerce-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $theme_version), true );
		wp_enqueue_script( 'ecommerce-lite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $theme_version), true );
		wp_enqueue_script( 'ecommerce-lite-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), esc_attr( $theme_version), true );
		

		
		//eCommerce Lite Ajax Call
		wp_register_script('ajax-products-tab-js', get_template_directory_uri() . '/assets/js/ajax-products-tab.js', array(), esc_attr( $theme_version), true );
			$localize = array(
				'ajaxurl' => admin_url('admin-ajax.php'),
			);
		wp_localize_script('ajax-products-tab-js', 'eCommerceLite', $localize);
		wp_enqueue_script('ajax-products-tab-js');


		//Enqueu the comment file 
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}


}
new eCommerce_Lite_Functions();

/**==============================================================================
 * Spiderbuzz Init 
 *================================================================================*/
 require get_template_directory() . '/spiderbuzz/init.php';

/**==============================================================================
 * Custom Controls 
 *================================================================================*/
require get_template_directory() . '/spiderbuzz/customizer/custom-controls/custom-control.php';
require get_template_directory() . '/spiderbuzz/customizer/customizer.php';

//Woocommerce Activation
function ecommerce_lite_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
