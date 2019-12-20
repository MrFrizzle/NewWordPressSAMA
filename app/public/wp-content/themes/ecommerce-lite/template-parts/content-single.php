<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce_lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemscope itemtype="http://schema.org/BlogPosting">
    <div class="blog-list">
        <div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
        <div class="blog-detail">
            <?php the_title( '<h4 class="text-uppercase" itemprop="headline" >', '</h4>' ); ?>
            <div class="text-left" itemprop="articleBody">
                <?php 
                    the_content(); 
                    
                    wp_link_pages( array(
                          'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'ecommerce-lite' ),
                          'after'  => '</div>',
                        ) );
                ?>
            </div>
            <div class="blog-author-detail">
                <span class="black"><i class="fa fa-calendar"></i> <?php the_time( get_option('date_format') ); ?></span>
                <span><i class="fa fa-user"></i> <a href="<?php the_author_link(); ?>" class="author"><?php the_author(); ?></a></span>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> --> 