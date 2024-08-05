=== Display Post Link ===
Contributors: alian
Tags: display link, show link, blog link, privacy policy link, WooCommerce pages link
Requires at least: 3.0.1
Tested up to: 6.6.1
Stable tag:	1.0.2
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display WordPress post/page links (homepage, blog, privacy, etc.) via shortcode in post/page content or widget area.

== Description ==
This plugin was designed to return the correct link to the special WordPress pages such as the homepage, blog, privacy policy, etc.
The [display-post-link] shortcode must be used in combination with a Name to display the link.
Example [display-post-link id="privacy-policy"]

<strong>Main WordPress options names:</strong>
<ul>
<li>homepage</li>
<li>blog</li>
<li>privacy-policy</li>
</ul>

<strong>WooCommerce options names:</strong>
<ul>
<li>woocommerce-shop</li>
<li>woocommerce-terms</li>
<li>woocommerce-cart</li>
<li>woocommerce-myaccount</li>
<li>woocommerce-checkout</li>
<li>woocommerce-refund-returns</li>
</ul>

Note: WooCommerce plugin must be installed and active if you would like to use the WooCommerce options names.

It is also possible to use the numeric post/page ID instead of the name but if the post is deleted, the link will not be displayed.

<strong>Custom title</strong>
A custom_title parameter can be used to display a custom text link instead of the post/page title.
Example: [display-post-link id="privacy-policy" custom_title="Check it out our Privacy Policy!"]

Compatible with WPML plugin.

== Installation ==
1. Upload the entire `display-post-link` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the **Plugins** screen (**Plugins > Installed Plugins**).

== Upgrade Notice ==
= 1.0.2 (2024-08-05) =
* Security and performance enhancements
* Added full compatibility with WordPress version 6.6.1.

= 1.0.1 (2022-07-26) =
* Added WooCommerce Return and Returns Policy page
* Added plugin screenshots

= 1.0.0 (2022-07-26) =
* Initial version
