<?php
/**
 * Home page Panel Settings
 *
 * @package ecommerce_lite
 */

function ecommerce_lite_customize_register_homepage( $wp_customize ) {
    
    $wp_customize->add_panel( 'ecommerce_lite_homepage_setting', array(
        'title'      => __( 'Front Page Settings', 'ecommerce-lite' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'ecommerce_lite_customize_register_homepage' );