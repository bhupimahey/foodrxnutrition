<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.0.0
 * 
 * Events Schedule Colors Rules
 * Created by CMSMasters
 * 
 */


function healthy_living_events_schedule_colors($custom_css) {
	$cmsmasters_option = healthy_living_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Events Schedule Color Scheme Rules ******************/
	
	/* Start Primary Color */
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall > li a:hover,
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall > li.current_tab a,
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date > li a:hover,
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date > li.current_tab a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_date,
	{$rule}.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_speaker_heading,
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_speaker_heading {
		" . cmsmasters_color_css('color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_time {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['healthy-living' . '_' . $scheme . '_hover']) . ", .7);
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall > li a,
	{$rule}.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_speaker,
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer a,
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_speaker {
		" . cmsmasters_color_css('color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date > li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_events_schedule.cmsmasters_events_schedule_tabs,
	{$rule}.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_cont:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date a {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['healthy-living' . '_' . $scheme . '_bg']) . ", .15);
	}
	/* Finish Main Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_wrap .cmsmasters_event_schedule:after,
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_wrap .cmsmasters_event_schedule .cmsmasters_event_schedule_cont:hover:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['healthy-living' . '_' . $scheme . '_border']) . ", .48);
	}
	
	{$rule}.cmsmasters_events_schedule,
	{$rule}.cmsmasters_events_schedule .cmsmasters_events_schedule_wrap .cmsmasters_event_schedule .cmsmasters_event_schedule_cont:before,
	{$rule}.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['healthy-living' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

	
/***************** Finish {$title} Events Schedule Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('healthy_living_theme_colors_secondary_filter', 'healthy_living_events_schedule_colors');

