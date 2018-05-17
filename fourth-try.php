<?php

/*
Plugin Name: Product Sorter
Description: Add products to your website with my plugin. This plugin allows your customers to sort by size, colors, price or stock status.
Author:      Meg Gauthier
Version:     1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


	// include dependencies
	require plugin_dir_path( __FILE__ ) . 'inc/admin.php';
	require plugin_dir_path( __FILE__ ) . 'inc/handler.php';
	require plugin_dir_path( __FILE__ ) . 'templates/create-template.php';
	//require plugin_dir_path( __FILE__ ) . 'templates/template-product.php';


//enqueue scripts
function megs_enqueue_script() {   
	wp_register_script( 'meggy', plugin_dir_path( __FILE__ ) . 'scripts/megs-ajax.js' );
    wp_enqueue_script( 'meggy' );
}
add_action('wp_enqueue_scripts', 'megs_enqueue_script');


//enqueue styles
function wpb_adding_styles() {
wp_register_style('mg_styles', plugin_dir_path( __FILE__ ) . 'styles/style.css' );
wp_enqueue_style('mg_styles');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles', 1 );
