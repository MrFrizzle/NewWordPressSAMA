<?php
/**
 * Front-page Products Tabs Section
 * 
 */

function ecommerce_lite_homepage_single_category_products(){
    if(!ecommerce_lite_is_woocommerce_activated()): return; endif;
    
    //products-tab Customizer Values
    $products_tabs_title = get_theme_mod( 'single_category_products_title','Populor Products' );
    $products_tab_multiple_category = get_theme_mod( 'single_category_select_opt' );
    $products_tab_number_of_products = get_theme_mod( 'single_category_number_of_products',8 );
   
    $term = get_term_by( 'id', $products_tab_multiple_category, 'product_cat');
    
    //term links
    if($term == null){
        $products_tab_multiple_category = ecommerce_lite_woo_cat_id_by_slug('uncategorized');
        
        //multiple cat id
        $term = get_term_by( 'id', $products_tab_multiple_category, 'product_cat');
    }

    ?>
    <section id="products_tab_section"  class="product single-products-section">
        <div class="container">
            <div class="row products-tab-wraper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="product-tab-list clearfix">
                        <h6 id="products_tabs_title"  class="text-uppercase"><?php echo esc_html( $products_tabs_title ); ?></h6>
                        <!-- Tab Section Hear -->
                        <ul class="tabs clearfix single-products-title-sec">
                            <li  class="  tab-link current"  ><a href="#<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_attr( $term->name ); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 products-tab-section">
                    
                    <div id="tab-bag" class="tab-content current">
                        <div class="product-tab1">
                            
                            <!-- Products Tab -->
                            <?php
                                $products_count = 0;
                                $product_args = array(
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy'  => 'product_cat',
                                            'field'     => 'term_id', 
                                            'terms'     => $products_tab_multiple_category // First Element's Value                                                            
                                        ),
                                        array(
                                            'taxonomy' => 'product_visibility',
                                            'field' => 'name',
                                            'terms' => 'exclude-from-catalog',
                                            'operator'	=>	'NOT IN'
                                        )
                                    ),
                                    'posts_per_page' => $products_tab_number_of_products
                                );
                                $query = new WP_Query( $product_args );
                                $total_products =  ( $query->post_count )-1;
                                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                            ?>
                                        
                                        <?php if ($products_count == 0) : echo '<div class="item"> <div class="row">'; endif; ?>
                                        <?php  if( $products_count > 0 and  $products_count % 4 == 0 ) : echo '</div></div> <div class="item"> <div class="row">'; endif ; ?>

                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 products-tab">
                                            <?php echo wc_get_template_part( 'content', 'product' ); ?>
                                        </div>
                                        
                                        <?php  if ($products_count == $total_products): echo '</div></div>'; endif; ?>
                                
                            <?php 
                            $products_count++; }  
                            }else{
                                //Default data
                                ?>
                                <div class="woocommerce-add-products item">
                                    <div class="row">
                                    <?php
                                        for ($x = 1; $x <= 8; $x++) {
                                            ?>
                                            <div class="new col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <?php
                                            ecommerce_lite_default_products();
                                            ?>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                        </div>
                                    </div>
                                <?php

                            }
                                wp_reset_postdata(); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <?php
}
add_action( 'single-category-products','ecommerce_lite_homepage_single_category_products');