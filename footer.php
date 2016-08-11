<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve_Docsite
 * @since Twenty Twelve Docsite 4.4.01
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://www.cybersprocket.com/', 'twentytwelve-docsite' ) ); ?>"
               title="<?php printf( __( 'A %s Derivative Work.', 'twentytwelve-docsite' ), 'Cyber Sprocket Labs' ); ?>"
               ><?php printf( __( 'A %s Derivative Work.', 'twentytwelve-docsite' ), 'Cyber Sprocket Labs' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>