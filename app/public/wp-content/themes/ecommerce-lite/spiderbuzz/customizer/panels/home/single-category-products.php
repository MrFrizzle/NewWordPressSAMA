<?php
/**
 * Products Tabs  Settings
 *
 * @package eCommerce_Lite
 */

function ecommerce_lite_customize_register_single_category_products( $wp_customize ) {
   
    
    //Products Category
    $wp_customize->add_section( 'single_category_products', array(
        'title'    => esc_html__( 'Single Category Products', 'ecommerce-lite' ),
        'priority' => 5,
        'panel'    =>'ecommerce_lite_homepage_setting'
	) );
    
    
	/******************************************************************************
	 * 					Products Tabs Slider Enable
	 ***************************************************************************/
    //Products Tab Title
    $wp_customize->add_setting(
        'single_category_products_title',
        array(
            'default'           => 'Populor Products',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    $wp_customize->add_control(
		'single_category_products_title',
		array(
			'section'	  => 'single_category_products',
			'label'		  => esc_html__( 'Title', 'ecommerce-lite' ),
            'type'        => 'text'
		)		
	);
	//select refresh
	$wp_customize->selective_refresh->add_partial( 'single_category_products_title', array(
        'selector' 			=> '#single_category_products_title',
        'render_callback' 	=> 'ecommerce_lite_single_category_products_title',
    ) );
	
	
    /******************************************************************************
	 * 					Category Section Hear 
	 ***************************************************************************/
    
    $wp_customize->add_setting( 
        'single_category_select_opt', 
        array(
            'sanitize_callback' => 'ecommerce_lite_sanitize_select'
        )
    );
    $wp_customize->add_control( 
        'single_category_select_opt', 
        array(
            'label' => esc_html__( 'Select Category', 'ecommerce-lite' ),
            'section' => 'single_category_products',
            'type' => 'select',
            'choices' => ecommerce_lite_get_products_categories()
        )
    );      

	//Products Category Number of Products
	$wp_customize->add_setting(
        'single_category_number_of_products',
        array(
            'default'           => 8,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
		'single_category_number_of_products',
		array(
			'section'	  => 'single_category_products',
			'label'		  => esc_html__( 'Number of Products', 'ecommerce-lite' ),
			'description' => esc_html__( 'Number of Products Display on Tab Section.', 'ecommerce-lite' ),
            'type'        => 'number'
		)		
    );
    

}
add_action( 'customize_register', 'ecommerce_lite_customize_register_single_category_products' );