<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!-- TODO: this page uses an if loop with else then endif -->
 <!-- NEED IS_USER_LOGGED_IN &&  current_user_can('edit posts') -->

			<?php if ( have_posts() ) : the_post(); ?>

	<form class="submit-quote">
		<label for="quote-author">Author of Quote</label>
			<input type="text" name="quote-author" ><br>
			
		<label for="the-quote">The Quote</label>
			<input type="textarea" name="the-quote"><br>

			<label for="quote-source">Where did you find the quote? (e.g. book name)</label>
				<input type="text" name=quote-source><br>

			<label for="source-url">Provide the URL of the quote source, if available</label>	
				<input type="text"><br>

			<input type="submit" value="submit" class="submit-button">

	</form>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php else ?>

			<?php endif; // End of the loop. ?>
<!-- using a if else statement sprintf WP_LOGIN_URL to get  a login button -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
