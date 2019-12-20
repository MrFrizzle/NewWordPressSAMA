<?php
/**
 * Front Page Template
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eCommerce Lite 
 */
get_header(); 


//Fontpage settings
if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    include( get_home_template() );
}else{ 
    //Default slider section
    do_action('slider-section');
    //Loop the Calling Functions
    if(ecommerce_lite_is_woocommerce_activated()){
        foreach( get_theme_mod('ecommerce_lite_home_page_sort',ecommerce_lite_customizer_section()) as $homepage_item ){
            $homepage_function = $homepage_item;
            $homepage_function();
        }
    }
}


get_footer();