jQuery(document).ready(function($) {
    "use strict";
    
    /**
     * Script for image selected from radio option
     */
    $('.controls#ecommerce-lite-img-container li img').click(function(){
        $('.controls#ecommerce-lite-img-container li').each(function(){
            $(this).find('img').removeClass ('ecommerce-lite-radio-img-selected') ;
        });
        $(this).addClass ('ecommerce-lite-radio-img-selected') ;
    });

});