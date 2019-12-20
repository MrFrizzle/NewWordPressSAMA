<?php
/**
 * General  Settings
 *
 * @package ecommerce_lite
 */

function ecommerce_lite_customize_register_general( $wp_customize ) {
    
    $wp_customize->add_panel( 'general_setting', array(
        'title'      => __( 'General Settings', 'ecommerce-lite' ),
        'priority'   => 35
    ) );
        
}
add_action( 'customize_register', 'ecommerce_lite_customize_register_general' );