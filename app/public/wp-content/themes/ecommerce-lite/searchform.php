<?php
/**
 * Displays the searchform of the theme.
 *
 * @package Spiderbuzz
 * @since eCommerce Lite 1.0.0
 */
?>
<div class="search-box">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="clearfix">
        <input type="text" class="s" name="s" placeholder="<?php esc_attr_e('Search...','ecommerce-lite'); ?>">
        <button type="submit" class="search-btn white hidden"><i class="fa fa-search"></i></button>
    </form>
</div>