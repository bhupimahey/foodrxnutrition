<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.0.0
 * 
 * Events Schedule Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts for Events Schedule Plugin */
healthy_living_locate_template('cmsmasters-events-schedule/function/theme-colors.php', true);

healthy_living_locate_template('cmsmasters-events-schedule/function/theme-fonts.php', true);



/* Register CSS Styles and Scripts for Events Schedule Plugin */
function healthy_living_events_schedule_register_styles_scripts() {
	wp_enqueue_script('theme-cmsmasters-events-schedule-script', get_template_directory_uri() . '/cmsmasters-events-schedule/js/jquery.cmsmasters-events-schedule-script.js', array('jquery'), '1.0.0', true);
	
	wp_enqueue_style('theme-cmsmasters-events-schedule-style', get_template_directory_uri() . '/cmsmasters-events-schedule/css/cmsmasters-events-schedule-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('theme-cmsmasters-events-schedule-adaptive', get_template_directory_uri() . '/cmsmasters-events-schedule/css/cmsmasters-events-schedule-adaptive.css', array(), '1.0.0', 'screen');
	
	if (is_rtl()) {
		wp_enqueue_style('theme-cmsmasters-events-schedule-rtl', get_template_directory_uri() . '/cmsmasters-events-schedule/css/cmsmasters-events-schedule-rtl.css', array(), '1.0.0', 'screen');
	}
}

add_action('wp_enqueue_scripts', 'healthy_living_events_schedule_register_styles_scripts');



/* Developer Mode for Events Schedule Plugin */
function healthy_living_events_schedule_developer_mode() {
	wp_dequeue_style('theme-cmsmasters-events-schedule-style');
	
	wp_dequeue_style('theme-cmsmasters-events-schedule-adaptive');
	
	echo '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/cmsmasters-events-schedule/css/less/cmsmasters-events-schedule-style.less" type="text/css" media="screen" />';
	
	echo '<link rel="stylesheet/less" href="' . get_template_directory_uri() . '/cmsmasters-events-schedule/css/less/cmsmasters-events-schedule-adaptive.less" type="text/css" media="screen" />';
}

