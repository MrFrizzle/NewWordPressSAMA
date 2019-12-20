<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eCommerce_lite
 */

?>

<div class="col-md-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">
		<div class="blog-list">
			<?php do_action('ecommerce_thumbnail_image');#ecommerce Thumbnail ?>
			<div class="blog-detail">
				<a href="<?php the_permalink(); ?>">
					<?php the_title( '<h4 class="text-uppercase" itemprop="headline">', '</h4>' ); ?>
				</a>
				<div class="text-left" itemprop="articleBody">
					<?php the_excerpt(); ?>
				</div>
				<div class="blog-author-detail">
					<span class="black"><i class="fa fa-calendar"></i> <?php the_time( get_option('date_format') ); ?></span>
					<span><i class="fa fa-user"></i> <a href="<?php the_author_link(); ?>" class="author"><?php the_author(); ?></a></span>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->   
</div>