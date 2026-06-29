<?php
/**
 * Food Rx Nutrition — one-time WordPress page, menu, and reading setup.
 *
 * Converts a demo/stock install to Food Rx templates without manual WP admin steps.
 *
 * @package Healthy Living
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * @return bool
 */
function foodrx_is_site_configured() {
	$front_id = (int) get_option('page_on_front');

	if (!$front_id) {
		return false;
	}

	return get_page_template_slug($front_id) === 'page-foodrx-home.php';
}

/**
 * @return array<int, array{title: string, slug: string, template: string}>
 */
function foodrx_get_page_definitions() {
	return array(
		array(
			'title' => 'Home',
			'slug' => 'home',
			'template' => 'page-foodrx-home.php',
		),
		array(
			'title' => 'Services',
			'slug' => 'services',
			'template' => 'page-foodrx-services.php',
		),
		array(
			'title' => 'Nutrition Hub',
			'slug' => 'nutrition-hub',
			'template' => 'page-foodrx-nutrition-hub.php',
		),
		array(
			'title' => 'FAQ',
			'slug' => 'faq',
			'template' => 'page-foodrx-faq.php',
		),
		array(
			'title' => 'Contact',
			'slug' => 'contact',
			'template' => 'page-foodrx-contact.php',
		),
		array(
			'title' => 'Terms & Conditions',
			'slug' => 'terms-and-conditions',
			'template' => 'page-foodrx-legal.php',
		),
		array(
			'title' => 'Privacy Policy',
			'slug' => 'privacy-policy',
			'template' => 'page-foodrx-legal.php',
		),
	);
}

/**
 * @param array{title: string, slug: string, template: string} $definition Page definition.
 * @return int Page ID.
 */
function foodrx_upsert_page($definition) {
	$existing = get_page_by_path($definition['slug'], OBJECT, 'page');

	if ($existing instanceof WP_Post) {
		$page_id = (int) $existing->ID;

		wp_update_post(array(
			'ID' => $page_id,
			'post_title' => $definition['title'],
			'post_name' => $definition['slug'],
			'post_content' => '',
			'post_status' => 'publish',
		));
	} else {
		$page_id = (int) wp_insert_post(array(
			'post_title' => $definition['title'],
			'post_name' => $definition['slug'],
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_content' => '',
		));
	}

	if ($page_id <= 0) {
		return 0;
	}

	update_post_meta($page_id, '_wp_page_template', $definition['template']);
	update_post_meta($page_id, 'cmsmasters_layout', 'fullwidth');
	update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'true');
	update_post_meta($page_id, 'cmsmasters_bottom_sidebar', 'false');

	return $page_id;
}

/**
 * @param string               $menu_name Menu name.
 * @param array<string, int>   $items     Menu label => page ID.
 * @return int Menu term ID.
 */
function foodrx_create_menu($menu_name, $items) {
	$menu = wp_get_nav_menu_object($menu_name);

	if ($menu) {
		$menu_id = (int) $menu->term_id;
		$existing_items = wp_get_nav_menu_items($menu_id);

		if ($existing_items) {
			foreach ($existing_items as $item) {
				wp_delete_post((int) $item->ID, true);
			}
		}
	} else {
		$menu_id = (int) wp_create_nav_menu($menu_name);
	}

	$position = 1;

	foreach ($items as $title => $page_id) {
		if ($page_id <= 0) {
			continue;
		}

		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' => $title,
			'menu-item-object' => 'page',
			'menu-item-object-id' => $page_id,
			'menu-item-type' => 'post_type',
			'menu-item-status' => 'publish',
			'menu-item-position' => $position,
		));

		$position++;
	}

	return $menu_id;
}

/**
 * Create Food Rx pages, set homepage, and assign navigation menus.
 */
function foodrx_setup_site() {
	if (!function_exists('wp_insert_post')) {
		return;
	}

	foodrx_register_categories();

	$page_ids = array();

	foreach (foodrx_get_page_definitions() as $definition) {
		$page_id = foodrx_upsert_page($definition);

		if ($page_id > 0) {
			$page_ids[$definition['slug']] = $page_id;
		}
	}

	if (empty($page_ids['home'])) {
		return;
	}

	update_option('show_on_front', 'page');
	update_option('page_on_front', $page_ids['home']);

	if (!empty($page_ids['nutrition-hub'])) {
		update_option('page_for_posts', $page_ids['nutrition-hub']);
	}

	if (!empty($page_ids['privacy-policy'])) {
		update_option('wp_page_for_privacy_policy', $page_ids['privacy-policy']);
	}

	$primary_menu_id = foodrx_create_menu('Food Rx Primary', array(
		'Home' => $page_ids['home'],
		'Services' => $page_ids['services'] ?? 0,
		'Nutrition Hub' => $page_ids['nutrition-hub'] ?? 0,
		'FAQ' => $page_ids['faq'] ?? 0,
		'Contact' => $page_ids['contact'] ?? 0,
	));

	$footer_menu_id = foodrx_create_menu('Food Rx Footer', array(
		'Terms & Conditions' => $page_ids['terms-and-conditions'] ?? 0,
		'Privacy Policy' => $page_ids['privacy-policy'] ?? 0,
	));

	$locations = get_theme_mod('nav_menu_locations', array());

	if ($primary_menu_id > 0) {
		$locations['primary'] = $primary_menu_id;
	}

	if ($footer_menu_id > 0) {
		$locations['footer'] = $footer_menu_id;
	}

	set_theme_mod('nav_menu_locations', $locations);

	update_option('foodrx_site_setup_version', 2);
}

/**
 * Run setup automatically until the homepage uses the Food Rx template.
 */
function foodrx_maybe_setup_site() {
	if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'foodrx-setup') {
		return;
	}

	if (foodrx_is_site_configured()) {
		return;
	}

	foodrx_setup_site();
}

add_action('init', 'foodrx_maybe_setup_site', 20);

/**
 * Tools → Food Rx Setup (manual re-run).
 */
function foodrx_register_setup_admin_page() {
	add_management_page(
		'Food Rx Setup',
		'Food Rx Setup',
		'manage_options',
		'foodrx-setup',
		'foodrx_render_setup_admin_page'
	);
}

add_action('admin_menu', 'foodrx_register_setup_admin_page');

/**
 * Admin page callback.
 */
function foodrx_render_setup_admin_page() {
	if (!current_user_can('manage_options')) {
		return;
	}

	if (isset($_POST['foodrx_run_setup']) && check_admin_referer('foodrx_run_setup')) {
		foodrx_setup_site();
		echo '<div class="notice notice-success"><p>Food Rx pages, homepage, and menus were configured.</p></div>';
	}

	$configured = foodrx_is_site_configured();
	$front_id = (int) get_option('page_on_front');
	$front_template = $front_id ? get_page_template_slug($front_id) : '';

	echo '<div class="wrap">';
	echo '<h1>Food Rx Setup</h1>';
	echo '<p>Status: ' . ($configured ? '<strong>Configured</strong>' : '<strong>Not configured</strong>') . '</p>';

	if ($front_id) {
		echo '<p>Front page ID: ' . esc_html((string) $front_id) . ' · Template: <code>' . esc_html($front_template ?: '(default)') . '</code></p>';
	}

	echo '<form method="post">';
	wp_nonce_field('foodrx_run_setup');
	echo '<p><input type="submit" name="foodrx_run_setup" class="button button-primary" value="Run Food Rx Setup Now"></p>';
	echo '</form>';
	echo '</div>';
}
