<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce_lite
 */

get_header();

ecommerce_lite_breadcrumb();#Breadcrumb Section Hear
?>

<section class="blog single-post">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">  
					<div class="col-md-12">
						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile; // End of the loop.

						
							// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</div>
				</div>
			</div><!-- # Main-->
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- # End row -->
	</div><!-- # Container -->
</section><!-- # End Section -->
<?php
get_footer();
