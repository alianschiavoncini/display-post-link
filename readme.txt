=== Display Post Link ===
Contributors: alian
Tags: display link, show link, blog link, privacy policy link, WooCommerce pages link
Requires at least: 3.0.1
Tested up to: 6.2
Stable tag:	1.0.1
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display post link via shortcode in post content or widget area. It is useful for the home page, blog page, privacy policy page and WooCommerce pages as there is no need to update the links manually. Compatible with the WPML plugin.

== Description ==
The shortcode [display-post-link] must be used to display the link in combination with the ID parameter (required).

The WordPress options IDs available are: homepage, blog, privacy-policy.
Example [display-post-link id="privacy-policy"]

For WooCoommerce plugin, you can use these options IDs: woocommerce-shop, woocommerce-terms, woocommerce-cart, woocommerce-myaccount, woocommerce-checkout. WooCommerce plugin must be installed and active.

You can also use the post ID number, but if you delete the post, the shortcode will not be able to display the link. For this reason, it is recommended to use the ID in number format only if you are sure you will not trash/delete the post or create a new one.

The custom_title parameter can also be used to display a custom text link instead the post title.
Example: [display-post-link id="privacy-policy" custom_title="Check it out our Privacy Policy!"]

== Installation ==
1. Upload the entire `display-post-link` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the **Plugins** screen (**Plugins > Installed Plugins**).

== Upgrade Notice ==

= 1.0.0 (2022-07-26) =
* Initial version
