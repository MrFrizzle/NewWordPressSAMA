<?php
/**
 * eCommerce LiteTheme Customizer
 *
 * @package eCommerce_Lite
 */

 //Call All Panel Section
$ecommerce_lite_panels   = array( 'header','general', 'home' );
$ecommerce_lite_sections = array( 'woocommerce', 'footer' );
$ecommerce_lite_sub_sections = array(
    'header'     => array( 'logo-brand','top-header', 'main-header' ),
    'home'       => ecommerce_lite_customizer_section_register(),
    'general'    => array( 'basic' ),
    
);

foreach( $ecommerce_lite_sections as $section ){
    require get_template_directory() . '/spiderbuzz/customizer/sections/' . $section . '.php';
}

foreach( $ecommerce_lite_panels as $panel ){
   require get_template_directory() . '/spiderbuzz/customizer/panels/' . $panel . '.php';
}

foreach( $ecommerce_lite_sub_sections as $k => $v ){
    foreach( $v as $w ){        
        require get_template_directory() . '/spiderbuzz/customizer/panels/' . $k . '/' . $w . '.php';
    }
}

/**
 * Basic Js File enqueue Section
 */
function ecommerce_lite_customize_preview_js() {
	wp_enqueue_style( 'ecommerce-lite-customizer', get_template_directory_uri() . '/spiderbuzz/customizer/css/customizer.css', array(), ECOMMERCE_LITE_THEME_VERSION );
    wp_enqueue_script( 'ecommerce_lite_customizer', get_template_directory_uri() . '/spiderbuzz/customizer/js/customizer.js', array( 'customize-preview', 'customize-selective-refresh' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ecommerce_lite_customize_preview_js' );


function ecommerce_lite_customizer_scripts() {
    wp_enqueue_style( 'ecommerce-lite-customize',get_template_directory_uri().'/spiderbuzz/customizer/css/customize.css', ECOMMERCE_LITE_THEME_VERSION, 'screen' );
    wp_enqueue_script( 'ecommerce-lite-customize', get_template_directory_uri() . '/spiderbuzz/customizer/js/customize-homepage.js', array( 'jquery' ), '20170404', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ecommerce_lite_customizer_scripts' );



/**
 * Sanitize callback for checkbox
*/
require get_template_directory() . '/spiderbuzz/customizer/sanitization-functions.php';
require get_template_directory() . '/spiderbuzz/customizer/customizer-callback.php';


/*****************************************************
 * Homepage Settings 
****************************************************/
function ecommerce_lite_customizer_section_register(){

	//woocommerce class
	if( ecommerce_lite_is_woocommerce_activated() ){
		$ecommerce_lite_woocommerce_section_array = array('slider','product-categories','products-tabs','single-category-products','servicebox','banner','onsell-products','sort');
	}else{
		$ecommerce_lite_woocommerce_section_array = array('slider');
	}

	//Retrurn Array File
	return $ecommerce_lite_woocommerce_section_array ;
}
