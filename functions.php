<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.2.3
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('healthy_living_system_fonts_list')) {
	function healthy_living_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('healthy_living_get_google_fonts_list')) {
	function healthy_living_get_google_fonts_list() {
		$fonts = array( 
			'Kaushan+Script|Kaushan Script', 
			'Cabin:400,400italic,500,500italic,600,600italic,700,700italic|Cabin', 
			'Playfair+Display:400,400italic,700,700italic,900,900italic|Playfair Display', 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic|Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic|Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic|Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic|Open Sans', 
			'Open+Sans+Condensed:300,300italic,700|Open Sans Condensed', 
			'Droid+Sans:400,700|Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic|Droid Serif', 
			'PT+Sans:400,400italic,700,700italic|PT Sans', 
			'PT+Sans+Caption:400,700|PT Sans Caption', 
			'PT+Sans+Narrow:400,700|PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic|PT Serif', 
			'Ubuntu:400,400italic,700,700italic|Ubuntu', 
			'Ubuntu+Condensed|Ubuntu Condensed', 
			'Headland+One|Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic|Source Sans Pro', 
			'Lato:400,400italic,700,700italic|Lato', 
			'Cuprum:400,400italic,700,700italic|Cuprum', 
			'Oswald:300,400,700|Oswald', 
			'Yanone+Kaffeesatz:300,400,700|Yanone Kaffeesatz', 
			'Lobster|Lobster', 
			'Lobster+Two:400,400italic,700,700italic|Lobster Two', 
			'Questrial|Questrial', 
			'Raleway:300,400,500,600,700|Raleway', 
			'Dosis:300,400,500,700|Dosis', 
			'Cutive+Mono|Cutive Mono', 
			'Quicksand:300,400,700|Quicksand', 
			'Montserrat:400,700|Montserrat', 
			'Cookie|Cookie', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('healthy_living_text_transform_list')) {
	function healthy_living_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'healthy-living'), 
			'uppercase' => esc_html__('uppercase', 'healthy-living'), 
			'lowercase' => esc_html__('lowercase', 'healthy-living'), 
			'capitalize' => esc_html__('capitalize', 'healthy-living'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('healthy_living_text_decoration_list')) {
	function healthy_living_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'healthy-living'), 
			'underline' => esc_html__('underline', 'healthy-living'), 
			'overline' => esc_html__('overline', 'healthy-living'), 
			'line-through' => esc_html__('line-through', 'healthy-living'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('healthy_living_custom_color_schemes_list')) {
	function healthy_living_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'healthy-living'), 
			'second' => esc_html__('Custom 2', 'healthy-living'), 
			'third' => esc_html__('Custom 3', 'healthy-living') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('healthy_living_locate_template')) {
	function healthy_living_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}



// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', true);
} else {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} else {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} else {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} else {
	define('CMSMASTERS_DONATIONS', false);
}

if (function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', false);
} else {
	define('CMSMASTERS_TIMETABLE', false);
}

if (class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', false);
} else {
	define('CMSMASTERS_TC_EVENTS', false);
}

if (class_exists('Cmsmasters_Events_Schedule')) {
	define('CMSMASTERS_EVENTS_SCHEDULE', true);
} else {
	define('CMSMASTERS_EVENTS_SCHEDULE', true);
}


// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// CMSMasters Custom Fonts Compatibility
define('CMSMASTERS_CUSTOM_FONTS', true);

// Theme Colored Categories Constant
define('CMSMASTERS_COLORED_CATEGORIES', true);

// Theme Projects Compatible
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatible
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}



// Theme Image Thumbnails Size
if (!function_exists('healthy_living_get_image_thumbnail_list')) {
	function healthy_living_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		90, 
				'height' => 	90, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'healthy-living') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	370, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'healthy-living') 
			), 
			'cmsmasters-project-thumb' => array( 
				'width' => 		580, 
				'height' => 	400, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'healthy-living') 
			), 
			'cmsmasters-project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'healthy-living') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	500, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'healthy-living') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'healthy-living') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	600, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'healthy-living') 
			), 
			'cmsmasters-project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	650, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'healthy-living') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'healthy-living') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	380, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'healthy-living') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('healthy_living_all_color_schemes_list')) {
	function healthy_living_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'healthy-living'), 
			'header' => 		esc_html__('Header', 'healthy-living'), 
			'navigation' => 	esc_html__('Navigation', 'healthy-living'), 
			'header_top' => 	esc_html__('Header Top', 'healthy-living'), 
			'footer' => 		esc_html__('Footer', 'healthy-living') 
		);
		
		
		$out = array_merge($list, healthy_living_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('healthy_living_color_schemes_defaults')) {
	function healthy_living_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#757679', 
				'link' => 		'#01b4bd', 
				'hover' => 		'#a0a0a0', 
				'heading' => 	'#343841', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#fcfcfc', 
				'border' => 	'#e0e0e0' 
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#ffffff', 
				'mid_link' => 		'#ffffff', 
				'mid_hover' => 		'#ffffff', 
				'mid_bg' => 		'rgba(255,255,255,0)', 
				'mid_bg_scroll' => 	'rgba(52,56,65,0.9)', 
				'mid_border' => 	'rgba(255,255,255,0.1)', 
				'bot_color' => 		'#ffffff', 
				'bot_link' => 		'#ffffff', 
				'bot_hover' => 		'#ffffff', 
				'bot_bg' => 		'rgba(255,255,255,0)', 
				'bot_bg_scroll' => 	'rgba(52,56,65,0.9)', 
				'bot_border' => 	'rgba(255,255,255,0.1)' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#ffffff', 
				'title_link_hover' => 		'#ffffff', 
				'title_link_current' => 	'#ffffff', 
				'title_link_subtitle' => 	'rgba(255,255,255,0.3)', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_text' => 			'#757679', 
				'dropdown_bg' => 			'#343841', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#757679', 
				'dropdown_link_hover' => 	'#ffffff', 
				'dropdown_link_subtitle' => '#757679', 
				'dropdown_link_highlight' => '#01b4bd', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#ffffff', 
				'link' => 					'#ffffff', 
				'hover' => 					'rgba(255,255,255,0.5)', 
				'bg' => 					'rgba(255,255,255,0)', 
				'border' => 				'rgba(255,255,255,0.1)', 
				'title_link' => 			'#ffffff', 
				'title_link_hover' => 		'rgba(255,255,255,0.5)', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#343841', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#757679', 
				'dropdown_link_hover' => 	'#ffffff', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'#58677b', 
				'link' => 		'#76869a', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#2e3e53', 
				'alternate' => 	'rgba(255,255,255,0.05)', 
				'border' => 	'rgba(255,255,255,0.1)' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'rgba(255,255,255,0.5)', 
				'link' => 		'#a7d433', 
				'hover' => 		'#01b4bd', 
				'heading' => 	'#01b4bd', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#ffffff' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#ffffff', 
				'link' => 		'#01b4bd', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'rgba(255,255,255,0)', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#ffffff' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'#878787', 
				'link' => 		'#a7d433', 
				'hover' => 		'#a0a0a0', 
				'heading' => 	'#343841', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#fcfcfc', 
				'border' => 	'#e0e0e0' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');
define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
healthy_living_locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_ADMIN_INC . '/demo-content-importer.php');
}

healthy_living_locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

healthy_living_locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

healthy_living_locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

healthy_living_locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

healthy_living_locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

healthy_living_locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

healthy_living_locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-module-functions.php');
}


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	healthy_living_locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	healthy_living_locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
}


// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS) {
	healthy_living_locate_template('cmsmasters-donations/function/template-functions-donation.php', true);
}

// Woocommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	healthy_living_locate_template('woocommerce/cmsmasters-woo-functions.php', true);
}

// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	healthy_living_locate_template('tribe-events/cmsmasters-events-functions.php', true);
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE) {
	healthy_living_locate_template('cmsmasters-events-schedule/cmsmasters-events-schedule-functions.php', true);
}



// Load Theme Local File
if (!function_exists('healthy_living_load_theme_textdomain')) {
	function healthy_living_load_theme_textdomain() {
		load_theme_textdomain('healthy-living', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'healthy_living_load_theme_textdomain')) {
	add_action('after_setup_theme', 'healthy_living_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('healthy_living_theme_activation')) {
	function healthy_living_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'healthy-living') {
			add_option('cmsmasters_active_theme', 'healthy-living', '', 'yes');
			
			
			healthy_living_add_global_options();
			
			
			healthy_living_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'healthy_living_theme_activation');



// Framework Deactivation
if (!function_exists('healthy_living_theme_deactivation')) {
	function healthy_living_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'healthy_living_theme_deactivation')) {
	add_action('switch_theme', 'healthy_living_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('healthy_living_plugin_activation')) {
	function healthy_living_plugin_activation($plugin, $network_activation) {
		update_option('cmsmasters_plugin_activation', 'true');
		
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'healthy_living_plugin_activation', 10, 2);


if (!function_exists('healthy_living_plugin_activation_regenerate')) {
	function healthy_living_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			healthy_living_regenerate_styles();
			
			healthy_living_add_global_options();
			
			healthy_living_add_global_icons();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'healthy_living_plugin_activation_regenerate');


function healthy_living_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = healthy_living_get_custom_all_meta_fields();
		
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}


	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'healthy_living_run_reinit_import_options', 10, 3);

// Food Rx Nutrition custom pages and content.
require_once get_template_directory() . '/inc/foodrx/bootstrap.php';

