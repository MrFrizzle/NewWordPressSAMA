<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce_lite
 */

get_header();

ecommerce_lite_breadcrumb();#Breadcrumb Section Hear
?>

<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">

				<?php 
					if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h4 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						echo '<div class="row">';
						get_template_part( 'template-parts/content', get_post_type() );
						echo '</div>';
					endwhile; ?>

						<div class="row">
							<div class="col-md-12">
								<div class="pagination text-center">
									<?php  the_posts_pagination();  ?>
								</div>
							</div>
						</div> 
					<?php
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div><!-- #main Content Section -->
			
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
