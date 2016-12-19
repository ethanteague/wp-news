=== PUZZLER is JS + CSS combine ===
Contributors: igorantoshkin
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=igor%2eantoshkin%40gmail%2ecom&lc=GB&item_name=WP%20Puzzler%20plugin&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted
Tags: js, css, combine, combination, aggregate, aggregation, aggregator, combiner, async, lazy, defer, javascript, stylesheet, pagespeed, puzzler, style, script, fast, load, speed, page, pack, one, file, minify, compress
Requires at least: 3.4
Tested up to: 4.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Puzzler plugin - it smart simple and fast auto aggregator (combiner) CSS and JS scripts for Wordpress.

== Description ==

Puzzler - it excellent js/css aggregator for advanced users:

* Automatically combines all enqueued scripts/styles into a single file, for faster loading blog.
* Starts immediately without setting.
* You can adds scripts and styles in queue, change the order, edit - and Puzzler automatically make recombines.

Puzzler - don't worry be happy.

Require PHP 5.4 or high.

You should remember 3 key rules before using:
### Key rule 1
>All scripts and styles must include ONLY 1 time and ONLY in 1 place, e.g. in wp_enqueue_scripts hook

### Key rule 2
>Styles(css) aggregation perform only for media='all' ( without alternative stylesheets, titles, conditionals )

### Key rule 3
>Avoid register/enqueue scripts/styles in conditional expressions
`add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts() {

  // -- don't do it !
  if ( is_single() || is_page() ) { 
      wp_enqueue_script('myscript');
  }

  // -- correct !
  wp_enqueue_script('myscript');

}`

-----------

#### Features
* Auto detect files change
* Autocorrect internal links in the CSS after aggregation ( url/src )
* Auto +20 scores in Google PageSpeed Insights
* Async/lazy load aggregated scripts/styles
* Windows compatible

== Installation ==

1. Make sure **PHP version is 5.4** or high.
2. Create in your *wp-content* directory, **cache** folder with 0777 permissions
3. Upload the plugin files to the `plugins/puzzler` directory, or install the plugin through the WordPress plugins screen directly.
4. Activate the plugin through the 'Plugins' screen in WordPress
5. You can configure plugin through "Puzzler" item in main admin menu

== Screenshots ==

1. Puzzler settings

== Changelog ==

= 1.0 =
* First version

== Frequently Asked Questions ==
None FAQs

== Upgrade Notice ==

None upgrades
