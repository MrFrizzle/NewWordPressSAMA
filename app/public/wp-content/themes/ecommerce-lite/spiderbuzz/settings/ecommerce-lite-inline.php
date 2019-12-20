<?php
function ecommerce_lite_inline_css(){
	$custom_css = "";
    

    //Breadcrumb Section
    $ecommerce_lite_breadcrumbs_image = get_theme_mod( 'ecommerce_lite_breadcrumbs_image' );
    if( empty($ecommerce_lite_breadcrumbs_image)){
        $ecommerce_lite_breadcrumbs_image = get_template_directory_uri().'/assets/images/breadcrumb.png';
    }
    $custom_css .= " 
        .breadcrumb{
            
            background: url( $ecommerce_lite_breadcrumbs_image ) no-repeat center;
        }

    ";

    //Custom Header Image
    $ecommerce_lite_header_image = esc_url( get_header_image());
    $custom_css .= " 
        nav.header-image{
            background: url( $ecommerce_lite_header_image ) no-repeat center;
        }

    ";
    
	

	wp_add_inline_style( 'ecommerce-lite-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_lite_inline_css' );
