<?php
/**
 * Template Name: Full-width, No Sidebar, No Header
 *
 * Description: Remove the sidebar AND the header on a page.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Twelve_Docsite
 * @since Twenty Twelve Docsite 4.6.1
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>