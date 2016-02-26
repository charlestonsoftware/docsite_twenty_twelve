<?php

/**
 * Enqueue our custom docsite styles.
 */
function parent_css_theme_style() { 
 wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 
}
add_action( 'wp_enqueue_scripts', 'parent_css_theme_style' );


/**
 * Register our header widget.
 */
function twentytwelve_docsite_header_widget_init() {
    register_sidebar( array(
        'name' => __( 'Header Widget Area', 'twentytwelve_docsite' ),
        'id' => 'sidebar-4',
        'description' => __( 'Appears at the top of every page.', 'twentytwelve_docsite' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'twentytwelve_docsite_header_widget_init' );