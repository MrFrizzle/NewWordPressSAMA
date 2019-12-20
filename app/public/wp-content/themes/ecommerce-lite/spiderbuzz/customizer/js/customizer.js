/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	/*********************************************
	 * Site title and description.
	 ********************************************/
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


	/*********************************************
	 * Top Header Banner Section top_header_section_info
	 ********************************************/
	/** top header section enable */
	wp.customize( 'ecommerce_lite_top_header_section_enable', function( value ) {
		value.bind( function( enable ) {
			if( enable == true ){
				$("#top_header_section_enable").fadeIn('slow');
			}else{
				$("#top_header_section_enable").fadeOut('slow');
			}
		})
	});

	/************************************************
	 * Main Header Settings 
	 ***********************************************/
	//search form
	wp.customize( 'ecommerce_lite_main_header_search_box_enable', function( value ) {
		value.bind( function( newval ) {
			if(newval == true){
				$( '.header-search' ).fadeIn('slow');
			}else{
				$( '.header-search' ).fadeOut('slow');
			}
			
		} );
	} );

	//wishlist enable/disable
	wp.customize( 'ecommerce_lite_main_header_wishlist_enable', function( value ) {
		value.bind( function( newval ) {
			if(newval == true){
				$( 'li#header-wishlist' ).fadeIn('slow');
			}else{
				$( 'li#header-wishlist' ).fadeOut('slow');
			}
			
		} );
	} );

	//add to cart
	wp.customize( 'ecommerce_lite_main_header_cart_enable', function( value ) {
		value.bind( function( newval ) {
			if(newval == true){
				$( 'div.header-cart' ).fadeIn('slow');
			}else{
				$( 'div.header-cart' ).fadeOut('slow');
			}
			
		} );
	} );

	//user section
	wp.customize( 'ecommerce_lite_main_header_user_enable', function( value ) {
		value.bind( function( newval ) {
			if(newval == true){
				$( 'li#header-login' ).fadeIn('slow');
			}else{
				$( 'li#header-login' ).fadeOut('slow');
			}
			
		} );
	} );

	

	/************************************************
	 * eCommerce Products Tabs 
	 ***********************************************/
	wp.customize( 'products_tabs_title', function( value ) {
		value.bind( function( newval ) {
			$( 'h6#products_tabs_title' ).html( newval );
		} );
	} );

    
} )( jQuery );
