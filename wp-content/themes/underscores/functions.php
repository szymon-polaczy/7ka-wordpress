<?php 
if ( !function_exists( 'underscores_setup' ) ) {
	function underscores_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
add_action( 'after_setup_theme', 'underscores_setup' );

function scripts_and_styles() {
}
add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );

