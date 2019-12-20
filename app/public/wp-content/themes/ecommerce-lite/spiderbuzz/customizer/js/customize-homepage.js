
//Scroll to section
jQuery('body').on('click', 'ul#sub-accordion-panel-ecommerce_lite_homepage_setting li', function(event) {
    //li variable section
    var section_id = $(this).attr('id');
	scrollToSection( section_id );
	
});

//scroll funcions
function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        // Homepage Slider
        case 'accordion-section-frontpage_slider_section':
        preview_section_id = "frontpage_slider_section";
        break;

        //ecommerce lite products category section
        case 'accordion-section-products_category_section':
        preview_section_id = "products_category_section";
        break;

        //ecommerce lite servicebox section
        case 'accordion-section-frontpage_service_box_section':
        preview_section_id = "frontpage_service_box_section";
        break;


        //ecommerce lite banner and products category
        case 'accordion-section-banner_and_products_category':
        preview_section_id = "banner_and_products_category";
        break;

        //ecommerce lite banner section
        case 'accordion-section-ecommerce_lite_frontpage_banner_section':
        preview_section_id = "ecommerce_lite_frontpage_banner_section";
        break;


        //ecommerce lite products tabs
        case 'accordion-section-products_tab_section':
        preview_section_id = "products_tab_section";
        break;

    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}

