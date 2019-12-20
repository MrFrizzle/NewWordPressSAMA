<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package eCommerce_lite
 */

/*-------eCommerce Lite Theme Woocommerce Functions----------*/
	/* Contents:
		1.  eCommerce Lite Woocommerce Products Item 
		2.  eCommerce Lite Disable the default WooCommerce stylesheet.
		3.  eCommerce Lite WooCommerce setup function. 
		4.	eCommerce Lite WooCommerce specific scripts & stylesheets.	
		5.	eCommerce Lite Add 'woocommerce-active' class to the body tag.
		6.	eCommerce Lite Products per page.
		7.	eCommerce Lite Product gallery thumnbail columns.
		8.	eCommerce Lite Default loop columns on product archives.
		9.	eCommerce Lite  Related Products Args.
		10.	eCommerce Lite  Woocommerce Header Cart 
		11.	eCommerce Lite Woocommerce Cart Links
		12.	eCommerce Lite Cart Fragments.
		13.	eCommerce Lite Header User Section
		14.	eCommerce Lite Woocommerce Social Share
		15.	eCommerce Lite Woocommerce Products Discount Show
		16.	eCommerce Lite Product columns wrapper.
		17.	eCommerce Lite  Product columns wrapper close.
		18.	eCommerce Lite Header Wishlist
		19.	eCommerce Lite Woocommerce Rating Section
		20.	eCommerce Lite Woocommerce Quick View 
		21.eCommerce Lite Woocommerce Compare List
		22.eCommerce Lite Woocommerce Compare Product
		23.eCommerce Lite Add To Cart Button Text Change
	*/


//Single Page 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );



/** Woocommerce Products Item */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

$eCommerce_lite_Woocommerce = new eCommerce_lite_Woocommerce();
add_action( 'woocommerce_before_shop_loop_item',array( $eCommerce_lite_Woocommerce,'ecommerce_lite_woocommerce_before_shop_loop_item'), 10 );


//single page social Share
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary',array( $eCommerce_lite_Woocommerce,'ecommerce_lite_social_share'), 50 );


/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


class eCommerce_lite_Woocommerce{
	
	public function __construct(){
		//eCommerce Woocommerce Add Actions
		add_action( 'after_setup_theme',array($this,'ecommerce_lite_woocommerce_setup')  );
		add_action( 'wp_enqueue_scripts',array($this,'ecommerce_lite_woocommerce_scripts') );
	
		//eCommerce Lite Filter
		add_filter( 'body_class',array($this,'ecommerce_lite_woocommerce_active_body_class') );
		add_filter( 'loop_shop_per_page',array($this,'ecommerce_lite_woocommerce_products_per_page') );
		add_filter( 'woocommerce_product_thumbnails_columns',array($this,'ecommerce_lite_woocommerce_thumbnail_columns')  );
		add_filter( 'loop_shop_columns',array($this,'ecommerce_lite_woocommerce_loop_columns') );
		add_filter( 'woocommerce_output_related_products_args',array($this,'ecommerce_lite_woocommerce_related_products_args') );
		add_filter( 'woocommerce_add_to_cart_fragments',array($this,'ecommerce_lite_woocommerce_cart_link_fragment') );

		//Add to cart Text
		add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // 
		add_filter( 'woocommerce_product_add_to_cart_text',array($this,'woo_custom_ecommerce_lite_woocommerce_product_add_to_cart_text') );  // Add to Cart
		
	}

	/**
	 * 3.eCommerce Lite WooCommerce setup function.
	 *
	 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
	 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
	 *
	 * @return void
	 */
	function ecommerce_lite_woocommerce_setup() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}


	/**
	 * 4.eCommerce Lite WooCommerce specific scripts & stylesheets.
	 *
	 * @return void
	 */
	function ecommerce_lite_woocommerce_scripts() {
		wp_enqueue_style( 'ecommerce-lite-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

		$font_path   = WC()->plugin_url() . '/assets/fonts/';
		$inline_font = '@font-face {
				font-family: "star";
				src: url("' . $font_path . 'star.eot");
				src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'star.woff") format("woff"),
					url("' . $font_path . 'star.ttf") format("truetype"),
					url("' . $font_path . 'star.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}';

		wp_add_inline_style( 'ecommerce-lite-woocommerce-style', $inline_font );
	}



	/**
	 * 5.eCommerce Lite Add 'woocommerce-active' class to the body tag.
	 *
	 * @param  array $classes CSS classes applied to the body tag.
	 * @return array $classes modified to include 'woocommerce-active' class.
	 */
	function ecommerce_lite_woocommerce_active_body_class( $classes ) {
		$classes[] = 'woocommerce-active';

		return $classes;
	}


	/**
	 * 
	 * 6.eCommerce Lite Products per page.
	 *
	 * @return integer number of products.
	 */
	function ecommerce_lite_woocommerce_products_per_page() {
		$ecommerce_lite_woocommerce_products_per_page = get_theme_mod('ecommerce_lite_woocommerce_products_per_page',12);
		return $ecommerce_lite_woocommerce_products_per_page;
	}



	/**
	 * 7.eCommerce Lite Product gallery thumnbail columns.
	 *
	 * @return integer number of columns.
	 */
	function ecommerce_lite_woocommerce_thumbnail_columns() {
		$ecommerce_lite_woocommerce_thumbnail_columns = get_theme_mod('ecommerce_lite_woocommerce_thumbnail_columns',4);
		return $ecommerce_lite_woocommerce_thumbnail_columns;
	}

	/**
	 * 8.eCommerce Lite Default loop columns on product archives.
	 *
	 * @return integer products per row.
	 */
	function ecommerce_lite_woocommerce_loop_columns() {
		$ecommerce_lite_woocommerce_loop_columns = get_theme_mod('ecommerce_lite_woocommerce_loop_columns',3);
		return $ecommerce_lite_woocommerce_loop_columns;
	}


	/**
	 *9.eCommerce Lite  Related Products Args.
	 *
	 * @param array $args related products args.
	 * @return array $args related products args.
	 */
	function ecommerce_lite_woocommerce_related_products_args( $args ) {
		//Argument Customizer Value
		$ecommerce_lite_woocommerce_related_products_posts_per_page = get_theme_mod('ecommerce_lite_woocommerce_related_products_posts_per_page',3);
		$ecommerce_lite_woocommerce_related_products_columns = get_theme_mod('ecommerce_lite_woocommerce_related_products_columns',3);
		
		$defaults = array(
			'posts_per_page' => $ecommerce_lite_woocommerce_related_products_posts_per_page,
			'columns'        => $ecommerce_lite_woocommerce_related_products_columns,
		);

		$args = wp_parse_args( $defaults, $args );

		return $args;
	}





	
	/** 10.eCommerce Lite  Woocommerce Header Cart */

	public function ecommerce_lite_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		global $woocommerce;
		
		?>
		<li>
			<div class="header-cart" id="cart">
				<div class="mini-cart">
					<div class="<?php echo esc_attr($class); ?>">
						<?php $this->ecommerce_lite_woocommerce_cart_link(); ?>
					</div>
					<div id="top-add-cart">
						<div class="top-cart-content">
							<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php 
	}



	
	/** 11.eCommerce Lite Woocommerce Cart Links */
	function ecommerce_lite_woocommerce_cart_link() {
		?>
		<div id="cart_new">
			<a href="">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				<span><?php echo intval(WC()->cart->get_cart_contents_count()); ?></span>
			</a>
		</div>
		<?php
	}



	
	/**
	 *12.eCommerce Lite Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function ecommerce_lite_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		$this->ecommerce_lite_woocommerce_cart_link();
		$fragments['#cart_new'] = ob_get_clean();

		return $fragments;
	}

	


	/** 13.eCommerce Lite Header User Section */
	public function ecommerce_lite_woocommerce_user_login(){
		?>
		<?php if (is_user_logged_in()) { ?>	
			
			<!-- User LogOut Section -->
			<li id="header-login" class="login">
				<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
					<i class="fa fa-user"></i><?php echo esc_html_e('Account','ecommerce-lite'); ?>
				</a>
			</li>

		<?php } else{ ?>
			<!-- User Login Section -->
			<li id="header-login">
				<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="clearfix">
					<i class="fa fa-lock"></i><?php echo esc_html_e('Login','ecommerce-lite'); ?>
				</a>
			</li>
	
		<?php } 
	}


	

	
	/** 14.eCommerce Lite Woocommerce Social Share */

	public function ecommerce_lite_social_share() {
		if( get_theme_mod('ecommerce_lite_social_share_enable',true) == true ){

			//Woocommerce eCommerce Lite Args
			$single_page_id = get_the_ID();
			$single_page_url = get_the_permalink( $single_page_id );
			$single_page_title = get_the_title( $single_page_id );
			$single_page_desc = get_the_excerpt( $single_page_id );
		?>
			<div class="social-icon clearfix">
				<span><?php esc_html_e('Share This :','ecommerce-lite'); ?></span>
				<ul>
					<li>
						<!-- Email -->
						<a href="mailto:?Subject=<?php echo esc_attr( $single_page_title ); ?>&amp;Body=<?php echo esc_attr( $single_page_desc ); ?> <?php echo esc_url( $single_page_url ); ?>">
							<i class="fa fa-envelope"></i>
						</a>
					</li>
					<li><!-- Facebook -->
						<a href="<?php echo esc_url('http://www.facebook.com/sharer.php?u='.$single_page_url); ?>" target="_blank">
							<i class="fa fa-facebook-f"></i>
						</a>
					</li>
						
					<li><!-- Twitter -->
						<a href="<?php echo esc_url('https://twitter.com/share?url='.$single_page_url); ?>&amp;text=<?php echo esc_attr($single_page_title); ?>&amp;hashtags=simplesharebuttons" target="_blank">
							<i class="fa fa-twitter"></i>
						</a>
					</li>

					<li><!-- Google+ -->
						<a href="<?php echo esc_url('https://plus.google.com/share?url='.$single_page_url); ?>" target="_blank">
							<i class="fa fa-google-plus" aria-hidden="true"></i>
						</a>
					</li>
				</ul>  
			</div>
		<?php 
		}

	}



	

	/** 15.eCommerce Lite Woocommerce Products Discount Show */
	function ecommerce_lite_sale_percentage_loop() {
		global $product;
		
		if ( $product->is_on_sale() ) {
			
			if ( ! $product->is_type( 'variable' ) and $product->get_regular_price() and $product->get_sale_price() ) {
				$max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
			} else {
				$max_percentage = 0;
				
				foreach ( $product->get_children() as $child_id ) {
					$variation = wc_get_product( $child_id );
					$price = $variation->get_regular_price();
					$sale = $variation->get_sale_price();
					$percentage = '';
					if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
						if ( $percentage > $max_percentage ) {
							$max_percentage = $percentage;
						}
				}
			
			}
			
			echo "<div class='ribbon label-52'><span>" . esc_attr( round($max_percentage) ) . "%  OFF</span></div>";
		
		}

	}

	/** 18.eCommerce Lite Header Wishlist  */
	public function ecommerce_lite_top_wishlist() {
		if (!defined( 'YITH_WCWL' )) return;
		?>
		<li id="header-wishlist" class="cart">
			<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url()); ?>">
				<i class="fa fa-heart"></i>
				<span class="wishlist-count">
					<?php 
						$wishlist_count = YITH_WCWL()->count_products();
						echo esc_html( $wishlist_count ); 
					?>
				</span>
			</a>
		</li>
		<?php 
	}



	/** 19.eCommerce Lite Woocommerce Rating Section  */
	public function ecommerce_lite_get_star_rating(){
	    global $woocommerce, $product;
	    $average = $product->get_average_rating();
		?>
		<div class="rating" itemscope itemtype="http://schema.org/AggregateRating">
			<?php
				//Rating Loop 
				for( $i = 1; $i<=5; $i++ ) {
					if ($i<=$average){
						echo '<i class="fa fa-star gold"></i>';
					}
					else{ 
						echo '<i class="fa fa-star black"></i>';
					} 
				} 
			?>
		</div>
		<?php
	}



	/** 20.eCommerce Lite Woocommerce Quick View */
	public function ecommerce_lite_product_quickview(){
		if ( !defined( 'YITH_WCQV' )) return;

        global $product;
        $quick_view = YITH_WCQV_Frontend();
        remove_action( 'woocommerce_after_shop_loop_item', array( $quick_view, '_add_quick_view_button' ), 15 );
		echo '
			<a title="'. esc_html( 'Quick View', 'ecommerce-lite' ) .'" href="#" class="yith-wcqv-button" data-product_id="' . get_the_ID() . '">
				
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" width="22px" height="22px" class=""><g><g>
					<g>
						<path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z" data-original="#000000" class="active-path" data-old_color="#FDFAFA" fill="#FFFCFC"/>
					</g>
					</g><g><g><path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z" data-original="#000000" class="active-path" data-old_color="#FDFAFA" fill="#FFFCFC"/></g>
					</g></g> 
					</svg>
			</a>	
			';

	}



	/** 21.eCommerce Lite Woocommerce Compare List  */
	public function ecommerce_lite_wishlist_products() {
		if ( !defined( 'YITH_WCWL' )) return;
			global $product;
			$url			 = add_query_arg( 'add_to_wishlist', $product->get_id() );
			$id				 = $product->get_id();
			$wishlist_url	 = YITH_WCWL()->get_wishlist_url();
			?>  
			<div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr( $id ); ?>">

				<div class="yith-wcwl-add-button show" style="display:block">  
					<a href="<?php echo esc_url( $url ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $id ); ?>" data-product-type="simple" class="add_to_wishlist">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -28 512.001 512" width="18px" height="18px" class=""><g><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" data-original="#000000" class="active-path" data-old_color="#F9F7F7" fill="#F9F9F9"/></g> </svg>

					</a>
				</div>

				<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"> 
					<a href="<?php echo esc_url( $wishlist_url ); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 448.8 448.8" style="enable-background:new 0 0 448.8 448.8;" xml:space="preserve" class=""><g><g>
						<g id="check">
							<polygon points="142.8,323.85 35.7,216.75 0,252.45 142.8,395.25 448.8,89.25 413.1,53.55   " data-original="#000000" class="active-path" data-old_color="#FCF5F5" fill="#FFF8F8"/>
						</g>
					</g></g> </svg>
					</a>
				</div>

				<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
					<span class="feedback">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 448.8 448.8" style="enable-background:new 0 0 448.8 448.8;" xml:space="preserve" class=""><g><g>
						<g id="check">
							<polygon points="142.8,323.85 35.7,216.75 0,252.45 142.8,395.25 448.8,89.25 413.1,53.55   " data-original="#000000" class="active-path" data-old_color="#FCF5F5" fill="#FFF8F8"/>
						</g>
					</g></g> </svg>
					</span>
				</div>

				<div class="clear"></div>
				<div class="yith-wcwl-wishlistaddresponse"></div>

			</div>
		<?php
	}



	
	/** 22.eCommerce Lite Woocommerce Compare Product */
	
	function ecommerce_lite_add_compare_link( $product_id = false, $args = array() ) {
		if ( !defined( 'YITH_WOOCOMPARE' )) return;
		extract( $args );

		if ( ! $product_id ) {
			global $product;
			$productid = $product->get_id();
			$product_id = isset( $productid ) ? $productid : 0;
		}
		
		$is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;

		if ( ! isset( $button_text ) || $button_text == 'default' ) {
			$button_text = get_option( 'yith_woocompare_button_text', esc_html__( 'Compare', 'ecommerce-lite' ) );
			yit_wpml_register_string( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
			$button_text = yit_wpml_string_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
		}
		printf( '<a title="'. esc_html__( 'Add to Compare', 'ecommerce-lite' ) .'" href="%s" class="%s" data-product_id="%d" rel="nofollow"><span>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 511.624 511.623" style="enable-background:new 0 0 511.624 511.623;" xml:space="preserve" class=""><g><g>
			<g>
				<path d="M9.135,200.996h392.862v54.818c0,2.475,0.9,4.613,2.707,6.424c1.811,1.81,3.953,2.713,6.427,2.713    c2.666,0,4.856-0.855,6.563-2.569l91.365-91.362c1.707-1.713,2.563-3.903,2.563-6.565c0-2.667-0.856-4.858-2.57-6.567    l-91.07-91.078c-2.286-1.906-4.572-2.856-6.858-2.856c-2.662,0-4.853,0.856-6.563,2.568c-1.711,1.715-2.566,3.901-2.566,6.567    v54.818H9.135c-2.474,0-4.615,0.903-6.423,2.712S0,134.568,0,137.042v54.818c0,2.474,0.903,4.615,2.712,6.423    S6.661,200.996,9.135,200.996z" data-original="#000000" class="active-path" data-old_color="#F9F8F8" fill="#FCFBFB"/>
				<path d="M502.49,310.637H109.632v-54.82c0-2.474-0.905-4.615-2.712-6.423c-1.809-1.809-3.951-2.712-6.424-2.712    c-2.667,0-4.854,0.856-6.567,2.568L2.568,340.607C0.859,342.325,0,344.509,0,347.179c0,2.471,0.855,4.568,2.568,6.275    l91.077,91.365c2.285,1.902,4.569,2.851,6.854,2.851c2.473,0,4.615-0.903,6.423-2.707c1.807-1.813,2.712-3.949,2.712-6.427V383.72    H502.49c2.478,0,4.613-0.899,6.427-2.71c1.807-1.811,2.707-3.949,2.707-6.427v-54.816c0-2.475-0.903-4.613-2.707-6.42    C507.103,311.54,504.967,310.637,502.49,310.637z" data-original="#000000" class="active-path" data-old_color="#F9F8F8" fill="#FCFBFB"/>
			</g>
		</g></g> </svg>
		</span>', '#', 'compare', intval($product_id));
	}	



	
	/** 22.eCommerce Lite Woocommerce Shop Products Loop */
	function ecommerce_lite_woocommerce_before_shop_loop_item(){
		//woocommerce Add To Cart Object	item
		global $product;
		?>
		<div class="reveal">
			<?php  

				global $post, $product; 

				//Featured Products Display
				if( $product->is_featured() ){
					echo '<div class="featured ribbon"><span class="featured-products">Featured</span></div>';
				}

				$this->ecommerce_lite_sale_percentage_loop();#products Loop

				the_post_thumbnail('woocommerce_thumbnail'); #Products Thumbnail 
			?>
			
			<div class="hidden">
				<?php  
				
					//Second Thumbnail Images
					$attachment_ids = $product->get_gallery_image_ids();
					if ( $attachment_ids ) {
						echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
					}else{
						echo ''.$product->get_image('shop_catalog', array('class'=>'primary_image'));
					}
					
				?>
				<div class="cart-icon">
					<?php 
						$this->ecommerce_lite_add_compare_link();
						$this->ecommerce_lite_wishlist_products();
						$this->ecommerce_lite_product_quickview(); 
					?>
					<div class="addcart">
						<?php woocommerce_template_loop_add_to_cart(); #Button Cart ?>
					</div>
				</div>
			</div>
		</div>
		<div class="product-detail">
			<div class="clearfix">
				<div class="product-title">
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				</div>
			</div>
			<div class="clearfix">
			<div class="price red">
				<?php  woocommerce_template_loop_price();#Woocommerce Template loop Price ?>
			</div>
			<?php $this->ecommerce_lite_get_star_rating(); ?>
			</div>
		</div>
		
		<?php  
	}



	/** 22.eCommerce Lite Woocommerce Breadcrumb Section */
	function ecommerce_lite_woocommerce_breadcrumb(){
		ecommerce_lite_breadcrumb(); //breadcrumbs Section 
	}




	
	/** 22.eCommerce Lite Add To Cart Button Text Change */
	 function woo_custom_ecommerce_lite_woocommerce_product_add_to_cart_text() {
		$ecommerce_lite_store_woocommerce_addtocart_text = get_theme_mod( 'ecommerce_lite_store_woocommerce_addtocart_text',' Add To Cart' );
		return $ecommerce_lite_store_woocommerce_addtocart_text;
	
	}
	


}
new eCommerce_lite_Woocommerce();


//woocommmerce category id find
function  ecommerce_lite_woo_cat_id_by_slug( $slug ){
	$term = get_term_by('slug', $slug, 'product_cat', 'ARRAY_A');
	return $term['term_id'];       
}