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
 * @return int Nutrition Hub page ID or 0.
 */
function foodrx_get_nutrition_hub_page_id() {
	static $page_id = null;

	if ($page_id !== null) {
		return $page_id;
	}

	$page = get_page_by_path('nutrition-hub', OBJECT, 'page');
	$page_id = ($page instanceof WP_Post) ? (int) $page->ID : 0;

	return $page_id;
}

/**
 * True when the blog index URL is the Nutrition Hub page (Settings → Reading → Posts page).
 */
function foodrx_is_nutrition_hub_posts_page_view() {
	if (!is_home() || is_front_page()) {
		return false;
	}

	$posts_page_id = (int) get_option('page_for_posts');
	$hub_page_id = foodrx_get_nutrition_hub_page_id();

	return $posts_page_id > 0 && $hub_page_id > 0 && $posts_page_id === $hub_page_id;
}

/**
 * True on the Nutrition Hub page template or its posts-page blog index URL.
 */
function foodrx_is_nutrition_hub_view() {
	if (foodrx_is_nutrition_hub_posts_page_view()) {
		return true;
	}

	if (!is_page()) {
		return false;
	}

	$page_id = (int) get_queried_object_id();

	if ($page_id <= 0) {
		return false;
	}

	if (get_page_template_slug($page_id) === 'page-foodrx-nutrition-hub.php') {
		return true;
	}

	$page = get_post($page_id);

	return ($page instanceof WP_Post) && $page->post_name === 'nutrition-hub';
}

/**
 * Page ID whose CMSMasters banner meta should drive the current view.
 *
 * @return int
 */
function foodrx_get_current_banner_page_id() {
	if (foodrx_is_nutrition_hub_posts_page_view()) {
		return (int) get_option('page_for_posts');
	}

	if (is_page()) {
		return (int) get_queried_object_id();
	}

	return 0;
}

/**
 * Site-wide Food Rx adjustments (navigation colors, etc.).
 */
function foodrx_enqueue_theme_assets() {
	wp_enqueue_style(
		'foodrx-theme',
		get_template_directory_uri() . '/assets/css/foodrx-theme.css',
		array('theme-schemes-secondary'),
		'1.1.1'
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
	$load_pages_css = false;

	if (is_page()) {
		$template = get_page_template_slug();
		$load_pages_css = strpos($template, 'page-foodrx-') === 0;
	} elseif (foodrx_is_nutrition_hub_posts_page_view()) {
		$load_pages_css = true;
	}

	if (!$load_pages_css) {
		return;
	}

	wp_enqueue_style(
		'foodrx-pages',
		get_template_directory_uri() . '/assets/css/foodrx-pages.css',
		array(),
		'3.1.0'
	);
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
 * Keep Food Rx page layout/header structure in sync without overwriting banner
 * images chosen in WP Admin (CMSMasters Page Options → Heading).
 */
function foodrx_sync_current_page_meta() {
	if (foodrx_is_nutrition_hub_posts_page_view()) {
		foodrx_sync_foodrx_page_layout_meta((int) get_option('page_for_posts'), 'nutrition-hub');
		return;
	}

	if (!is_page()) {
		return;
	}

	$page_id = (int) get_queried_object_id();

	if ($page_id <= 0) {
		return;
	}

	$template = get_page_template_slug($page_id);

	foreach (foodrx_get_menu_page_definitions() as $definition) {
		if ($template === $definition['template']) {
			foodrx_sync_foodrx_page_layout_meta($page_id, $definition['slug']);
			return;
		}
	}

	// Fallback when the page slug matches but the template meta is missing.
	$page = get_post($page_id);

	if ($page instanceof WP_Post) {
		foreach (foodrx_get_menu_page_definitions() as $definition) {
			if ($page->post_name === $definition['slug']) {
				foodrx_sync_foodrx_page_layout_meta($page_id, $definition['slug']);
				return;
			}
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
	if (foodrx_is_nutrition_hub_view()) {
		return 'nutrition-hub';
	}

	if (!is_page()) {
		return '';
	}

	$page_id = (int) get_queried_object_id();
	$template = get_page_template_slug($page_id);
	$map = foodrx_get_banner_bg_keys_by_template();

	if (isset($map[$template])) {
		return $map[$template];
	}

	$page = get_post($page_id);

	if (!$page instanceof WP_Post) {
		return '';
	}

	$slug_map = array(
		'faq' => 'faq',
		'services' => 'services',
		'nutrition-hub' => 'nutrition-hub',
	);

	return $slug_map[$page->post_name] ?? '';
}

/**
 * Output page heading banner CSS from WP Admin meta (reliable on Food Rx pages).
 *
 * The parent theme resolves heading styles with get_the_ID() during wp_head before
 * the loop runs, which can miss page meta and fall back to the gray default texture.
 */
function foodrx_print_page_heading_styles() {
	$page_id = foodrx_get_current_banner_page_id();
	$bg_key = foodrx_get_current_banner_bg_key();

	if ($page_id <= 0 || $bg_key === '') {
		return;
	}

	$css = foodrx_get_page_heading_banner_styles($page_id, $bg_key);

	if ($css === '') {
		return;
	}

	echo '<style id="foodrx-page-heading">' . "\n" . $css . '</style>' . "\n";
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

	if (foodrx_is_nutrition_hub_posts_page_view()) {
		$classes[] = 'foodrx-nutrition-hub-posts-page';
	}

	return $classes;
}

add_filter('body_class', 'foodrx_banner_body_class');
