<?php

/**
 * Enqueue our custom docsite styles.
 */
function parent_css_theme_style() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
 wp_enqueue_style( 'dashicons' );
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
                    <span class="dashicons dashicons-category"></span>
	                <h4><?php echo __('Related Categories' , 'twentytwelve-docsite' ); ?></h4>
		            <?php echo $categories_list; ?>
	            </div>
	            <div class="post_meta_box tags">
                    <span class="dashicons dashicons-tag"></span>
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

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve Docsite 4.6.1
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_docsite_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) || is_page_template( 'page-templates/full-width-noheader.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/full-width-noheader.php' ) )
		$classes[] = 'noheader';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
remove_filter( 'body_class', 'twentytwelve_body_class' );
add_filter( 'body_class', 'twentytwelve_docsite_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_docsite_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_page_template( 'page-templates/full-width-noheader.php' ) ||is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
remove_action('template_redirect', 'twentytwelve_content_width' );
add_action( 'template_redirect', 'twentytwelve_docsite_content_width' );
