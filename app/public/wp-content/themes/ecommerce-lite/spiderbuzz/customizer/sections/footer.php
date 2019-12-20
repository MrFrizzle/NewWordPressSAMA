<?php
/**
 * Copyright Settings
 *
 * @package eCommerce_Lite
 */

function ecommerce_lite_customize_register_copyright( $wp_customize ) {
    
    //Main Heaer Panel 
    $wp_customize->add_section( 'ecommerce_lite_copyright_section', array(
        'title'    => esc_html__( 'Footer Section', 'ecommerce-lite' ),
        'priority' => 110,
    ) );

    //add the Accept payment method
    $wp_customize->add_setting('ecommerce_lite_payment_method_support_image', array(
        'default'           => get_template_directory_uri().'/assets/images/payment-method.png',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ecommerce_lite_payment_method_support_image', array(
        'label'             => esc_html__('Payment Method Accepted', 'ecommerce-lite'),
        'section'           => 'ecommerce_lite_copyright_section',
        'settings'          => 'ecommerce_lite_payment_method_support_image',
        'priority'          => 2
    )));
    

}
add_action( 'customize_register', 'ecommerce_lite_customize_register_copyright' );