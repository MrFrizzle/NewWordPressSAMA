<?php
/**
 * Onsell Products  Settings
 *
 * @package eCommerce_Lite
 */
function ecommerce_lite_customize_register_onsell_products( $wp_customize ) {
   
    
    //Products Category
    $wp_customize->add_section( 'onsell_products_section', array(
        'title'    => esc_html__( 'Onsell Products', 'ecommerce-lite' ),
        'priority' => 5,
        'panel'    =>'ecommerce_lite_homepage_setting'
	) );

	/******************************************************************************
	 * 					Products Tabs Slider Enable
	 ***************************************************************************/
    //Products Tab Title
    $wp_customize->add_setting(
        'onsell_products_title',
        array(
            'default'           => 'Onsell Products',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage',
        )
    );
    
    $wp_customize->add_control(
		'onsell_products_title',
		array(
			'section'	  => 'onsell_products_section',
			'label'		  => esc_html__( 'Products  Header Title', 'ecommerce-lite' ),
			'description' => esc_html__( 'Products Header Title Display', 'ecommerce-lite' ),
            'type'        => 'text'
		)		
	);
	
	
	
    /******************************************************************************
	 * 					Products Category Number of Products
	 ***************************************************************************/
	//Products Category Number of Products
	$wp_customize->add_setting(
        'products_onsell_number_of_products',
        array(
            'default'           => 8,
            'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
		'products_onsell_number_of_products',
		array(
			'section'	  => 'onsell_products_section',
			'label'		  => esc_html__( 'Number of Products', 'ecommerce-lite' ),
			'description' => esc_html__( 'Number of Products Display on Tab Section.', 'ecommerce-lite' ),
            'type'        => 'number'
		)		
    );
    

}
add_action( 'customize_register', 'ecommerce_lite_customize_register_onsell_products' );