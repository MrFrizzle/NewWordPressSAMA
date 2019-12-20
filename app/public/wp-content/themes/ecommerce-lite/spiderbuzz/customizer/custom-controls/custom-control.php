<?php
/**
 * Register Custom Controls
*/

function ecommerce_lite_controls( $wp_customize ){

    
//Customizer Settings
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/toggle/class-toggle-control.php';
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/sortable/class-sortable-control.php';
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/multicheck/class-multicheck-control.php';
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/radio/class-control-radio.php';


//Repeater Section
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/repeater/class-repeater-setting.php';
require_once get_template_directory() . '/spiderbuzz/customizer/custom-controls/repeater/class-control-repeater.php';

    
    $wp_customize->register_control_type( 'Ecommerce_Lite_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Ecommerce_Lite_Toggle_Control' );
    $wp_customize->register_control_type( 'Ecommerce_Lite_Drag_Section_Control' );
}
add_action( 'customize_register', 'ecommerce_lite_controls' );