<?php
/**
 * Image control by radio button 
 */
class Ecommerce_Lite_Radio_Control extends WP_Customize_Control {

    public function enqueue() {  
        wp_enqueue_style( 'spiderbuzz-radio', get_template_directory_uri() . '/spiderbuzz/customizer/custom-controls/radio/radio.css'); //for slider            
        wp_enqueue_script( 'spiderbuzz-radio', get_template_directory_uri() . '/spiderbuzz/customizer/custom-controls/radio/radio.js', array( 'jquery' ), false, true ); //for slider        
    }

    public function render_content() {

        if ( empty( $this->choices ) )
            return;

        $name = '_customize-radio-' . $this->id;

        ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <ul class="controls" id ="ecommerce-lite-img-container">
        <?php
            foreach ( $this->choices as $value => $label ) :
                $class = ($this->value() == $value)?'ecommerce-lite-radio-img-selected ecommerce-lite-radio-img-img':'ecommerce-radio-img-img';
                ?>
                <li style="display: inline;">
                <label>
                    <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                    <img src = '<?php echo esc_url( $label ); ?>' class = '<?php echo esc_attr( $class ); ?>' />
                </label>
                </li>
                <?php
            endforeach;
        ?>
        </ul>
        <?php
    }
}