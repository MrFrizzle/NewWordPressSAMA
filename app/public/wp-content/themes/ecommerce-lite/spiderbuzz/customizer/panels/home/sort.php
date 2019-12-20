<?php
/**
 * Home Page Sort Settings
 *
 * @package Ecommerce Lite
 */
function ecommerce_lite_homepage_short( $wp_customize ){
    
    /** Homepage Sort Section */   
    $wp_customize->add_section( 'ecommerce_lite_homepage_short', array(
        'title'    => esc_html__( 'Sort Home Page Section', 'ecommerce-lite' ),
        'priority' => 10,
        'panel'    => 'ecommerce_lite_homepage_setting',
    ) ); 
    
    /** Homepage Sort Settings*/
    $wp_customize->add_setting(
		'ecommerce_lite_home_page_sort', 
		array(
			'default' => ecommerce_lite_customizer_section(),
			'sanitize_callback' => 'ecommerce_lite_sanitize_sortable',						
		)
	);

    /** Homepage Sort Controls */
	$wp_customize->add_control(
		new Ecommerce_Lite_Drag_Section_Control(
			$wp_customize,
			'ecommerce_lite_home_page_sort',
			array(
				'section'     => 'ecommerce_lite_homepage_short',
				'label'       => esc_html__( 'Homepage Sort Sections', 'ecommerce-lite' ),
				'description' => esc_html__( 'Sort or toggle home page sections.', 'ecommerce-lite' ),
				'choices'     => array(
            		'ecommerce_lite_homepage_service_section'       	=> esc_html__( 'Service Box Section', 'ecommerce-lite' ),
					'ecommerce_lite_homepage_products_category' 		=> esc_html__( 'Products Category Section', 'ecommerce-lite' ),
					'ecommerce_lite_homepage_banner_sections'			=> esc_html__(  'Banner Section','ecommerce-lite'),
					'ecommerce_lite_homepage_products_tabs'      		=> esc_html__( 'Products Tab Section', 'ecommerce-lite' ),
					'ecommerce_lite_homepage_products_upsell' => esc_html__( 'Onsell Products Section', 'ecommerce-lite' ),
					'ecommerce_lite_homepage_single_category_products'	=> esc_html__( 'Single Category Products', 'ecommerce-lite' ),
				),
			)
		)
	);
    
}
add_action( 'customize_register', 'ecommerce_lite_homepage_short' );

/*****************************************************
 * Homepage Settings 
****************************************************/
function ecommerce_lite_customizer_section(){

	//woocommerce class
	if( ecommerce_lite_is_woocommerce_activated() ){
		$ecommerce_lite_woocommerce_section_array = array('ecommerce_lite_homepage_products_category','ecommerce_lite_homepage_service_section', 'ecommerce_lite_homepage_banner_sections','ecommerce_lite_homepage_products_tabs','ecommerce_lite_homepage_products_upsell','ecommerce_lite_homepage_single_category_products');
	}else{
		$ecommerce_lite_woocommerce_section_array = array();
	}

	//Retrurn Array File
	return $ecommerce_lite_woocommerce_section_array ;
}