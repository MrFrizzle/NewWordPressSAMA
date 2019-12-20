<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eCommerce_lite
 */

get_header();
ecommerce_lite_breadcrumb();#Breadcrumb Section Hear
?>
	<section class="error-404 not-found">
      	<div class="container">
        	<div class="row">
          		<div class="col-md-9">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ecommerce-lite' ); ?></h1>
					</header><!-- .page-header -->
					<figure class="404_error">
						<img src="<?php echo esc_url( get_template_directory_uri(). '/assets/images/error-404.png' ); ?>" alt="<?php esc_attr_e( 'error image', 'ecommerce-lite' ); ?>">
					</figure>
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ecommerce-lite' ); ?></p>
					</div>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bttn"><?php esc_html_e( 'back to homepage', 'ecommerce-lite' ); ?></a>
				</div><!-- #main Content Section -->

				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>

			</div>
		</div>
	</section>
<?php
get_footer();
