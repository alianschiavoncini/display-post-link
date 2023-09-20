<?php
/**
 * Plugin Name: Display Post Link
 * Plugin URI: https://wordpress.org/plugins/display-post-link
 * Description: Display WordPress post/page links (homepage, blog, privacy, etc.) via shortcode in post/page content or widget area.
 * Version: 1.0.1
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Alian Schiavoncini
 * Author URI: https://www.alian.it
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: display-post-link
 */

if (!defined('ABSPATH')) {
	exit;
}

// Main Display Post Link function
function display_post_link($attr) {

	$args = shortcode_atts( array(
		'id' 			=> $attr['id'],
		'url' 			=> false,
		'title' 		=> false,
		'custom_title' 	=> false,
	), $attr );

	if ( is_numeric($args['id']) ) {

		$args['url'] = get_permalink( $args['id'] );
		$args['title'] = get_the_title( $args['id'] );

	}else{

		switch ($args['id']) {
			// WooCommerce
			// woocommerce_shop_page_id
			case 'woocommerce-shop' :
				if (get_option('woocommerce_shop_page_id') > 0) {
					$args['url'] = get_permalink( get_option('woocommerce_shop_page_id') );
					$args['title'] = get_the_title( get_option('woocommerce_shop_page_id') );
				}
				break;

			case 'woocommerce-terms' :
				if ( class_exists( 'woocommerce' ) && ( wc_get_page_id( 'terms' ) > 0) ) {
					$args['url'] = get_permalink( wc_get_page_id( 'terms' ) );
					$args['title'] = get_the_title( wc_get_page_id( 'terms' ) );
				}
				break;

			case 'woocommerce-cart' :
				if ( class_exists( 'woocommerce' ) && ( wc_get_page_id( 'cart' ) > 0) ) {
					$args['url'] = get_permalink( wc_get_page_id( 'cart' ) );
					$args['title'] = get_the_title( wc_get_page_id( 'cart' ) );
				}
				break;

			case 'woocommerce-myaccount' :
				if ( class_exists( 'woocommerce' ) && ( wc_get_page_id( 'myaccount' ) > 0) ) {
					$args['url'] = get_permalink( wc_get_page_id( 'myaccount' ) );
					$args['title'] = get_the_title( wc_get_page_id( 'myaccount' ) );
				}
				break;

			case 'woocommerce-checkout' :
				if ( class_exists( 'woocommerce' ) && ( wc_get_page_id( 'checkout' ) > 0) ) {
					$args['url'] = get_permalink( wc_get_page_id( 'checkout' ) );
					$args['title'] = get_the_title( wc_get_page_id( 'checkout' ) );
				}
				break;

			case 'woocommerce-refund-returns' :
				if ( class_exists( 'woocommerce' ) && ( wc_get_page_id( 'refund_returns' ) > 0) ) {
					$args['url'] = get_permalink( wc_get_page_id( 'refund_returns' ) );
					$args['title'] = get_the_title( wc_get_page_id( 'refund_returns' ) );
				}
				break;

			// WP Options
			// wp_page_for_privacy_policy
			case 'privacy-policy' :
			case 'privacypolicy' :
			case 'privacy' :
				if (get_option('wp_page_for_privacy_policy') > 0) {
					$args['url'] = get_permalink( get_option('wp_page_for_privacy_policy') );
					$args['title'] = get_the_title( get_option('wp_page_for_privacy_policy') );
				}
				break;

			// page_for_posts
			case 'blog' :
			case 'postspage' :
				if (get_option('page_for_posts') > 0) {
					$args['url'] = get_permalink( get_option('page_for_posts') );
					$args['title'] = get_the_title( get_option('page_for_posts') );
				}
				break;

			// page_on_front
			case 'homepage' :
				if (get_option('page_on_front') > 0) {
					$args['url'] = get_permalink( get_option('page_on_front') );
					$args['title'] = get_the_title( get_option('page_on_front') );
				}
				break;
		}

	}

	if (!empty($args['custom_title'])) {
		$args['title'] = $args['custom_title'];
	}

	$str = false;
	if (!empty($args['url']) && !empty($args['title'])) {
		$str = sprintf( '<a class="display-post-link" href="%s">%s</a>', esc_url($args['url']), esc_html($args['title']) );
	}

	return $str;
}
add_shortcode( 'display-post-link' , 'display_post_link' );