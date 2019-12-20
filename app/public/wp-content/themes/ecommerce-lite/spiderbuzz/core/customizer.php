<?php
/**
 * eCommerce Lite Theme Customizer
 *
 * @package eCommerce_lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ecommerce_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ecommerce_lite_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ecommerce_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ecommerce_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ecommerce_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ecommerce_lite_customize_preview_js1() {
	//Theme Version Check
		$eCommerceLiteVer = wp_get_theme();
		$theme_version = $eCommerceLiteVer->get( 'Version' );

	wp_enqueue_script( 'ecommerce-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), $theme_version, true );
}
add_action( 'customize_preview_init', 'ecommerce_lite_customize_preview_js1' );
