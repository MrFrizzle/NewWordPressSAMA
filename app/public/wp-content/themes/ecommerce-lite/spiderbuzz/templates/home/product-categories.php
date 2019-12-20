<?php
/**
 * Products Category Section
 * @ecommerce_lite 
 */
function ecommerce_lite_homepage_products_category(){
    if( !ecommerce_lite_is_woocommerce_activated() ) return;
    //Products Category Default Values
    $products_categoreis_layout = get_theme_mod( 'products_categoreis_layout','random-layout' );
    $products_categorys = get_theme_mod( 'products_categorys',ecommerce_lite_get_multiple_product_categories() );
    
    //if (!is_array($products_categorys) || count($products_categorys) == 0 || trim($products_categorys[0]) == '') return;
    ?>
    <!-- Category List Section Hear -->
        <section id="products_category_section" class="catagory-pro">
            <div class="container">
                <div class="row">
                    
                    <?php
                        //Shift the First Category
                    if( $products_categoreis_layout == 'random-layout' ){
                            $products_categorys_first = array_shift( $products_categorys );#category Section
                    
                            //Products Categorys Section
                            $first_category_term = get_term_by( 'id', $products_categorys_first, 'product_cat');
                            
                            //term links hear
                            if($first_category_term == null){
                                $products_categorys_first = ecommerce_lite_woo_cat_id_by_slug('uncategorized');
                                
                                $first_category_term = get_term_by( 'id', $products_categorys_first, 'product_cat');
                                
                            }

                            //Category Image
                            $thumbnail_id = get_term_meta( $products_categorys_first, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id ); 

                            //default image set
                            if( $image == ''){
                                $image = esc_url( get_template_directory_uri() . '/assets/images/category-img.jpg' );
                            }
                        ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="catagory-img">
                                    <figure>
                                        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $first_category_term->name ); ?>">
                                        <a href="<?php echo esc_url( get_category_link( $first_category_term )); ?>" class="btn text-uppercase"><?php echo esc_html( $first_category_term->name ); ?></a>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <?php
                                        $products_category_count = 1;
                                        foreach( $products_categorys as $cat_key => $category_id ){ 
                                        
                                            if( $products_category_count < 5 ){
                                                //Products Categorys Section
                                                $term = get_term_by( 'id', $category_id, 'product_cat');

                                                //term links hear
                                                if($term == null){
                                                    $category_id = ecommerce_lite_woo_cat_id_by_slug('uncategorized');
                                                    
                                                    $term = get_term_by( 'id', $category_id, 'product_cat');
                                                    
                                                }
                                                
                                                //Category Image
                                                $thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
                                                $image = wp_get_attachment_url( $thumbnail_id );

                                                //default image set
                                                if( $image == ''){
                                                    $image = esc_url( get_template_directory_uri() . '/assets/images/category-img.jpg' );
                                                } 
                                            ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="catagory-img">
                                                        <figure>
                                                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $term->name ); ?>">
                                                            <a href="<?php echo esc_url( get_category_link( $category_id )); ?>" class="btn text-uppercase"><?php echo esc_html( $term->name ); ?></a>
                                                        </figure>
                                                    </div>
                                                </div>

                                            <?php }#End Products Count Section

                                            $products_category_count++; 
                                            } 
                                        ?>

                                </div>
                            </div>

                    <?php }else{ 

                        //Display Two Column And Three Columns 
                    
                        foreach( $products_categorys as $cat_key => $category_id ){  
                            
                            //category columns conditions hear
                            if( $products_categoreis_layout == '2-column' ){
                                $ecommerce_lite_products_category_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
                            }elseif( $products_categoreis_layout == '3-column' ){
                                $ecommerce_lite_products_category_class = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
                            }else{
                                $ecommerce_lite_products_category_class = 'col-lg-3 col-md-3 col-sm-6 col-xs-12';
                            }
                            
                            //Products Categorys Section
                            $term = get_term_by( 'id', $category_id, 'product_cat');
                                                    
                            //Category Image
                            $thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id ); 

                            //default image set
                            if( $image == ''){
                                $image = esc_url( get_template_directory_uri() . '/assets/images/category-img.jpg' );
                            }
                        ?>
                        <!-- Start Category Item Loop -->
                        <div class="<?php echo esc_attr( $ecommerce_lite_products_category_class ); ?>">
                            <div class="catagory-img">
                                <figure>
                                    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $term->name ); ?>">
                                    <a href="<?php echo esc_url( get_category_link( $category_id )); ?>" class="btn text-uppercase"><?php echo esc_html( $term->name ); ?></a>
                                </figure>
                            </div>
                        </div><!-- End Category Item -->
                    <?php }}#end condtion ?>

                </div><!-- End Row -->
            </div><!-- End Container Class -->
        </section><!-- End Products Category section --> 
    <?php
}
add_action( 'products-category','ecommerce_lite_homepage_products_category' );