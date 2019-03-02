<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-content">
		<i class="fas fa-quote-left"></i>
			<?php the_content(); ?>
		<i class="fas fa-quote-right"></i>
	</header><!-- .entry-header -->

	<div class="entry-title">
		<?php the_title(); ?>
	</div>

	
	<div class= "entry-source">
		<?php echo get_post_meta(get_the_ID(),'_qod_quote_source', true) ?>
	</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->