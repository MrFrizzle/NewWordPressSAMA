<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" >
<?php wp_body_open(); ?>
<div id="page" class="site">

<a class="skip-link screen-reader-text" href="#content">
	<?php _e( 'Skip to content', 'ecommerce-lite' ); ?></a>
	
	<?php do_action('ecommerce_lite_nav_before'); #Nav Before Section ?>
		<!-- nav -->
		<nav  class="header-image">
			<div class="container clearfix">
				
				<!-- Header Content Hear  -->
				<?php  do_action( 'ecommerce_lite_header_content' ); #Header Content  ?>
				
			</div>
			<?php ecommerce_lite_header_searchbox();#Search Header Box ?>
		</nav>

	<?php do_action('ecommerce_lite_nav_after'); #Nav After Nav Section ?>

	<div id="content" class="site-content">