<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_title( '<h2 class="page-title">', '</h2>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>			

			<section class="list-all-authors">
			<h3>Quote Authors</h3>
			<?php
       $the_query = new WP_Query(array(
           'post_type'      => 'post',
           'orderby'        => 'title',
           'order'          => 'ASC',
		   'posts_per_page' => -1,
		   'format'			=> 'list' //TODO: WHY ISN'T THE LIST THING WORKING?
       )); ?>
           <?php  /* Start the Loop */ ?>
           <?php while ($the_query->have_posts()): $the_query->the_post();  ?>
           <?php the_title(sprintf('<span class="each-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></span>'); ?>
           <?php endwhile; wp_reset_postdata(); ?>
			</section>

				<section class="quote-categories">
					<h3>Categories</h3>
					<ul>
					<?php wp_list_categories( array(
						'orderby' => 'name',
						'style'  => 'list',
						'title_li' => ''
						) ); ?>
						</ul> 
<!-- TODO: add classes thru wp and move some stuff to functions --> 
					</section>

					<section class="tag-cloud">	
			<h3>Tags</h3>
				<?php wp_tag_cloud( array(
					'tags',
					'smallest'          => 1.5,
					'largest'           => 1.5,
					'unit'				=> 'rem',
					'format'			=> 'list' ) ); ?>
			</section>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
