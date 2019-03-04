<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if (is_user_logged_in() && current_user_can('edit_posts')):?>

	<form class="submit-quote" id="submit-quote" method="post">
		<label for="quote-author">Author of Quote</label>
			<input type="text" id="quote-author"  name="quote-author" required>
			
		<label for="the-quote">Quote</label>
			<input type="text" id="the-quote" name="the-quote" required>

			<label for="quote-source">Where did you find the quote? (e.g. book name)</label>
				<input type="text" id="quote-source"  name="quote-source">

			<label for="source-url">Provide the URL of the quote source, if available</label>	
				<input type="text" id="source-url"  name="source-url">

			<input type="submit" value="Submit Quote" class="submit-button" id="submit-button">
		</form>

			<?php else: ?>
			<a href="<?php echo wp_login_url();?>">Click here to login</a>
			<?php endif; // End of the loop. ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>