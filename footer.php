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
			<a href="<?php echo esc_url( __( 'https://www.storelocatorplus.com/', 'twentytwelve-docsite' ) ); ?>"
               title="<?php printf( __( 'A %s Derivative Work.', 'twentytwelve-docsite' ), 'Store Locator Plus' ); ?>"
               ><?php printf( __( 'A %s Derivative Work.', 'twentytwelve-docsite' ), 'Store Locator Plus' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>