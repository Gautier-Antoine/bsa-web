<?php
if ( ! function_exists( 'bsa_web_theme_setup' ) ) {
	function bsa_web_theme_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'menus' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
	}
}
add_action( 'after_setup_theme', 'bsa_web_theme_setup' );

function bsa_web_theme_enqueue_styles() {
    wp_register_style('theme-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style');
	// if (has_block( 'core/query' )) {
	wp_enqueue_script( 'query-slider', get_template_directory_uri() . '/includes/js/query-slider.js', 'jquery', null, true );
	// }
}
add_action( 'wp_enqueue_scripts', 'bsa_web_theme_enqueue_styles' );

if (file_exists( get_template_directory() . '/includes/php/register_block_pattern.php' )) {
	require_once( get_template_directory() . '/includes/php/register_block_pattern.php' );
}
if (file_exists( get_template_directory() . '/includes/php/create_menu_programmatically.php' )) {
	require_once( get_template_directory() . '/includes/php/create_menu_programmatically.php' );
}

// ? FIND A WAY TO CREATE NAV MENU AND KNOW REFS
// <!-- wp:navigation {"ref":9} /-->
// ? CREATE 3 Menus

// ? CREATE Homepage with template and reuseblock