<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-content">
		<?php the_content(); ?>
	</header><!-- .entry-header -->

	<div class="entry-title">
		<?php the_title(); ?>
	
		<div class="entry-source">
		<?php the_title(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
