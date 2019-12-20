<?php
/******************************************************************
 * 			eCommerce Lite Plugin required
 ******************************************************************/
function ecommerce_lite_register_required_plugins() {
    /*
    * The list of Plugin Requird List
    */
    $plugins = array(

        array(
            'name' => esc_attr__( "WooCommerce", 'ecommerce-lite'),
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'YITH WooCommerce Quick View', 'ecommerce-lite'),
            'slug' => 'yith-woocommerce-quick-view',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'YITH WooCommerce Compare', 'ecommerce-lite'),
            'slug' => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'YITH WooCommerce Wishlist', 'ecommerce-lite'),
            'slug' => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'Easy Google Fonts', 'ecommerce-lite'),
            'slug' => 'easy-google-fonts',
            'required' => false,
        ),
         array(
            'name' => esc_attr__( 'Contact Form 7', 'ecommerce-lite'),
            'slug' => 'contact-form-7',
            'required' => false,
         ),
         array(
			'name' => esc_attr__( 'One Click Demo Import', 'ecommerce-lite'),
			'slug' => 'one-click-demo-import',
			'required' => false,
        ),
        array(
			'name' => esc_attr__( 'Grid/List View for WooCommerce', 'ecommerce-lite'),
			'slug' => 'gridlist-view-for-woocommerce',
			'required' => false,
		),

    );

    /*
        * Array of configuration settings. Amend each line as needed. 
    */
    $config = array(
        'id'           => 'ecommerce-lite',                 
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,                    
        'dismissable'  => true,                    
        'dismiss_msg'  => '',                       
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register','ecommerce_lite_register_required_plugins' );//Register
