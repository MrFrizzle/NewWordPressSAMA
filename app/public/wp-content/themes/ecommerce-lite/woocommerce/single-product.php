<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//woocommerce column section
$woocommerce_single_page_sidebar_options = get_theme_mod('woocommerce_single_page_sidebar_options','full-width');

//condtion for sidebar
if( $woocommerce_single_page_sidebar_options == 'full-width' ){
    $woocommerce_single_page_sidebar_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}else{
    $woocommerce_single_page_sidebar_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
}

get_header( 'shop' ); ?>
		<!-- single-product -->
    <section class="breadcrumb">
        <div class="container"> 
            <div class="row">
              <div class="col-md-12"> 
                    <div class="breadcrumb_wrap">
					<?php
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>
					</div>
                </div>
            </div>
        </div>
    </section>

    <!-- single-product -->
    <section class="blog product single-product">
        <div class="container">
            <div class="row">
                    <!-- single page sidebar -->
                    <?php if( $woocommerce_single_page_sidebar_options == 'sidebar-left' ): ?>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php
                                /**
                                 * woocommerce_sidebar hook.
                                 *
                                 * @hooked woocommerce_get_sidebar - 10
                                 */
                                get_sidebar('woocommerce');
                            ?>
                        </div>
                    <?php endif; ?>
                    <!-- end single page sidebar -->

                    <div class="<?php echo esc_attr($woocommerce_single_page_sidebar_class ); ?>">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>
					</div>
                    
                    <!-- single page sidebar -->
                    <?php if( $woocommerce_single_page_sidebar_options == 'sidebar-right' ): ?>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php
                                /**
                                 * woocommerce_sidebar hook.
                                 *
                                 * @hooked woocommerce_get_sidebar - 10
                                 */
                                get_sidebar('woocommerce');
                            ?>
                        </div>
                    <?php endif; ?>
                    <!-- end single page sidebar -->

					<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
                    
				</div>
        	</div>
        </div>
    </section>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
