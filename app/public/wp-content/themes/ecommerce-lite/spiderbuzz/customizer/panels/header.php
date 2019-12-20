<?php
/**
 * Header  Settings
 *
 * @package ecommerce_lite
 */

function ecommerce_lite_customize_register_header( $wp_customize ) {
    
    $wp_customize->add_panel( 'header_setting', array(
        'title'      => __( 'Logo & Header Settings', 'ecommerce-lite' ),
        'priority'   => 1
    ) );
        
}
add_action( 'customize_register', 'ecommerce_lite_customize_register_header' );