<?php 
if ( !function_exists( 'underscores_setup' ) ) {
	function underscores_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size('slider', 960, 360, true);
		add_image_size('baner', 960, 150, true);
		add_image_size('product', 500, 500, true);
		add_image_size('small-product', 120, 120, true);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
add_action( 'after_setup_theme', 'underscores_setup' );

/* LOAD ALL OF THE SCRIPTS AND STYLES THAT YOU NEED */
function scripts_and_styles() {
	wp_enqueue_style('style', get_template_directory_uri().'/css/style.css', array());
	wp_enqueue_style('font-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap', array());
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css', array());
}
add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );

/* CHANGE LOGIN PAGE IMAGE URL TO MAIN PAGE URL*/
function mb_login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'mb_login_url' );

/* REGISTER CUSTOM MENU POSITION */
function register_custom_menu_position() {
	register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_custom_menu_position' );

/* ADD OPTIONS TO THE WORDPRESS ADMIN PAGE */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
			array(
					'page_title' => 'Opcje Szablonu',
					'menu_title' => 'Opcje Szablonu',
					'menu_slug'  => 'options',
					'capability' => 'edit_posts',
					'redirect'   => false,
			)
	);
}

function thumbnail_upscale($default, $orig_w, $orig_h, $new_w, $new_h, $crop)
{
    if (!$crop) return null; // let the wordpress default function handle this

    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor(($orig_w - $crop_w) / 2);
    $s_y = floor(($orig_h - $crop_h) / 2);

    return array(0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
}
add_filter('image_resize_dimensions', 'thumbnail_upscale', 10, 6);