<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.3
 * 
 * Content Composer Theme Shortcodes
 * Created by CMSMasters
 * 
 */



/**
 * Instagram Feed
 */
function healthy_living_instagram_feed($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_instagram_feed_atts_filter', array( 
		'id' => 			''
    ) );
	
	
	$shortcode_name = 'instagram-feed';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out .= do_shortcode('[instagram-feed id="' . $id . '"]');
	
	
	return $out;
}



function healthy_living_instagram_feed_shortcodes($shortcodes) {
	$shortcodes[] = 'healthy_living_instagram_feed';
	
	
	return $shortcodes;
}

add_filter('cmsmasters_custom_shortcodes_filter', 'healthy_living_instagram_feed_shortcodes');

