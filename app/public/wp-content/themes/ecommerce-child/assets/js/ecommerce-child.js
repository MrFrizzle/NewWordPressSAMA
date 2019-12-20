jQuery(document).ready( function(){    

    /**
	 * Match height js
     * 
	 * @since 1.0.0
     * @description woocommerce products tab section display options
	 */
    jQuery('.products-tab .product-item').matchHeight();
    jQuery('body.archive ul.products li.product .product-item ').matchHeight();


    /* **
    * Sub Menu
    **/
   $('nav .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-plus" aria-hidden="true"></i> </span>');
   $('nav .page_item_has_children').append('<span class="sub-toggle-children"> <i class="fa fa-plus" aria-hidden="true"></i> </span>');

   $('nav .sub-toggle').click(function () {
       $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
       $(this).children('.fa-plus').first().toggleClass('fa-minus');
   });

   $('.navbar .sub-toggle-children').click(function () {
       $(this).parent('.page_item_has_children').children('ul.sub-menu').first().slideToggle('1000');
       $(this).children('.fa-plus').first().toggleClass('fa-minus');
   });


});
