<?php
/**
 * Products Category Settings
 *
 * @package eCommerce_Lite
 */

function ecommerce_lite_customize_register_product_category_section( $wp_customize ) {
    
    //Products Category
    $wp_customize->add_section( 'products_category_section', array(
        'title'    => esc_html__( 'Products Category', 'ecommerce-lite' ),
        'priority' => 3,
        'panel'    =>'ecommerce_lite_homepage_setting'
	) );
	


	//Display the Display Product Count 
	$wp_customize->add_setting('products_categoreis_layout', array(
		'default'        => 'random-layout',
		'sanitize_callback' => 'ecommerce_lite_sanitize_select' //
	));
	$wp_customize->add_control('products_categoreis_layout', array(
		'label'      => esc_html__('Products Category Style', 'ecommerce-lite'),
		'description'=> esc_html__('Display Products Category Style or Layout.','ecommerce-lite'),
		'section'    => 'products_category_section',
		'settings'   => 'products_categoreis_layout',
		'type'       => 'select',
		'priority'   => 1,
		'choices'    => array(
							'random-layout'   	=> esc_html__('Random Category','ecommerce-lite'),
							'2-column'     		=> esc_html__('2 Column','ecommerce-lite'),
							'3-column'       	=> esc_html__('3 Column','ecommerce-lite'),
							'4-column'       	=> esc_html__('4 Column','ecommerce-lite')
						),
	));

    
    /** Category Section Hear */
    $wp_customize->add_setting(
		'products_categorys', 
		array(
			'default' => ecommerce_lite_get_multiple_product_categories(),
			'sanitize_callback' => 'ecommerce_lite_sanitize_multiple_check' //						
		)
	);

	$wp_customize->add_control(
		new Ecommerce_Lite_MultiCheck_Control(
			$wp_customize,
			'products_categorys',
			array(
				'section'     => 'products_category_section',
				'label'       => esc_html__( 'Products Category', 'ecommerce-lite' ),
                'description' => esc_html__( 'Select the Products Category Section.', 'ecommerce-lite' ),
				'choices'     => ecommerce_lite_get_products_categories( )
			)
		)
	);
    
    

}
add_action( 'customize_register', 'ecommerce_lite_customize_register_product_category_section' );
