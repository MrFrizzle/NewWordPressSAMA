<?php
/*-------eCommerce Lite Theme Functions----------*/
	/* Contents:
		1.  eCommerce Lite Breadcrumb Section
		2.  eCommerce Lite Header Searchbox Section
		3.  eCommerce Lite Header Before Discount section Enable 
		4.  eCommerce Lite Header Logo and Site Branding
		5.	eCommerce Lite Header Login Section
		6.	eCommerce Lite Header Nav Search Box Section 
		7.	eCommerce Lite Header Login Section
		8.	eCommerce Lite Footer Sections
		9.	eCommerce Lite Footer Copyright Section Hear
		10.	eCommerce Lite Function to list post categories in customizer options
		12.	eCommerce Lite get Woocommerce Products Id
		13.	eCommerce Lite get Viewer Count
		14.	eCommerce Lite Blog Section Metabox
		
	*/


/** 1. eCommerce Lite Breadcrumb Section Functions Hear */

	if ( ! function_exists( 'ecommerce_lite_breadcrumb' ) ) {
		/**
		 * eCommerce Lite Breadcrumb Section
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_breadcrumb() {
			
			//Enable Breadcrumb Section 
			if( get_theme_mod('ecommerce_lite_breadcrumb_enable',true ) == true  ){
				global $post;

				$ecommerce_lite_breadcrumb_separator = wp_kses_post( '<span class="separator">/</span>' );
				echo '<section class="breadcrumb"><div class="container"><div class="row"><div class="col-md-12"><div class="breadcrumb_wrap">';
				if (!is_home()) {
					echo '<div class="breadcrumb-section">';
					
					echo '<i class="fa fa-home" aria-hidden="true"></i><a href="';
					echo esc_url( home_url( '/' ) );
					echo '">';
					echo esc_html__('Home', 'ecommerce-lite');
					echo '</a>'.$ecommerce_lite_breadcrumb_separator ;
					if ( is_category() || is_single()) {
						the_category( $ecommerce_lite_breadcrumb_separator );
						if (is_single()) {
							echo ''.$ecommerce_lite_breadcrumb_separator;
							the_title();
						}
					} elseif ( is_page() ) {
						if($post->post_parent){
							$title = get_the_title();
							
							echo '<span title="'.esc_attr($title).'"> '.esc_html($title).'</span>';
						} else {
							echo '<span> '. esc_html(get_the_title()).'</span>';
						}
					}
					elseif (is_tag()) {single_tag_title();}
					elseif (is_day()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'ecommerce-lite'), get_the_time('F jS, Y')); echo '</span>';}
					elseif (is_month()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'ecommerce-lite'), get_the_time('F, Y')); echo '</span>';}
					elseif (is_year()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'ecommerce-lite'), get_the_time('Y')); echo '</span>';}
					elseif (is_author()) {echo "<span>" . esc_html__('Author Archive', 'ecommerce-lite'); echo '</span>';}
					elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<span>" . esc_html__('Blog Archives', 'ecommerce-lite'); echo '</span>';}
					elseif (is_search()) {echo "<span>" . esc_html__('Search Results', 'ecommerce-lite'); echo '</span>';}
					
					echo '</div>';
				} else {
					echo '<div class="breadcrumbs-section">';
					
					echo '<a href="';
					echo esc_url( home_url( '/' ) );
					echo '">';
					echo esc_html__('Home', 'ecommerce-lite');
					echo '</a>'.$ecommerce_lite_breadcrumb_separator;
					
					echo esc_html__('Blog', 'ecommerce-lite');
					
					
					echo '</div>';
				}

				echo "</div></div></div></div></section>";
			}
		}

	}



/** 2.eCommerce Lite Header Searchbox Section  */

	if ( ! function_exists( 'ecommerce_lite_header_searchbox' ) ) {
		/**
		 * eCommerce Lite Header Searchbox Section
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_header_searchbox() {
			?>
			<div id="search"> 
				<span class="close"><?php esc_html_e('X','ecommerce-lite'); ?></span>
				<form role="search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<input value="" name="s" value="<?php echo get_search_query(); ?>" type="search" placeholder="type to search" autocomplete="off" />
					<input type="hidden" value="product" name="post_type">
					<button type="submit" title="<?php esc_attr_e('Search', 'ecommerce-lite'); ?>" class="search-btn-bg"></button>
				</form>
			</div>

			<?php

		}

	}





/** 3. eCommerce Lite Header Before Discount section Enable  */

	if ( ! function_exists( 'ecommerce_lite_top_header_discount' ) ) {
		/**
		 * eCommerce Lite Header Before Discount section Enable
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_top_header_discount() {
			
			if( get_theme_mod('ecommerce_lite_top_header_section_enable',true) == true ):

				?>
				<!-- discount -->
				<div id="top_header_section_enable" class="bg-light-red padding-tb">
					<div class="container">
						<div class="col-md-12">
							<div class="offer text-center">
								<div id="top_header_section_info" class="white text-uppercase">
									<p><?php echo esc_html( ecommerce_lite_top_header_section_info_callback()); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				

				<?php
			endif;

		}

	}
	add_action( 'ecommerce_lite_nav_before' ,'ecommerce_lite_top_header_discount' );




/** 4.eCommerce Lite Header Logo and Site Branding  */
	if ( ! function_exists( 'ecommerce_lite_top_header_site_branding_section' ) ) {
		/**
		 * eCommerce Lite Header Logo and Site Branding 
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_top_header_site_branding_section() {
			?>
				<div class="main-logo site-branding">
					<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$ecommerce_lite_description = get_bloginfo( 'description', 'display' );
						if ( $ecommerce_lite_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html( $ecommerce_lite_description ); /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
					
				</div><!-- .site-branding -->
			<?php 				
		}

	}
	add_action('ecommerce_lite_header_content','ecommerce_lite_top_header_site_branding_section',1);




/** 5.eCommerce Lite Header Login Section  */

	if ( ! function_exists( 'ecommerce_lite_top_header_menu' ) ) {
		/**
		 * eCommerce Lite Header Login Section 
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_top_header_menu() {
		
			?>
				<div class="main-nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
							'container'		=>'ul',
							'menu_class'	 =>  'main-menu mobile-nav clearfix',
							'menu_id'		=>	'mobile'
						) );
					?>
				</div>
				<nav class="sidenav" data-sidenav data-sidenav-toggle="#sidenav-toggle">
					
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
							'container'		 =>	 'ul',
							'menu_class'	 =>  'sidenav-menu'
						) );
					?>
				</nav>
				<a href="javascript:;" class="toggle" id="sidenav-toggle">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a>
			<?php
		}
	}
	add_action( 'ecommerce_lite_header_content','ecommerce_lite_top_header_menu',2 );



/** 6.eCommerce Lite Header Nav Search Box Section  */

	if ( ! function_exists( 'ecommerce_lite_header_nav_search_box' ) ) {
		/**
		 * eCommerce Lite Header Nav Search Box Section
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_header_nav_search_box() {
			
			if( get_theme_mod( 'ecommerce_lite_header_search_box',true ) == true ):

				?>
				<!-- Search Box Section Hear -->
				<li class="header-search">
					<a href="#search">
						<i class="fa fa-search"></i>
					</a>
				</li>

				<?php
			endif;

		}

	}




/** 7.eCommerce Lite Header Login Section  */

	if ( ! function_exists( 'ecommerce_lite_top_header_login_section' ) ) {
		/**
		 * eCommerce Lite Header Login Section 
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_top_header_login_section() {
			
			
			?>
				<div class="login-section">
					<ul class="login clearfix">
						
						<?php 
							//Header Search Enable
							if( get_theme_mod( 'ecommerce_lite_main_header_search_box_enable',true ) == true ){
								ecommerce_lite_header_nav_search_box();#Search Box Section Hear
							}

							if( ecommerce_lite_is_woocommerce_activated() ){

								//woocommerce Object Create Hear
								$eCommerce_lite_Woocomerce = new eCommerce_lite_Woocommerce();

								//Header Wishlist Section
								if( get_theme_mod( 'ecommerce_lite_main_header_wishlist_enable',true ) == true ){
									$eCommerce_lite_Woocomerce->ecommerce_lite_top_wishlist();
								}

								//Header Add To Cart Section
								if( get_theme_mod( 'ecommerce_lite_main_header_cart_enable',true ) == true ){
									$eCommerce_lite_Woocomerce->ecommerce_lite_woocommerce_header_cart();
								}
								
								//Header User login section hear
								if( get_theme_mod( 'ecommerce_lite_main_header_user_enable',true ) == true ){
									$eCommerce_lite_Woocomerce->ecommerce_lite_woocommerce_user_login();
								}

							}
							
							
						?>
						
					</ul>  
				</div>
			<?php
		}
	}
	add_action( 'ecommerce_lite_header_content','ecommerce_lite_top_header_login_section',3 );


/** 8.eCommerce Lite Footer Sections */
	if ( ! function_exists( 'ecommerce_lite_footer_section_widgets_area' ) ) {
		/**
		 * eCommerce Lite Footer Sections
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_footer_section_widgets_area() {
			if( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') OR is_active_sidebar("footer-5")): 
				?>
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<?php dynamic_sidebar( 'footer-5' ); ?>
						</div>
					</div>
				</div>
				<?php
			endif;
		}
	}
	add_action( 'ecommerce_lite_footer_content','ecommerce_lite_footer_section_widgets_area',1 );




/** 9.eCommerce Lite Footer Copyright Section Hear */
	if ( ! function_exists( 'ecommerce_lite_footer_copyright_area' ) ) {
		/**
		 * eCommerce Lite Footer Copyright Section Hear
		 * 
		 * @since eCommerce Lite 1.0.0
		 */

		function ecommerce_lite_footer_copyright_area() {
			//customizer value
			$ecommerce_lite_payment_method_support_image = get_theme_mod( 'ecommerce_lite_payment_method_support_image',get_template_directory_uri().'/assets/images/payment-method.png' );
			
			?>
			<div class="container">
				<div class="copyright">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="text-left"> 
								<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ecommerce-lite' ) ); ?>">
									<?php
									/* translators: %s: CMS name, i.e. WordPress. */
									printf( esc_html__( 'Proudly powered by %s', 'ecommerce-lite' ), 'WordPress' );
									?>
								</a>
								<span class="sep">|</span>
									<a href="<?php echo esc_url('http://spiderbuzz.com','ecommerce-lite'); ?>">
										<?php
											/* translators: 1: Theme name, 2: Theme author. */
											printf( esc_html__( 'Theme: %1$s by %2$s.', 'ecommerce-lite' ), 'eCommerce Lite', 'Spiderbuzz' );
										?>
									<!-- .site-info -->
									</a>
								</span>
							</div>
						</div><!-- .site-info -->
						
						<!-- Payment Method Support Section -->
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="text-right footer-payment-method">
								<img src="<?php echo esc_url( $ecommerce_lite_payment_method_support_image ); ?>" >
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php
		}
	}
	add_action( 'ecommerce_lite_footer_content','ecommerce_lite_footer_copyright_area',2 );




/** 10.Function to list post categories in customizer options */
if( ! function_exists( 'ecommerce_lite_get_products_categories' ) ) {
	/**
	 * Function to list post categories in customizer options
	*/
	function ecommerce_lite_get_products_categories( ){
		if(!ecommerce_lite_is_woocommerce_activated()): return; endif;
		
		/* Option list of all categories */
		$taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      
        $pad_counts   = 0;  
        $hierarchical = 1;    
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
		
		
		foreach( $all_categories as $category ){
			$categories[$category->term_id] = $category->name;    
		}
		
		return $categories;
	}

}


/** 11.get Post  Category */
if( ! function_exists( 'ecommerce_lite_get_post_categories' ) ) {
	/**
	 * Function to list post categories in customizer options
	*/
	function ecommerce_lite_get_post_categories( ){
		
		
		$all_categories = get_categories( );
		
		//default value
		$categories['all'] = 'all';  
		
		foreach( $all_categories as $category ){
			$categories[$category->term_id] = $category->name;    
		}
		
		return $categories;
	}

}


/** 12.get Woocommerce Products Id*/
if( ! function_exists( 'ecommerce_lite_get_woocommerce_products_id' ) ) {
	/**
	 * Function to list post categories in customizer options
	*/
	function ecommerce_lite_get_woocommerce_products_id( ){
		
		
		//products
		$product_args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
		);
		$query = new WP_Query( $product_args );
		if($query->have_posts()) { while( $query->have_posts() ) { $query->the_post();
			$categories[ get_the_ID() ] = get_the_title();  
		}}
		
		return $categories;
	}

}

/**
 * 12. Default woocommerce Default category
 */
if( ! function_exists( 'ecommerce_lite_get_default_products_categories' ) ) {
	
	/**
	 * Defaul category section 
	*/
	function ecommerce_lite_get_default_products_categories( ){
		if(!ecommerce_lite_is_woocommerce_activated()): return; endif;
		
		//Default cat
        $taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      
        $pad_counts   = 0;  
        $hierarchical = 1;    
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


		//Default Select
		$default_product_cat = '';
        foreach( $all_categories as $cat )  { 
            //Select default category Hear
           if( $cat->count >= 4 ){
                $default_product_cat = $cat->term_id; 
            }
        }

        //not category select then
        if( empty($default_product_cat) ){
            foreach( $all_categories as $cat )  { 
                //Select default category Hear
                $default_product_cat = $cat->term_id;
            }
        }


        //Return default cat
        return $default_product_cat;
	}

}

//Default multiple category select
/** 12.Multiple Category Select Section */
if( ! function_exists( 'ecommerce_lite_get_multiple_product_categories' ) ) {
	/**
	 * Function to list post categories in customizer options
	*/
	function ecommerce_lite_get_multiple_product_categories( ){
		
		//Default cat
        $taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      
        $pad_counts   = 0;  
        $hierarchical = 1;    
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


		//Default Select
		$category_count = 0;
        foreach( $all_categories as $cat )  { 
			//Select default category Hear
			
			$default_product_cat = array();
           if( $category_count < 5  ){
                $default_product_cat[$category_count] = $cat->term_id; 
			}
			
			//increment count
			$category_count++;
        }

        //Return default cat
        return $default_product_cat;
	}

}



/**
 * 13.get Viewer Count
 * 
 * Post Viewer Count and Display Functions
 */
if( ! function_exists( 'get_ecommerce_lite_get_the_post_viewer_count' ) ) {
	function get_ecommerce_lite_get_the_post_viewer_count( $postID ){
		$count_key = 'post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if($count==''){
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return "0 ";
		}
		return '<span class="count-view"><i class="fa fa-eye" aria-hidden="true"></i> '.$count.' </span>';
	}
}

// function to count views.
if( ! function_exists( 'set_ecommerce_lite_get_the_post_viewer_count' ) ) {
	function set_ecommerce_lite_get_the_post_viewer_count( $postID ) {
		$count_key = 'post_views_count';
		$count = get_post_meta( $postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta( $postID, $count_key);
			add_post_meta( $postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta( $postID , $count_key, $count);
		}
	}
}

/**
 * 14.eCommerce Lite Blog Section
 * 
 */
//author metabox Metabox
if( ! function_exists( 'ecommerce_lite_meatbox_author' ) ) {
	function ecommerce_lite_meatbox_author(  ){
		//eCommerce Links Author Section
		?>
		<span>
			<i class="fa fa-user"></i> 
			<a href="<?php the_author_link(   ); ?>" class="author"><?php the_author(  ); ?></a>
		</span>
	<?php
	}

}

/**
 * 15.eCommerce Lite Blog Metabox Date
 * 
 * Use: Metabox Date
 * Description: Display Post public Date
 */
if( ! function_exists( 'ecommerce_lite_meatbox_date' ) ) {
	function ecommerce_lite_meatbox_date(  ){
		//eCommerce Links Author Section
		?>
		<span>
			<i class="far fa-calendar-alt"></i> 
			<?php the_time( get_option( 'date_format' ) ) ?>
		</span>
	<?php
	}

}


/**
 * 15.eCommerce Lite Class Functions
 * 
 * Use: for function main class
 * Description: index,single,page class is hear
 */
if( ! function_exists( 'ecommerce_lite_class' ) ) {
	function ecommerce_lite_class(){
		//metabox value
		$ecommerce_lite_sidebar_layout = ecommerce_lite_get_sidebar_layout();

		if( $ecommerce_lite_sidebar_layout == 'full-width' ){
			$ecommerce_lite_class = 'col-md-12 col-sm-12';
		}elseif( $ecommerce_lite_sidebar_layout == 'both-sidebar' ){
			$ecommerce_lite_class = 'col-md-6 col-sm-6';
		}else{
			$ecommerce_lite_class = 'col-md-9 col-sm-9';
		}

		return $ecommerce_lite_class;

	}
	
}

