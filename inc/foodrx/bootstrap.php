<?php
/**
 * Food Rx Nutrition — site content bootstrap.
 *
 * @package Healthy Living
 */

if (!defined('ABSPATH')) {
	exit;
}

require_once __DIR__ . '/content.php';
require_once __DIR__ . '/render.php';
require_once __DIR__ . '/setup.php';

/**
 * Site-wide Food Rx adjustments (navigation colors, etc.).
 */
function foodrx_enqueue_theme_assets() {
	wp_enqueue_style(
		'foodrx-theme',
		get_template_directory_uri() . '/assets/css/foodrx-theme.css',
		array('theme-schemes-secondary'),
		'1.0.7'
	);

	wp_enqueue_script(
		'foodrx-cookie-consent',
		get_template_directory_uri() . '/assets/js/foodrx-cookie-consent.js',
		array(),
		'1.0.0',
		true
	);
}

add_action('wp_enqueue_scripts', 'foodrx_enqueue_theme_assets', 20);

/**
 * Enqueue Food Rx page styles on custom templates.
 */
function foodrx_enqueue_assets() {
	if (!is_page()) {
		return;
	}

	$template = get_page_template_slug();

	if (strpos($template, 'page-foodrx-') === 0) {
		wp_enqueue_style(
			'foodrx-pages',
			get_template_directory_uri() . '/assets/css/foodrx-pages.css',
			array(),
			'2.6.0'
		);
	}
}

add_action('wp_enqueue_scripts', 'foodrx_enqueue_assets');

/**
 * Register blog categories used by the Nutrition Hub page.
 */
function foodrx_register_categories() {
	$categories = array(
		'recipes' => 'Recipes',
		'nutrition-blog' => 'Nutrition Blog',
	);

	foreach ($categories as $slug => $name) {
		if (!term_exists($slug, 'category')) {
			wp_insert_term($name, 'category', array('slug' => $slug));
		}
	}
}

add_action('after_switch_theme', 'foodrx_register_categories');

/**
 * Keep Food Rx page header settings in sync on every request.
 */
function foodrx_sync_current_page_meta() {
	if (!is_page()) {
		return;
	}

	// get_queried_object_id() is reliable at template_redirect time; avoid
	// get_page_template_slug() with no argument because $GLOBALS['post'] is
	// not yet populated before the loop runs.
	$page_id = (int) get_queried_object_id();

	if ($page_id <= 0) {
		return;
	}

	$template = get_page_template_slug($page_id);

	foreach (foodrx_get_menu_page_definitions() as $definition) {
		if ($template === $definition['template']) {
			foodrx_apply_foodrx_page_meta($page_id, $definition['slug']);
			return;
		}
	}
}

add_action('template_redirect', 'foodrx_sync_current_page_meta', 5);

/**
 * Mark the contact page for theme overlap/header styling.
 *
 * @param array<int, string> $classes Body classes.
 * @return array<int, string>
 */
function foodrx_contact_body_class($classes) {
	if (is_page_template('page-foodrx-contact.php')) {
		$classes[] = 'foodrx-contact-page';
	}

	return $classes;
}

add_filter('body_class', 'foodrx_contact_body_class');

/**
 * Map Food Rx templates to their banner background keys.
 *
 * @return array<string, string>
 */
function foodrx_get_banner_bg_keys_by_template() {
	return array(
		'page-foodrx-faq.php' => 'faq',
		'page-foodrx-services.php' => 'services',
		'page-foodrx-nutrition-hub.php' => 'nutrition-hub',
	);
}

/**
 * @return string Background key or empty string.
 */
function foodrx_get_current_banner_bg_key() {
	if (!is_page()) {
		return '';
	}

	$page_id = (int) get_queried_object_id();
	$template = get_page_template_slug($page_id);
	$map = foodrx_get_banner_bg_keys_by_template();

	return $map[$template] ?? '';
}

/**
 * Output full-width page banner background styles for Food Rx inner pages.
 *
 * Injected after theme defaults so the demo photo always shows even if stale
 * post meta or attachment IDs are stored in the database.
 */
function foodrx_print_page_heading_styles() {
	$bg_key = foodrx_get_current_banner_bg_key();

	if ($bg_key === '') {
		return;
	}

	$bg_url = esc_url(foodrx_get_page_bg_url($bg_key));

	if ($bg_url === '') {
		return;
	}

	echo '<style id="foodrx-page-heading">' . "\n";
	echo '.headline_outer {' . "\n";
	echo 'background-image:url(' . $bg_url . ') !important;' . "\n";
	echo 'background-repeat:no-repeat !important;' . "\n";
	echo 'background-attachment:scroll !important;' . "\n";
	echo 'background-size:cover !important;' . "\n";
	echo 'background-position:center center !important;' . "\n";
	echo '}' . "\n";
	echo '.headline_color {' . "\n";
	echo 'background-color:rgba(37,37,37,0.55) !important;' . "\n";
	echo '}' . "\n";
	echo '.headline_aligner,' . "\n";
	echo '.cmsmasters_breadcrumbs_aligner {' . "\n";
	echo 'min-height:360px !important;' . "\n";
	echo '}' . "\n";
	echo '</style>' . "\n";
}

add_action('wp_head', 'foodrx_print_page_heading_styles', 99);

/**
 * Body classes for Food Rx banner pages (FAQ, Services, Nutrition Hub).
 *
 * @param array<int, string> $classes Body classes.
 * @return array<int, string>
 */
function foodrx_banner_body_class($classes) {
	$bg_key = foodrx_get_current_banner_bg_key();

	if ($bg_key === '') {
		return $classes;
	}

	$classes[] = 'foodrx-banner-page';
	$classes[] = 'foodrx-banner-page--' . sanitize_html_class($bg_key);

	return $classes;
}

add_filter('body_class', 'foodrx_banner_body_class');
