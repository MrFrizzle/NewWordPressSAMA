<?php
/**
 * Banner Sections
 * Front-page Brand Logo Functions Hear
 * 
 */
 function ecommerce_lite_homepage_banner_sections(){
    //default value
    $banner_default = array(
            array(
                'banner_image'     => get_template_directory_uri().'/assets/images/mac-add.jpg',
                'banner_links'     => 'https://www.ecommerce-lite.com/custom-category-link'                      
            ),
            array(
                'banner_image'     => get_template_directory_uri().'/assets/images/mac-add.jpg',
                'banner_links'     => 'https://www.ecommerce-lite.com/custom-category-link'                      
            ),
            array(
                'banner_image'     => get_template_directory_uri().'/assets/images/mac-add.jpg',
                'banner_links'     => 'https://www.ecommerce-lite.com/custom-category-link'                      
            ),
            array(
                'banner_image'     => get_template_directory_uri().'/assets/images/mac-add.jpg',
                'banner_links'     => 'https://www.ecommerce-lite.com/custom-category-link'                      
            ),
        );

    $ecommerce_lite_homepage_banner = get_theme_mod( 'ecommerce_lite_homepage_banner',$banner_default );
    ?>
        <!-- Banner Section -->
        <section id="ecommerce_lite_frontpage_banner_section" class="product-ads">
            <div class="container">
                <div class="row">
                    
                    <?php 
                    if(  $ecommerce_lite_homepage_banner ){
                        foreach( $ecommerce_lite_homepage_banner as $banner_images ){
                            
                            //Image size Default image 
                            $brand_logo_slider_image_id = $banner_images['banner_image']; 
                            if( intval($brand_logo_slider_image_id)){
                                $brand_logo_slider_image = wp_get_attachment_url( $brand_logo_slider_image_id );
                            }else{
                                $brand_logo_slider_image = $banner_images['banner_image'];
                            }
                        
                        ?>
                        <!-- Start Product ads item -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="product-ads-item">
                                <a href="<?php echo  esc_url( $banner_images['banner_links'] ); ?>">
                                    <img src="<?php echo esc_url( $brand_logo_slider_image ); ?>" >
                                </a>
                            </div>
                        </div>
                        <!--# End Products Ads Item -->
                    <?php }} ?>

                </div>
            </div>
        </section>
    <?php
}
add_action( 'homepage_brand_logo','ecommerce_lite_homepage_banner_sections' );