<?php

/**
 * Enqueue our custom docsite styles.
 */
function parent_css_theme_style() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'parent_css_theme_style' );


/**
 * Register extra widgets.
 */
function twentytwelve_docsite_widgets() {

    // Header Widget : header-1
    //
    register_sidebar( array(
        'name' => __( 'Header Widget Area', 'twentytwelve_docsite' ),
        'id' => 'header-1',
        'description' => __( 'Appears at the top of every page.', 'twentytwelve_docsite' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    //  No Posts Widget : none-1
    //
    register_sidebar( array(
        'name' => __( 'No Posts Widgets', 'twentytwelve_docsite' ),
        'id' => 'none-1',
        'description' => __( 'Appears on the bottom of No Posts pages.', 'twentytwelve_docsite' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


}
add_action( 'widgets_init', 'twentytwelve_docsite_widgets' );

if ( ! function_exists( 'twentytwelve_docsite_entry_meta' ) ) :
	/**
	 * Set up post entry meta.
	 *
	 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
	 *
	 * Create your own twentytwelve_docsite_entry_meta() to override in a child theme.
	 *
	 * @since Twenty Twelve Docsite 4.6.1
	 */
	function twentytwelve_docsite_entry_meta() {
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'twentytwelve-docsite' ) );

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve-docsite' ) );

		$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		?>
		<div class="post_meta">
	        <div class="post_meta_boxes">
	            <div class="post_meta_box categories">
	                <h4><?php echo __('Related Categories' , 'twentytwelve-docsite' ); ?></h4>
		            <?php echo $categories_list; ?>
	            </div>
	            <div class="post_meta_box tags">
	                <h4><?php echo __('Related Tags' , 'twentytwelve-docsite' ); ?></h4>
		            <?php echo $tag_list; ?>
	            </div>
	            <div class="post_meta_box details">
	                <h4><?php echo __('Details' , 'twentytwelve-docsite' ); ?></h4>
		            <?php echo $date; ?>
	            </div>
	        </div>
		</div>
		<?php
	}
endif;