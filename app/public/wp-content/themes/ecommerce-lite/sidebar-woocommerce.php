<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_lite
 */


?>
<?php if(  is_active_sidebar('woocommerce')){ ?>
	<aside id="woocommerce-sidebar" class="widget-area" itemscope itemtype="http://schema.org/WPSideBar" >
		<?php dynamic_sidebar( 'woocommerce' ); ?>
	</aside><!-- #woocommerce-sidebar -->
<?php }else{ ?>
	<aside id="woocommerce-sidebar" class="widget-area" itemscope itemtype="http://schema.org/WPSideBar" >
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #woocommerce-sidebar -->
<?php } ?>
