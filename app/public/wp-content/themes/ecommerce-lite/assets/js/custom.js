
   $ = jQuery; 
    
    // tab 
    jQuery(document).ready(function(){
        
      jQuery('ul.tabs li').click(function(){
        var parent = jQuery(this).parents(".product");
        var tab_id = jQuery(this).attr('data-tab');

        parent.find('ul.tabs li').removeClass('current');
        parent.find('.tab-content').removeClass('current');

        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
      })

      jQuery('[data-sidenav]').sidenav();

      /**
      * eCommerce Lite jquery match height section
      * 
      * @since 1.0.0
      * @description Call the match height section.
     */
      jQuery('section#products_tab_section li.product .product-item').matchHeight();
      jQuery('section#products_tab_section li.product .product-detail').matchHeight();
      jQuery('ul.products li.product .product-item').matchHeight();
      

    });

    
      //Quanitity New Add
function ecommerce_lite_spinner_up_down () {
	jQuery('body').on('tap click', '.ecommerce_lite_qty_spinner .quantity-up', function() {
		var input 	= jQuery(this).parent().find('input[type="number"]'),
		max 		= input.attr('max'),
		oldValue 	= parseFloat(input.val());
		if (oldValue >= max && '' != max) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue + 1;
		}
		input.val(newVal);
		input.trigger("change");
	});
	jQuery('body').on('tap click', '.ecommerce_lite_qty_spinner .quantity-down, .ecommerce_lite_qty_spinner .quantity-down', function() {
		var input 	= jQuery(this).parent().find('input[type="number"]'),
		min 		= input.attr('min'),
		oldValue 	= parseFloat(input.val());
		if (oldValue <= min && '' != min) {
			var newVal = oldValue;
		} else {
			var newVal = oldValue - 1;
		}
		input.val(newVal);
		input.trigger("change");
	});
}

ecommerce_lite_spinner_up_down ();

    // slider
    jQuery(".ecommerce-slider").owlCarousel({
      items : 1,
      itemsCustom : false,
      itemsDesktop : [1199, 1],
      itemsDesktopSmall : [979, 1],
      itemsTablet : [768, 1],
      itemsTabletSmall : true,
      itemsMobile : [480, 1],
      autoPlay : true,
      navigation : true,
      pagination: true,
      paginationNumbers: true,
      navigationText : ['<i class="fa fa-chevron-left"></i><span class="prev">Prev</span>','<span class="next">Next</span><i class="fa fa-chevron-right"></i>']
    });

    // slider
    jQuery(".product-tab, .brand-slider, .testomonial-slider, .full-slider").owlCarousel({
      items : 1,
      itemsCustom : false,
      itemsDesktop : [1199, 1],
      itemsDesktopSmall : [979, 1],
      itemsTablet : [768, 1],
      itemsTabletSmall : true,
      itemsMobile : [480, 1],
      autoPlay : true,
      navigation : true,
      navigationText : ['<i class="fa fa-chevron-left"></i><span class="prev">Prev</span>','<span class="next">Next</span><i class="fa fa-chevron-right"></i>']
    });

    
    //search
    jQuery(document).ready(function(){
      jQuery('a[href="#search"]').on('click', function(event) {                    
        jQuery('#search').addClass('open');
        jQuery('#search > form > input[type="search"]').focus();
      });            
      jQuery('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
          jQuery(this).removeClass('open');
        }
      });            
    });

