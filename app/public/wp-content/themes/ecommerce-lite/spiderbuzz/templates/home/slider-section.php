<?php
/**
 * Display the slider section 
 * 
 */
 function ecommerce_lite_homepage_slider_section(){
        /**
         *Slider Customizer Values Store in Variable 
         * @Customizer Value
         */
        $ecommerce_lite_slider_category_list_enable = get_theme_mod( 'ecommerce_lite_slider_category_list_enable',false );    
        $slider_button_text_change = get_theme_mod( 'slider_button_text_change','Shop Now' ); 


        /**
         * Slider Class Condtions Hear
         * @condtion
         */
        if( $ecommerce_lite_slider_category_list_enable == true ){
            //is category section actiate
            if(ecommerce_lite_is_woocommerce_activated()){
                $slider_show_class = 'col-lg-9 col-md-9 col-sm-12';
                $ecommerce_lite_slider_container = 'container';
            }else{
                $slider_show_class = 'col-lg-12 col-md-12 col-sm-12';
                $ecommerce_lite_slider_container = '';
            }
        }else{
            $ecommerce_lite_slider_container = '';
            $slider_show_class = 'col-lg-12 col-md-12 col-sm-12';
        }

    ?>
    <section id="frontpage_slider_section" >
        <div class="<?php echo esc_attr( $ecommerce_lite_slider_container ); ?>">
            <div class="row">

                <?php if( $ecommerce_lite_slider_category_list_enable == true && ecommerce_lite_is_woocommerce_activated() ): ?>    
                    <!-- All Category Section -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="sidebar-content">
                            <div class="title">
                                <h5 id="ecommerce_lite_slider_category_list_header_text" class="white"><?php echo esc_html(get_theme_mod('ecommerce_lite_slider_category_list_header_text','ALL CATEGORYES')); ?></h5>
                            </div>
                                    <!-- Category List -->
                                    <?php
                                    
                                        // Category List Programming
                                        $taxonomy     = 'product_cat';
                                        $orderby      = 'name';  
                                        $show_count   = 0;      // 1 for yes, 0 for no
                                        $pad_counts   = 0;      // 1 for yes, 0 for no
                                        $hierarchical = 1;      // 1 for yes, 0 for no  
                                        $title        = '';  
                                        $empty        = 0;
                                    
                                        $args = array(
                                            'taxonomy'     => $taxonomy,
                                            'orderby'      => $orderby,
                                            'show_count'   => $show_count,
                                            'pad_counts'   => $pad_counts,
                                            'hierarchical' => $hierarchical,
                                            'title_li'     => $title,
                                            'hide_empty'   => $empty
                                        );
                                    $all_categories = get_categories( $args ); 
                                ?>
                            <ul class="sidebar-menu">
                                <?php   
                                    foreach ( $all_categories as $cat ) {
                                        if($cat->category_parent == 0) {
                                            $category_id = $cat->term_id;       
                                            echo '<li><a href="'. esc_url(get_term_link( $cat->slug, 'product_cat' )) .'">'. esc_html($cat->name) .'</a>';

                                                //Sub Category Arguments 
                                                $sub_category_args = array(
                                                        'taxonomy'     => $taxonomy,
                                                        'child_of'     => 0,
                                                        'parent'       => $category_id,
                                                        'orderby'      => $orderby,
                                                        'show_count'   => $show_count,
                                                        'pad_counts'   => $pad_counts,
                                                        'hierarchical' => $hierarchical,
                                                        'title_li'     => $title,
                                                        'hide_empty'   => $empty
                                                );

                                                $sub_categories = get_categories( $sub_category_args );
                                                if( $sub_categories ) {
                                                    ?>
                                                    <ul class="sub-category">
                                                        <?php
                                                            foreach( $sub_categories as $sub_category) {
                                                                echo  '<li><a href="'. esc_url(get_term_link( $sub_category->slug, 'product_cat' )) .'">'.esc_html($sub_category->name).'</a></li>' ;
                                                            }
                                                        ?>
                                                    </ul>
                                                    <?php   
                                                }
                                            
                                            echo "</li>";
                                        }       
                                    }
                                ?>
                            </ul><!-- End the Category List Value -->

                            <!-- Category list End -->
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Slider Section Hear -->
                <?php
                    /**
                     * 
                     * @array Slider Default Value Array
                     */
                    $defaults = array(
                        array(
                            'slider_text' => 'Up To 30% Summer Sale Now Starting at $45.00',
                            'slider_sort_desc'       => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since', 'ecommerce-lite'),
                            'slider_links' => 'https://www.facebook.com/',
                            'slider_image' => ''                       
                        ),
                        array(
                            'slider_text' => 'Up To 30% Summer Sale Now Starting at $45.00',
                            'slider_sort_desc'       => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since', 'ecommerce-lite'),
                            'slider_links' => 'https://www.facebook.com/',
                            'slider_image' => ''                       
                        )
                    );
                    $slider_section_items = get_theme_mod( 'homepage_slider_section', $defaults );
                
                    
                   
                ?>

                <!-- Start Slider Columns -->
                <div class="<?php echo esc_attr( $slider_show_class ); ?>">
                    <div class="sidebar-slider ">
                        <div class="owl-carousel ecommerce-slider">
                            <?php foreach( $slider_section_items as $slider_item ){ ?>
                                <?php 
                                    //Image size Default image 
                                    $img_id = $slider_item['slider_image']; 
                                    if( intval($img_id)){
                                        $slider_image = wp_get_attachment_url( $img_id );
                                    }else{
                                        $slider_image = get_template_directory_uri().'/assets/images/banner01.jpg';  
                                    }

                                    //short desc value 
                                    if( !empty($slider_item['slider_sort_desc']) ){
                                        $short_desc = $slider_item['slider_sort_desc'];
                                    }else{
                                        $short_desc = '';
                                    }
                                    
                                ?>
                                    
                                    <!-- Item Loop Start  -->
                                        <div class="item">
                                            <div class="item-img">
                                                <img src="<?php echo esc_url( $slider_image ); ?>" alt="banner01"> 
                                            </div>
                                            <div class="item-text">
                                                <h2 class="uppercase white"><?php echo esc_attr( $slider_item['slider_text'] ); ?></h2>
                                                <div class="ecommerce-lite-slider-content"><?php echo esc_html( $short_desc ); ?> </div>
                                                <a href="<?php echo esc_url( $slider_item['slider_links'] ); ?>" class="shop white slider_button_text_change"><?php echo esc_html(slider_button_text_change_callback()); ?></a> 
                                            </div>
                                        </div>
                                    <!-- End Items Loop -->

                            <?php } ?>
                        
                        </div>
                    </div>
                </div><!-- End Slider Section -->
               
            </div>
        </div>
    </section><!-- End Slider Section Hear -->

    <?php
}
add_action( 'slider-section','ecommerce_lite_homepage_slider_section' );