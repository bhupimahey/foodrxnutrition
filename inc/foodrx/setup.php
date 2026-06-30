<?php
/**
 * Food Rx Nutrition — menu setup only (does not change theme layout).
 *
 * @package Healthy Living
 */

if (!defined('ABSPATH')) {
	exit;
}

define('FOODRX_MENU_SETUP_VERSION', 4);
define('FOODRX_PAGE_META_VERSION', 6);

/**
 * Pages linked from the primary menu (Home uses the existing front page).
 *
 * @return array<int, array{title: string, slug: string, template: string}>
 */
function foodrx_get_menu_page_definitions() {
	return array(
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
	);
}

/**
 * @return bool
 */
function foodrx_is_primary_menu_configured() {
	return (int) get_option('foodrx_menu_setup_version', 0) >= FOODRX_MENU_SETUP_VERSION;
}

/**
 * Apply theme headline banner background image for inner pages.
 *
 * @param int    $page_id  Page ID.
 * @param string $page_key Background key from foodrx_get_page_bg_definitions().
 */
/**
 * Heading/banner structure for inner pages (does not touch background image).
 *
 * @param int $page_id Page ID.
 */
function foodrx_apply_banner_page_structure_meta($page_id) {
	update_post_meta($page_id, 'cmsmasters_header_overlaps', 'true');
	update_post_meta($page_id, 'cmsmasters_heading', 'default');
	update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'false');
	update_post_meta($page_id, 'cmsmasters_heading_alignment', 'center');
	update_post_meta($page_id, 'cmsmasters_heading_scheme', 'default');
	update_post_meta($page_id, 'cmsmasters_breadcrumbs', 'true');

	if (get_post_meta($page_id, 'cmsmasters_heading_height', true) === '') {
		update_post_meta($page_id, 'cmsmasters_heading_height', '360');
	}

	if (get_post_meta($page_id, 'cmsmasters_heading_bg_color', true) === '') {
		update_post_meta($page_id, 'cmsmasters_heading_bg_color', 'rgba(37,37,37,0.55)');
	}
}

function foodrx_apply_heading_banner_meta($page_id, $page_key) {
	foodrx_apply_banner_page_structure_meta($page_id);

	if (foodrx_page_has_custom_heading_bg($page_id)) {
		return;
	}

	$bg_url = foodrx_get_page_bg_url($page_key);

	update_post_meta($page_id, 'cmsmasters_heading_bg_img_enable', 'true');
	update_post_meta($page_id, 'cmsmasters_heading_bg_img', foodrx_format_heading_bg_meta($bg_url));
	update_post_meta($page_id, 'cmsmasters_heading_bg_rep', 'no-repeat');
	update_post_meta($page_id, 'cmsmasters_heading_bg_att', 'scroll');
	update_post_meta($page_id, 'cmsmasters_heading_bg_size', 'cover');
}

/**
 * Sync layout/header structure on each request without overwriting admin banner images.
 *
 * @param int    $page_id Page ID.
 * @param string $slug    Page slug.
 */
function foodrx_sync_foodrx_page_layout_meta($page_id, $slug = '') {
	if ($slug === '') {
		$page = get_post($page_id);
		$slug = ($page instanceof WP_Post) ? $page->post_name : '';
	}

	update_post_meta($page_id, 'cmsmasters_bottom_sidebar', 'false');

	switch ($slug) {
		case 'contact':
			update_post_meta($page_id, 'cmsmasters_layout', 'fullwidth');
			update_post_meta($page_id, 'cmsmasters_heading', 'disabled');
			update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'true');
			update_post_meta($page_id, 'cmsmasters_header_overlaps', 'true');
			update_post_meta($page_id, 'cmsmasters_content_under_header', 'false');
			break;

		case 'nutrition-hub':
			update_post_meta($page_id, 'cmsmasters_layout', 'r_sidebar');
			foodrx_apply_banner_page_structure_meta($page_id);
			break;

		case 'faq':
		case 'services':
			update_post_meta($page_id, 'cmsmasters_layout', 'fullwidth');
			foodrx_apply_banner_page_structure_meta($page_id);
			break;
	}
}

/**
 * @param int    $page_id Page ID.
 * @param string $slug    Page slug.
 */
function foodrx_apply_foodrx_page_meta($page_id, $slug = '') {
	if ($slug === '') {
		$page = get_post($page_id);
		$slug = ($page instanceof WP_Post) ? $page->post_name : '';
	}

	update_post_meta($page_id, 'cmsmasters_bottom_sidebar', 'false');
	update_post_meta($page_id, 'cmsmasters_layout', 'fullwidth');
	update_post_meta($page_id, 'cmsmasters_header_overlaps', 'false');

	switch ($slug) {
		case 'contact':
			update_post_meta($page_id, 'cmsmasters_heading', 'disabled');
			update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'true');
			update_post_meta($page_id, 'cmsmasters_header_overlaps', 'true');
			update_post_meta($page_id, 'cmsmasters_content_under_header', 'false');
			break;

		case 'nutrition-hub':
			update_post_meta($page_id, 'cmsmasters_layout', 'r_sidebar');
			foodrx_apply_heading_banner_meta($page_id, 'nutrition-hub');
			update_post_meta($page_id, 'cmsmasters_heading_bg_color', 'rgba(37,37,37,0)');
			break;

		case 'faq':
			foodrx_apply_heading_banner_meta($page_id, 'faq');
			break;

		case 'services':
			foodrx_apply_heading_banner_meta($page_id, 'services');
			break;

		default:
			update_post_meta($page_id, 'cmsmasters_heading', 'default');
			update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'false');
			break;
	}
}

/**
 * @param int $page_id Homepage page ID.
 */
function foodrx_apply_demo_homepage_meta($page_id) {
	update_post_meta($page_id, 'cmsmasters_layout', 'fullwidth');
	update_post_meta($page_id, 'cmsmasters_heading', 'disabled');
	update_post_meta($page_id, 'cmsmasters_heading_block_disabled', 'true');
	update_post_meta($page_id, 'cmsmasters_header_overlaps', 'true');
	update_post_meta($page_id, 'cmsmasters_composer_show', 'true');
	update_post_meta($page_id, 'cmsmasters_bottom_sidebar', 'false');
}

/**
 * Create a Food Rx page only when it does not already exist.
 *
 * @param array{title: string, slug: string, template: string} $definition Page definition.
 * @return int Page ID or 0.
 */
function foodrx_ensure_page($definition) {
	$existing = get_page_by_path($definition['slug'], OBJECT, 'page');

	if ($existing instanceof WP_Post) {
		$page_id = (int) $existing->ID;

		if (get_page_template_slug($page_id) === $definition['template']) {
			foodrx_apply_foodrx_page_meta($page_id, $definition['slug']);
		}

		return $page_id;
	}

	$page_id = (int) wp_insert_post(array(
		'post_title' => $definition['title'],
		'post_name' => $definition['slug'],
		'post_type' => 'page',
		'post_status' => 'publish',
		'post_content' => '',
	));

	if ($page_id <= 0) {
		return 0;
	}

	update_post_meta($page_id, '_wp_page_template', $definition['template']);
	foodrx_apply_foodrx_page_meta($page_id, $definition['slug']);

	return $page_id;
}

/**
 * @return int Menu term ID.
 */
function foodrx_get_primary_menu_id() {
	$locations = get_theme_mod('nav_menu_locations', array());

	if (!empty($locations['primary'])) {
		return (int) $locations['primary'];
	}

	foreach (array('Primary Navigation', 'Food Rx Primary') as $menu_name) {
		$menu = wp_get_nav_menu_object($menu_name);

		if ($menu) {
			return (int) $menu->term_id;
		}
	}

	return (int) wp_create_nav_menu('Primary Navigation');
}

/**
 * @param int   $menu_id Menu term ID.
 * @param array<int, array{title: string, url?: string, page_id?: int}> $items Menu items.
 */
function foodrx_replace_menu_items($menu_id, $items) {
	$existing_items = wp_get_nav_menu_items($menu_id);

	if ($existing_items) {
		foreach ($existing_items as $item) {
			wp_delete_post((int) $item->ID, true);
		}
	}

	$position = 1;

	foreach ($items as $item) {
		if (!empty($item['page_id'])) {
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => $item['title'],
				'menu-item-object' => 'page',
				'menu-item-object-id' => (int) $item['page_id'],
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish',
				'menu-item-position' => $position,
			));
		} elseif (!empty($item['url'])) {
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => $item['title'],
				'menu-item-url' => $item['url'],
				'menu-item-type' => 'custom',
				'menu-item-status' => 'publish',
				'menu-item-position' => $position,
			));
		}

		$position++;
	}
}

/**
 * Update the primary navigation menu only.
 */
function foodrx_setup_primary_menu() {
	if (!function_exists('wp_insert_post')) {
		return;
	}

	$page_ids = array();

	foreach (foodrx_get_menu_page_definitions() as $definition) {
		$page_id = foodrx_ensure_page($definition);

		if ($page_id > 0) {
			$page_ids[$definition['slug']] = $page_id;
		}
	}

	$menu_id = foodrx_get_primary_menu_id();

	foodrx_replace_menu_items($menu_id, array(
		array(
			'title' => 'HOME',
			'url' => home_url('/'),
		),
		array(
			'title' => 'SERVICES',
			'page_id' => $page_ids['services'] ?? 0,
		),
		array(
			'title' => 'NUTRITION HUB',
			'page_id' => $page_ids['nutrition-hub'] ?? 0,
		),
		array(
			'title' => 'FAQ',
			'page_id' => $page_ids['faq'] ?? 0,
		),
		array(
			'title' => 'CONTACT',
			'page_id' => $page_ids['contact'] ?? 0,
		),
	));

	$locations = get_theme_mod('nav_menu_locations', array());
	$locations['primary'] = $menu_id;
	set_theme_mod('nav_menu_locations', $locations);

	update_option('foodrx_menu_setup_version', FOODRX_MENU_SETUP_VERSION);
}

/**
 * Load the demo homepage builder content shipped with the theme.
 *
 * @return string
 */
function foodrx_load_demo_home_content_from_xml() {
	$path = get_template_directory() . '/framework/admin/inc/demo-content/main/content.xml';

	if (!is_readable($path)) {
		return '';
	}

	$xml = file_get_contents($path);

	if ($xml === false) {
		return '';
	}

	if (preg_match(
		'#<item>\s*<title><!\[CDATA\[Home\]\]></title>\s*<link>https://healthy-living\.cmsmasters\.studio/demo/</link>.*?<content:encoded><!\[CDATA\[(.*?)\]\]></content:encoded>#s',
		$xml,
		$matches
	)) {
		return $matches[1];
	}

	return '';
}

/**
 * Restore the original CMSMasters demo homepage layout/content.
 *
 * @return bool
 */
function foodrx_restore_demo_homepage() {
	$content = foodrx_load_demo_home_content_from_xml();

	if ($content === '') {
		return false;
	}

	$home = get_page_by_path('home', OBJECT, 'page');

	if (!$home instanceof WP_Post) {
		$home = get_page_by_title('Home', OBJECT, 'page');
	}

	if (!$home instanceof WP_Post) {
		return false;
	}

	wp_update_post(array(
		'ID' => $home->ID,
		'post_content' => $content,
		'post_status' => 'publish',
	));

	update_post_meta($home->ID, '_wp_page_template', 'default');
	foodrx_apply_demo_homepage_meta((int) $home->ID);

	return true;
}

/**
 * @return int Homepage page ID or 0.
 */
function foodrx_get_homepage_id() {
	$front_id = (int) get_option('page_on_front');

	if ($front_id > 0) {
		return $front_id;
	}

	$home = get_page_by_path('home', OBJECT, 'page');

	if ($home instanceof WP_Post) {
		return (int) $home->ID;
	}

	$home = get_page_by_title('Home', OBJECT, 'page');

	return ($home instanceof WP_Post) ? (int) $home->ID : 0;
}

/**
 * Ensure homepage uses demo overlap settings and inner pages use standard header layout.
 */
function foodrx_apply_site_page_meta() {
	$home_id = foodrx_get_homepage_id();

	if ($home_id > 0) {
		foodrx_apply_demo_homepage_meta($home_id);
	}

	foreach (foodrx_get_menu_page_definitions() as $definition) {
		$page = get_page_by_path($definition['slug'], OBJECT, 'page');

		if ($page instanceof WP_Post && get_page_template_slug($page->ID) === $definition['template']) {
			foodrx_apply_foodrx_page_meta((int) $page->ID, $definition['slug']);
		}
	}
}

/**
 * @return bool
 */
function foodrx_homepage_needs_restore() {
	$candidates = array();

	$front_id = (int) get_option('page_on_front');

	if ($front_id > 0) {
		$candidates[] = $front_id;
	}

	$home = get_page_by_path('home', OBJECT, 'page');

	if ($home instanceof WP_Post) {
		$candidates[] = (int) $home->ID;
	}

	foreach (array_unique($candidates) as $page_id) {
		if (get_page_template_slug($page_id) === 'page-foodrx-home.php') {
			return true;
		}
	}

	return false;
}

/**
 * Run menu setup once, and restore the demo homepage if a prior setup changed it.
 */
function foodrx_maybe_run_setup() {
	if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'foodrx-setup') {
		return;
	}

	if (!foodrx_is_primary_menu_configured()) {
		foodrx_setup_primary_menu();
		foodrx_apply_site_page_meta();
	}

	if (foodrx_homepage_needs_restore()) {
		foodrx_restore_demo_homepage();
	}
}

add_action('init', 'foodrx_maybe_run_setup', 20);

/**
 * Re-apply inner page header settings when Food Rx page meta changes.
 */
function foodrx_maybe_apply_page_meta() {
	if ((int) get_option('foodrx_page_meta_version', 0) >= FOODRX_PAGE_META_VERSION) {
		return;
	}

	foodrx_apply_site_page_meta();
	update_option('foodrx_page_meta_version', FOODRX_PAGE_META_VERSION);
}

add_action('init', 'foodrx_maybe_apply_page_meta', 21);

/**
 * Tools → Food Rx Setup.
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

	if (isset($_POST['foodrx_run_menu_setup']) && check_admin_referer('foodrx_run_menu_setup')) {
		foodrx_setup_primary_menu();
		foodrx_apply_site_page_meta();
		echo '<div class="notice notice-success"><p>Primary menu links and page banner settings were updated.</p></div>';
	}

	if (isset($_POST['foodrx_restore_homepage']) && check_admin_referer('foodrx_restore_homepage')) {
		if (foodrx_restore_demo_homepage()) {
			foodrx_apply_site_page_meta();
			echo '<div class="notice notice-success"><p>Demo homepage layout was restored.</p></div>';
		} else {
			echo '<div class="notice notice-error"><p>Could not restore the demo homepage. Check that a page titled Home exists.</p></div>';
		}
	}

	$front_id = (int) get_option('page_on_front');
	$front_template = $front_id ? get_page_template_slug($front_id) : '';

	echo '<div class="wrap">';
	echo '<h1>Food Rx Setup</h1>';
	echo '<p>This tool updates navigation links only. It does not replace the CMSMasters homepage layout.</p>';
	echo '<p>Menu status: ' . (foodrx_is_primary_menu_configured() ? '<strong>Configured</strong>' : '<strong>Not configured</strong>') . '</p>';

	if ($front_id) {
		echo '<p>Front page template: <code>' . esc_html($front_template ?: 'default') . '</code></p>';
	}

	echo '<form method="post" style="margin-bottom: 16px;">';
	wp_nonce_field('foodrx_run_menu_setup');
	echo '<p><input type="submit" name="foodrx_run_menu_setup" class="button button-primary" value="Update Primary Menu Links"></p>';
	echo '</form>';

	echo '<form method="post">';
	wp_nonce_field('foodrx_restore_homepage');
	echo '<p><input type="submit" name="foodrx_restore_homepage" class="button" value="Restore Demo Homepage Layout"></p>';
	echo '</form>';
	echo '</div>';
}
