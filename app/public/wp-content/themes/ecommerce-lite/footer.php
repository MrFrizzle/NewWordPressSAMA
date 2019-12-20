<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_lite
 */

?>

	</div><!-- #content -->
	<?php
		/**
		 * Hook: Footer Before Hooks
		 * 
		 */
		do_action('ecommerce_lite_before_footer');
	?>
	<!-- footer -->
	<footer itemscope itemtype="http://schema.org/WPFooter">
			
		<?php 

			/**
			 * Hook: Footer Contet Hear
			 *
			 * @hooked ecommerce_lite_footer_section_widgets_area - 1 (Widgets Area Section )
			 * @hooked ecommerce_lite_footer_copyright_area - 2  ( Copyright section And Payment Method Support )
			 */
			do_action( 'ecommerce_lite_footer_content' ); 
		?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
