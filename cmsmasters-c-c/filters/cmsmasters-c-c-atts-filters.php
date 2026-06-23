<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.0.0
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */


/* Register Admin Panel JS Scripts */
function healthy_living_register_admin_js_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			/* Instagram shortcode */
			'instagram_feed_title' =>        		esc_attr__('Instagram Feed', 'healthy-living'), 
			'id_instagram_feed_title' =>      		esc_attr__('User Id', 'healthy-living'), 
			'id_instagram_feed_descr' =>       		esc_attr__('There may be several ids', 'healthy-living'), 
			/* Special Heading shortcode */
			'heading_field_custom_check' => 		esc_attr__('Set Custom Font Size for Small Screens', 'healthy-living'), 
			'heading_field_width_monitor' => 		esc_attr__('Monitor Width', 'healthy-living'), 
			'heading_field_custom_font_size' => 	esc_attr__('Custom Font Size', 'healthy-living'), 
			'heading_field_size_zero_note' => 		esc_attr__('number, in pixels (default value if empty or 0)', 'healthy-living'), 
			'heading_field_custom_line_height' => 	esc_attr__('Custom Line Height', 'healthy-living') 
		));
	}
}

add_action('admin_enqueue_scripts', 'healthy_living_register_admin_js_scripts');


// Special Heading Shortcode Attributes Filter
add_filter('cmsmasters_custom_heading_atts_filter', 'cmsmasters_custom_heading_atts');

function cmsmasters_custom_heading_atts() {
	return array( 
		'type' => 					'h1', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'font_weight' => 			'400', 
		'font_style' => 			'normal', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'custom_check' =>  			'', 
		'width_monitor' =>  		'767', 
		'custom_font_size' => 		'', 
		'custom_line_height' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}

