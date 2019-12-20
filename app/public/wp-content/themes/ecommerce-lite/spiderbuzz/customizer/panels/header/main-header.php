<?php
/**
 * Main Header Settings
 *
 * @package eCommerce_Lite
 */

function ecommerce_lite_customize_register_main_header( $wp_customize ) {
    
    //Main Heaer Panel 
    $wp_customize->add_section( 'main_header_setting', array(
        'title'    => __( 'Main Header Settings', 'ecommerce-lite' ),
        'priority' => 3,
        'panel'    =>'header_setting'
    ) );

    //Header Search box Section
    $wp_customize->add_setting(
        'ecommerce_lite_main_header_search_box_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'ecommerce_lite_sanitize_checkbox',
            'transport'         =>'postMessage',
        )
    );
    $wp_customize->add_control(
		new Ecommerce_Lite_Toggle_Control( 
			$wp_customize,
			'ecommerce_lite_main_header_search_box_enable',
			array(
				'section'	  => 'main_header_setting',
				'label'		  => __( 'Enable Header Search Section', 'ecommerce-lite' ),
				'description' => __( 'Enable/Disable Search Box Section..', 'ecommerce-lite' ),
			)
		)
	);


    //Header Wishlist Section
    $wp_customize->add_setting(
        'ecommerce_lite_main_header_wishlist_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'ecommerce_lite_sanitize_checkbox',
            'transport'         =>'postMessage',
        )
    );
    $wp_customize->add_control(
		new Ecommerce_Lite_Toggle_Control( 
			$wp_customize,
			'ecommerce_lite_main_header_wishlist_enable',
			array(
				'section'	  => 'main_header_setting',
				'label'		  => __( 'Enable Header Wishlist', 'ecommerce-lite' ),
				'description' => __( 'Enable/Disable Wishlist Section.', 'ecommerce-lite' ),
			)
		)
    );


    //Header Cart Section
    $wp_customize->add_setting(
        'ecommerce_lite_main_header_cart_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'ecommerce_lite_sanitize_checkbox',
            'transport'         =>'postMessage',
        )
    );
    $wp_customize->add_control(
		new Ecommerce_Lite_Toggle_Control( 
			$wp_customize,
			'ecommerce_lite_main_header_cart_enable',
			array(
				'section'	  => 'main_header_setting',
				'label'		  => __( 'Enable Header Cart Section', 'ecommerce-lite' ),
				'description' => __( 'Enable/Disable Header Cart Section..', 'ecommerce-lite' ),
			)
		)
    );


    //Header User Section
    $wp_customize->add_setting(
        'ecommerce_lite_main_header_user_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'ecommerce_lite_sanitize_checkbox',
            'transport'         =>'postMessage',
        )
    );
    $wp_customize->add_control(
		new Ecommerce_Lite_Toggle_Control( 
			$wp_customize,
			'ecommerce_lite_main_header_user_enable',
			array(
				'section'	  => 'main_header_setting',
				'label'		  => __( 'Enable Header User Section', 'ecommerce-lite' ),
				'description' => __( 'Enable/Disable Header User Section Section.', 'ecommerce-lite' ),
			)
		)
    );
    
    

}
add_action( 'customize_register', 'ecommerce_lite_customize_register_main_header' );