<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.3.2
 * 
 * Admin Panel Scripts & Styles
 * Created by CMSMasters
 * 
 */


function healthy_living_admin_register($hook) {
	$screen = get_current_screen();
	
	
	wp_enqueue_style('wp-color-picker');
	
	wp_enqueue_script('wp-color-picker');

	wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array(
		'clear' => 				esc_attr__('Clear', 'healthy-living'),
		'clearAriaLabel' => 	esc_attr__('Clear color', 'healthy-living'),
		'defaultLabel' => 		esc_attr__('Color value', 'healthy-living'),
		'defaultString' => 		esc_attr__('Default', 'healthy-living'),
		'defaultAriaLabel' => 	esc_attr__('Select default color', 'healthy-living'),
		'pick' => 				esc_attr__('Select Color', 'healthy-living'),
	) ); 
	
	wp_enqueue_script('wp-color-picker-alpha', get_template_directory_uri() . '/framework/admin/inc/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), '3.0.4', true);
	
	
	wp_enqueue_style('admin-icons-font', get_template_directory_uri() . '/framework/admin/inc/css/admin-icons-font.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('cmsmasters-lightbox', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('cmsmasters-lightbox-rtl', get_template_directory_uri() . '/framework/admin/inc/css/jquery.cmsmastersLightbox-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('cmsmasters-uploader-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersUploader.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cmsmasters-uploader-js', 'cmsmasters_admin_uploader', array( 
		'choose' => 				esc_attr__('Choose image', 'healthy-living'), 
		'insert' => 				esc_attr__('Insert image', 'healthy-living'), 
		'remove' => 				esc_attr__('Remove', 'healthy-living'), 
		'edit_gallery' => 			esc_attr__('Edit gallery', 'healthy-living') 
	));
	
	
	wp_enqueue_script('cmsmasters-lightbox-js', get_template_directory_uri() . '/framework/admin/inc/js/jquery.cmsmastersLightbox.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cmsmasters-lightbox-js', 'cmsmasters_admin_lightbox', array( 
		'cancel' => 				esc_attr__('Cancel', 'healthy-living'), 
		'insert' => 				esc_attr__('Insert', 'healthy-living'), 
		'deselect' => 				esc_attr__('Deselect', 'healthy-living'), 
		'choose_icon' => 			esc_attr__('Choose Icon', 'healthy-living'), 
		'find_icons' => 			esc_attr__('Find icons', 'healthy-living'), 
		'min_length' => 			esc_attr__('min 2 symbols', 'healthy-living'), 
		'choose_font' => 			esc_attr__('Choose icons font', 'healthy-living'), 
		'error_on_page' => 			esc_attr__("Error on page!\nReload page and try again.", 'healthy-living') 
	));
	
	
	if ( 
		$hook == 'post.php' || 
		$hook == 'post-new.php' || 
		$hook == 'widgets.php' || 
		$hook == 'nav-menus.php' || 
		str_replace('cmsmasters-settings-element', '', $screen->id) != $screen->id 
	) {
		cmsmasters_composer_icons();
		
		
		wp_enqueue_style('theme-icons', get_template_directory_uri() . '/css/fontello.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_style('theme-icons-custom', get_template_directory_uri() . '/css/fontello-custom.css', array(), '1.0.0', 'screen');
	}
	
	
	if ( 
		$hook == 'widgets.php' || 
		$hook == 'nav-menus.php' || 
		$screen->id  == 'settings_page_cmsmasters-donations-settings' 
	) {
		wp_enqueue_media();
	}
	
	
	wp_enqueue_style('admin-theme-styles', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('admin-theme-styles-rtl', get_template_directory_uri() . '/framework/admin/inc/css/admin-theme-styles-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	wp_enqueue_script('admin-theme-scripts', get_template_directory_uri() . '/framework/admin/inc/js/admin-theme-scripts.js', array('jquery'), '1.0.0', true);
	
	
	if ($hook == 'widgets.php') {
		wp_enqueue_style('widgets-styles', get_template_directory_uri() . '/framework/admin/inc/css/widgets-styles.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_script('widgets-scripts', get_template_directory_uri() . '/framework/admin/inc/js/widgets-scripts.js', array('jquery'), '1.0.0', true);
	}
}

add_action('admin_enqueue_scripts', 'healthy_living_admin_register');

