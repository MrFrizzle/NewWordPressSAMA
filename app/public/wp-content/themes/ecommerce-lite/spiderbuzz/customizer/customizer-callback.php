<?php

/****************************************************************
 *                 Header Section Callback
 *****************************************************************/
/** Top Header  */
if( ! function_exists( 'ecommerce_lite_top_header_section_info_callback' ) ) {
    /**
     * Display product tab
    */
    function ecommerce_lite_top_header_section_info_callback(){
        return get_theme_mod( 'ecommerce_lite_top_header_section_info', esc_html__( 'GET 500ISCOUNT IN SUMMER WEEK FASHION', 'ecommerce-lite' ) );
    }
}


/****************************************************************
 *               Homepage Sections
 *****************************************************************/
/** Products Tab Title */
if( ! function_exists( 'ecommerce_lite_products_tabs_title' ) ) {
    /**
     * Display product tab
    */
    function ecommerce_lite_products_tabs_title(){
        return get_theme_mod( 'products_tabs_title', esc_html__( 'Populor Products', 'ecommerce-lite' ) );
    }
}

/** Slider All Category Section */
if( ! function_exists( 'ecommerce_lite_slider_category_list_header_text' ) ) {
    /**
     * Display product tab
    */
    function ecommerce_lite_slider_category_list_header_text(){
        return get_theme_mod( 'ecommerce_lite_slider_category_list_header_text', esc_html__( 'All Categoryes', 'ecommerce-lite' ) );
    }
}


/** Slider All Category Section */
if( ! function_exists( 'slider_button_text_change_callback' ) ) {
    /**
     * Display product tab
    */
    function slider_button_text_change_callback(){
        return get_theme_mod( 'slider_button_text_change', esc_html__( 'Buy Now', 'ecommerce-lite' ) );
    }
}
