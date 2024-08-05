<?php
/**
 * Plugin Name: Display Post Link
 * Plugin URI: https://wordpress.org/plugins/display-post-link
 * Description: Display WordPress post/page links (homepage, blog, privacy, etc.) via shortcode in post/page content or widget area.
 * Version: 1.0.2
 * Requires at least: 5.2
 * Requires PHP: 7.4
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
	// Sanitize and validate attributes
	$attr = shortcode_atts(array(
		'id'           => '',
		'url'          => false,
		'title'        => false,
		'custom_title' => false,
	), $attr);

	$args = array(
		'id'           => sanitize_text_field($attr['id']),
		'url'          => esc_url($attr['url']),
		'title'        => sanitize_text_field($attr['title']),
		'custom_title' => sanitize_text_field($attr['custom_title']),
	);

	if (is_numeric($args['id'])) {
		$post_id = intval($args['id']);
		$args['url'] = get_permalink($post_id);
		$args['title'] = get_the_title($post_id);
	} else {
		switch ($args['id']) {
			// WooCommerce
			case 'woocommerce-shop':
				$shop_page_id = get_option('woocommerce_shop_page_id');
				if ($shop_page_id > 0) {
					$args['url'] = get_permalink($shop_page_id);
					$args['title'] = get_the_title($shop_page_id);
				}
				break;
			case 'woocommerce-terms':
				if (class_exists('woocommerce')) {
					$terms_page_id = wc_get_page_id('terms');
					if ($terms_page_id > 0) {
						$args['url'] = get_permalink($terms_page_id);
						$args['title'] = get_the_title($terms_page_id);
					}
				}
				break;
			case 'woocommerce-cart':
				if (class_exists('woocommerce')) {
					$cart_page_id = wc_get_page_id('cart');
					if ($cart_page_id > 0) {
						$args['url'] = get_permalink($cart_page_id);
						$args['title'] = get_the_title($cart_page_id);
					}
				}
				break;
			case 'woocommerce-myaccount':
				if (class_exists('woocommerce')) {
					$myaccount_page_id = wc_get_page_id('myaccount');
					if ($myaccount_page_id > 0) {
						$args['url'] = get_permalink($myaccount_page_id);
						$args['title'] = get_the_title($myaccount_page_id);
					}
				}
				break;
			case 'woocommerce-checkout':
				if (class_exists('woocommerce')) {
					$checkout_page_id = wc_get_page_id('checkout');
					if ($checkout_page_id > 0) {
						$args['url'] = get_permalink($checkout_page_id);
						$args['title'] = get_the_title($checkout_page_id);
					}
				}
				break;
			case 'woocommerce-refund-returns':
				if (class_exists('woocommerce')) {
					$refund_returns_page_id = wc_get_page_id('refund_returns');
					if ($refund_returns_page_id > 0) {
						$args['url'] = get_permalink($refund_returns_page_id);
						$args['title'] = get_the_title($refund_returns_page_id);
					}
				}
				break;
			// WP Options
			case 'privacy-policy':
			case 'privacypolicy':
			case 'privacy':
				$privacy_page_id = get_option('wp_page_for_privacy_policy');
				if ($privacy_page_id > 0) {
					$args['url'] = get_permalink($privacy_page_id);
					$args['title'] = get_the_title($privacy_page_id);
				}
				break;
			case 'blog':
			case 'postspage':
				$posts_page_id = get_option('page_for_posts');
				if ($posts_page_id > 0) {
					$args['url'] = get_permalink($posts_page_id);
					$args['title'] = get_the_title($posts_page_id);
				}
				break;
			case 'homepage':
				$front_page_id = get_option('page_on_front');
				if ($front_page_id > 0) {
					$args['url'] = get_permalink($front_page_id);
					$args['title'] = get_the_title($front_page_id);
				}
				break;
		}
	}

	if (!empty($args['custom_title'])) {
		$args['title'] = $args['custom_title'];
	}

	$str = false;
	if (!empty($args['url']) && !empty($args['title'])) {
		$str = sprintf('<a class="display-post-link" href="%s">%s</a>', esc_url($args['url']), esc_html($args['title']));
	}

	return $str;
}
add_shortcode('display-post-link', 'display_post_link');
