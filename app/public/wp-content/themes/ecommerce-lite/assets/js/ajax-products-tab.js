

/***************************************************************************
*								Project Tab Ajax Call 
***************************************************************************/
jQuery(document).ready(function () {
    
    // Sticky Header JS
    var newsIndex = []; 
    for(var i=0, len=localStorage.length; i<len; i++){
        var key = localStorage.key(i);
        if(key == null) continue;
        var value = localStorage[key];
        if(key.search('news_section') >= 0){
            newsIndex.push(key);
        }
    }
    for(var i = 0 ; i <= newsIndex.length; i ++){
        localStorage.removeItem(newsIndex[i]);
    }

    jQuery('.ecommerce-shop-products-tab').on('click', 'li.ecommerce-shop-products-tabs-title', function(e) {
        e.preventDefault();
        var select_category_id = jQuery( this ).attr( 'select_category_id' );
        var tab_product_count = jQuery( this ).attr('tab_product_count');
        var tab_slider_enable = jQuery( this ).attr('tab_slider_enable');

        var widget = jQuery(this).closest(".news_class");

        var id = jQuery(widget).attr('id');

        var storage_id = id + "-" +select_category_id;

        var data = localStorage.getItem(storage_id);

        var that = jQuery( this );

        var ecommerce_lite_tab_content = that.closest(".products-tab-wraper").find(".products-tab-section");

        jQuery.ajax({
            url : eCommerceLite.ajaxurl,
            type : 'post',
            data : {
                action : 'category_tab_products',
                post_id : select_category_id,
                prduct_count : tab_product_count,
                tab_slider_enable: tab_slider_enable
            },
            success : function( response ) {
                setTimeout(function() {
                    localStorage.setItem(storage_id, data);
                    jQuery(ecommerce_lite_tab_content).html(response);

                    //Products Tab Section
                    jQuery(".product-tab1").owlCarousel({
                        items : 1,
                        itemsCustom : false,
                        itemsDesktop : [1199, 1],
                        itemsDesktopSmall : [979, 1],
                        itemsTablet : [768, 1],
                        itemsTabletSmall : true,
                        itemsMobile : [480, 1],
                        autoPlay : false,
                        navigation : true,
                        navigationText : ['<i class="fa fa-chevron-left"></i><span class="prev">Prev</span>','<span class="next">Next</span><i class="fa fa-chevron-right"></i>']
                    });

                }, 1000);

                
    
            },
            beforeSend: function() {
                    jQuery(ecommerce_lite_tab_content).html('<br /><br /><div class="ajax-loader" style="height:320px;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>');
                },
            
        });
                    
    });     
});
