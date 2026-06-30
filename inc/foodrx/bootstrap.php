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
		'1.0.4'
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
			'2.4.0'
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

	$template = get_page_template_slug();

	foreach (foodrx_get_menu_page_definitions() as $definition) {
		if ($template === $definition['template']) {
			foodrx_apply_foodrx_page_meta(get_queried_object_id(), $definition['slug']);
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
