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

			<?php

       $the_query = new WP_Query(array(
           'post_type'      => 'post',
           'orderby'        => 'title',
           'order'          => 'ASC',
           'posts_per_page' => -1,
       )); ?>
       <div class="list-all-authors">
           <?php  /* Start the Loop */ ?>
           <?php while ($the_query->have_posts()): $the_query->the_post();  ?>
           <?php the_title(sprintf('<span class="each-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></span>'); ?>
           <?php endwhile;
       wp_reset_postdata(); ?>
        </div>
			
				<ul>
					<?php wp_list_categories( array(
						'orderby' => 'name'
						) ); ?> 
				</ul>

				<?php wp_tag_cloud( array( 'tags' ) ); ?>


			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
