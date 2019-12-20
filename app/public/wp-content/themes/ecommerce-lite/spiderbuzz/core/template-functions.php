<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eCommerce_lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ecommerce_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	//is active category sidebar list then
	if( get_theme_mod('ecommerce_lite_slider_category_list_enable',false) == true ){
		$classes[] = 'frontpage-category-slider-list';
	}

	return $classes;
}
add_filter( 'body_class', 'ecommerce_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ecommerce_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ecommerce_lite_pingback_header' );


/**
 * Thumbnail Image Settings
 */
function ecommerce_lite_fallbacck_thumbnail() {
	//Fallback Image
	$fallback_thumbnail_image = get_theme_mod( 'ecommerce_lite_archive_page_feedback_thumbnail',true );
	$fallback_image = get_template_directory_uri().'/assets/images/fallback/default-post-thumbnail.png';
	?>
	<?php if ( has_post_thumbnail() ) { ?> 
		<figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<?php ecommerce_lite_post_thumbnail( 'full', array( 'itemprop' => 'Url' )  ); ?>
		</figure>
	<?php	
	}elseif( $fallback_thumbnail_image == true ){ ?>
		<figure itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<img src="<?php echo esc_url( $fallback_image ); ?>" alt="" >
		</figure>
	<?php }

}
add_action( 'ecommerce_thumbnail_image', 'ecommerce_lite_fallbacck_thumbnail' );