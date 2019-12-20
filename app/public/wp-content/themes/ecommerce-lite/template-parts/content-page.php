<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce_lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="blog-list">
        <div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
        <div class="blog-detail">
            <?php the_title( '<h4 class="text-uppercase" itemprop="headline">', '</h4>' ); ?>
            <div class="text-left" itemprop="articleBody">
                <?php the_content(); ?>
            </div>
            
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> --> 