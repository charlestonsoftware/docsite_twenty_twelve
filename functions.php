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