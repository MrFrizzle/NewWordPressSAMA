<?php
/**
 * The spiderbuzz enqueu file for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package eCommerce_lite
 */

 if( !function_exists('ecommerce_lite_file_directory') ){

    function ecommerce_lite_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }//end condtion
    }
}

/*=========================================================================
=                         Core File Require
==========================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/core/custom-header.php');
require ecommerce_lite_file_directory('/spiderbuzz/core/template-tags.php');
require ecommerce_lite_file_directory('/spiderbuzz/core/template-functions.php');
require ecommerce_lite_file_directory('/spiderbuzz/core/customizer.php');
require ecommerce_lite_file_directory('/spiderbuzz/core/class-tgm-plugin-activation.php');

if ( defined( 'JETPACK__VERSION' ) ) {
	require ecommerce_lite_file_directory('/spiderbuzz/core/jetpack.php');
}



/*=========================================================================
=                           Load WooCommerce compatibility file.
===========================================================================*/ 
if ( class_exists( 'WooCommerce' ) ) {
    require ecommerce_lite_file_directory('/spiderbuzz/hooks/woocommerce.php');
}

require ecommerce_lite_file_directory('/spiderbuzz/hooks/ecommerce-lite-functions.php');

/*=========================================================================
=                         Default Products.
===========================================================================*/ 
require ecommerce_lite_file_directory('/spiderbuzz/default-products/default-products.php');



 /**============================================================================
 * =                             Settings 
 * =============================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/settings/ecommerce-lite-inline.php');
require ecommerce_lite_file_directory('/spiderbuzz/settings/plugin-required-list.php');

/**============================================================================
 * =                        define theme version
 * =============================================================================*/
if ( ! defined( 'ECOMMERCE_LITE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'ECOMMERCE_LITE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**============================================================================
 * =                      Homepage Section 
 * =============================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/products-tab/ajax-products-tab.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/products-tab.php');

/**============================================================================
 * =                      Products section 
 * =============================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/slider-section.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/service-box.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/banner.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/product-categories.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/onsell-products.php');
require ecommerce_lite_file_directory('/spiderbuzz/templates/home/single-category-products.php');



/**============================================================================
 * =                     Add the Admin page
 * =============================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/admin/class-ecommerce-lite-admin.php');


/**============================================================================
 * =                     Demo Import
 * =============================================================================*/
require ecommerce_lite_file_directory('/spiderbuzz/demo-import/demo-import.php');

