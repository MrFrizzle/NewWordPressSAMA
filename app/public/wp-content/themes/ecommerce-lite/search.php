<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h3 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'ecommerce-lite' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h3>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; ?>

						<!-- Post Nevegation Section -->
						<div class="row">
							<div class="col-md-12">
								<div class="pagination text-center">
									<?php  the_posts_pagination();  ?>
								</div>
							</div>
						</div> 
					
					
					<?php else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div><!-- #main Content Section -->
				
				
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>

			</div><!-- #Row -->
		</div><!-- #Container -->
	</section>
<?php
get_footer();
