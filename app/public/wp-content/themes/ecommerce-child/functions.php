<?php
/**
 * Dequeue parent theme style and scripts
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 * @package ecommerce-lite
 */
function ecommerce_child_enqueue_scripts() {
	//remove css from parent
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/custom.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'ecommerce-lite-style' ) );

   //Theme Version Check 
    $ecommerce_child_var = wp_get_theme();
    $theme_version = $ecommerce_child_var->get( 'Version' );

   //Google Fonts Enqueue
    $ecommerce_child_google_fonts_list = array('Dosis','Poppins');
    foreach(  $ecommerce_child_google_fonts_list as $google_font ){
        wp_enqueue_style( 'google-fonts-'.$google_font, '//fonts.googleapis.com/css?family='.$google_font.':300italic,400italic,700italic,400,700,300', false ); 
    }

    //enque the file
    wp_enqueue_script( 'matchheight', get_theme_file_uri( '/assets/js/matchheight/jquery.matchHeight.js' ),$theme_version, '', true );
    wp_enqueue_script( 'ecommerce-child-js', get_theme_file_uri( '/assets/js/ecommerce-child.js' ),$theme_version, '', true );
    

   
}
add_action( 'wp_enqueue_scripts', 'ecommerce_child_enqueue_scripts', 100 );



/**
 * Remove the footer file
 * @since 1.0.0
 */
remove_action( 'ecommerce_lite_footer_content','ecommerce_lite_footer_copyright_area',2 );
remove_action( 'ecommerce_lite_footer_content','ecommerce_lite_footer_section_widgets_area',1 );
/**
 * Add the footer section
 */
if ( ! function_exists( 'ecommerce_lite_footer_section_widgets_area' ) ) {

    function ecommerce_lite_footer_section_widgets_area(){
        if( get_theme_mod('ecommerce_accept_payment_enable',false) != true ): return; endif;

        $payment_method_image = get_theme_mod('ecommerce_lite_payment_method_support_image');
        $ecommerce_copyright_we_accepted_text = get_theme_mod('ecommerce_copyright_we_accepted_text', esc_html__('We Accept', 'ecommerce-child'));
        $ecommerce_copyright_we_accepted_sort_desc = get_theme_mod('ecommerce_copyright_we_accepted_sort_desc', esc_html__('We accept Cards shown below. We accept these kinds of cards so that our customer feel easy and quick to pay us.', 'ecommerce-child'));
        
        ?>
        <section class="before-footer-section">
            <div class="container">
                <div class="before-footer-content">
                    <?php if( !empty($ecommerce_copyright_we_accepted_text) ): ?><h2 class="before-footer-content"><?php echo esc_html($ecommerce_copyright_we_accepted_text); ?></h2><?php endif; ?>
                    <?php if( !empty($ecommerce_copyright_we_accepted_sort_desc) ): ?>
                        <div class="before-content-text">
                            <?php echo esc_html($ecommerce_copyright_we_accepted_sort_desc); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($payment_method_image) ): ?><img src="<?php echo esc_url($payment_method_image); ?>" alt="" class="before-footer-images"><?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
add_action('ecommerce_lite_footer_content','ecommerce_lite_footer_section_widgets_area',1);



/**
 * Add the footer copyright section
 * @since 1.0.0
 */
if ( ! function_exists( 'ecommerce_lite_footer_copyright_area' ) ) {

    function ecommerce_lite_footer_copyright_area(){
        ?>
        <section class="footer-copyright-section">
            <div class="container">
                <div class="footer-copyright-content">
                    <div class="conten-copyrightt-text pull-left">
                        <?php echo esc_html__('Proudly powered by ','ecommerce-child'); ?>
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ecommerce-child' ) ); ?>">
                            <?php
                            /* translators: %s: CMS name, i.e. WordPress. */
                            printf( esc_html__( '%s', 'ecommerce-child' ), 'WordPress' );
                            ?>
                        </a>
                    </div>
                    <div class="conten-copyrightt-text pull-right">
                    <?php echo esc_html__('Theme: eCommerce Child by','ecommerce-child'); ?>
                            <a href="<?php echo esc_url('http://spiderbuzz.com','ecommerce-child'); ?>">
                                <?php
                                    /* translators: 1: Theme name, 2: Theme author. */
                                    printf( esc_html__( ' %1$s.', 'ecommerce-child' ),  'Spiderbuzz' );
                                ?>
                            <!-- .site-info -->
                            </a>
                        </span>
                    </div>
                    
                </div>
                
            </div>
        </section>
        <?php
    }
}
add_action('ecommerce_lite_footer_content','ecommerce_lite_footer_copyright_area',2);


/**
 * 
 *
 ** @package Buzznews
 */
function ecommerce_child_customizer_section( $wp_customize ) {
    
    //enable section
    $wp_customize->add_setting( 
        'ecommerce_accept_payment_enable', 
        array(
            'default' => false,
            'sanitize_callback' => 'ecommerce_child_sanitize_checkbox'
        )
    );
    $wp_customize->add_control( 
        'ecommerce_accept_payment_enable', 
        array(
            'section'	  => 'ecommerce_lite_copyright_section',
            'label'		  => esc_html__( 'Disable Accept Payment', 'ecommerce-child' ),
            'description' => esc_html__( 'Enable/Disable Accept Payment.', 'ecommerce-child' ),
            'type' => 'checkbox',
            'priority'    => 1,
        )
    ); 

    //buzznews slider section
	$wp_customize->add_setting(
        'ecommerce_copyright_we_accepted_text',
        array(
            'default'           => esc_html__('We Accept','ecommerce-child'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'ecommerce_copyright_we_accepted_text',
		array(
			'section'	  => 'ecommerce_lite_copyright_section',
            'label'		  => esc_html__( 'Payment Method Accepted Title', 'ecommerce-child' ),
            'type'        => 'text',
            'priority'    => 1,
		)		
    );
   

    //buzznews slider section
	$wp_customize->add_setting(
        'ecommerce_copyright_we_accepted_sort_desc',
        array(
            'default'           => esc_html__('We accept Cards shown below. We accept these kinds of cards so that our customer feel easy and quick to pay us.','ecommerce-child'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
		'ecommerce_copyright_we_accepted_sort_desc',
		array(
			'section'	  => 'ecommerce_lite_copyright_section',
            'label'		  => esc_html__( 'Payment Method Accepted Sort Desc', 'ecommerce-child' ),
            'type'        => 'text',
            'priority'    => 2,
		)		
    );
    

}
add_action( 'customize_register', 'ecommerce_child_customizer_section' );


//checkbox sanitization function
function ecommerce_child_sanitize_checkbox( $input ){
             
    //returns true if checkbox is checked
    return ( isset( $input ) ? true : false );
}