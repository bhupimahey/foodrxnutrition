<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.0.0
 * 
 * Events Schedule Fonts Rules
 * Created by CMSMasters
 * 
 */


function healthy_living_events_schedule_fonts($custom_css) {
	$cmsmasters_option = healthy_living_get_global_options();
	
	
	$custom_css .= "
/***************** Start Events Schedule Font Styles ******************/

	/* Start Content Font */
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_speaker_heading {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_content_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer,
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer a {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_content_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['healthy-living' . '_content_font_line_height'] - 2) . "px;
	}


	/* Start H4 Font */
	.cmsmasters_events_schedule_date_tab.no_halls,
	.cmsmasters_events_schedule.cmsmasters_events_schedule_tabs .cmsmasters_events_schedule_tabs_items .cmsmasters_events_schedule_wrap:not(.have_posts) {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_h4_font_google_font']) . $cmsmasters_option['healthy-living' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['healthy-living' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['healthy-living' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['healthy-living' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['healthy-living' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['healthy-living' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['healthy-living' . '_h4_font_text_decoration'] . ";
		letter-spacing:-0.5px;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_speaker,
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_speaker {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_h5_font_google_font']) . $cmsmasters_option['healthy-living' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['healthy-living' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['healthy-living' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['healthy-living' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['healthy-living' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['healthy-living' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['healthy-living' . '_h5_font_text_decoration'] . ";
		letter-spacing:-0.5px;
	}
	
	.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall a {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_h5_font_google_font']) . $cmsmasters_option['healthy-living' . '_h5_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_line_height'] - 6) . "px;
		font-weight:" . $cmsmasters_option['healthy-living' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['healthy-living' . '_h5_font_font_style'] . ";
		letter-spacing:-0.5px;
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_speaker {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_speaker {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['healthy-living' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer,
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer a {
		font-weight:" . $cmsmasters_option['healthy-living' . '_h5_font_font_weight'] . ";
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_date {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_h6_font_google_font']) . $cmsmasters_option['healthy-living' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['healthy-living' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['healthy-living' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['healthy-living' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['healthy-living' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['healthy-living' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['healthy-living' . '_h6_font_text_decoration'] . ";
		letter-spacing:4px;
	}
	
	.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_date {
		min-height:" . ((int) $cmsmasters_option['healthy-living' . '_h6_font_line_height'] + 3). "px;
	}
	
	.cmsmasters_events_schedule .cmsmasters_event_schedule .cmsmasters_event_schedule_date {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h6_font_font_size'] + 1) . "px;
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_time {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_h6_font_google_font']) . $cmsmasters_option['healthy-living' . '_h6_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h6_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['healthy-living' . '_h6_font_line_height'] - 2) . "px;
		font-style:" . $cmsmasters_option['healthy-living' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['healthy-living' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['healthy-living' . '_h6_font_text_decoration'] . ";
		letter-spacing:4px;
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_time {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_h6_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_events_schedule .cmsmasters_events_schedule_list_hall a {
		text-transform:" . $cmsmasters_option['healthy-living' . '_h6_font_text_transform'] . ";
	}
	
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer,
	.cmsmasters_open_event_schedule .cmsmasters_event_schedule_footer a {
		text-transform:uppercase;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date a {
		font-family:" . healthy_living_get_google_font($cmsmasters_option['healthy-living' . '_button_font_google_font']) . $cmsmasters_option['healthy-living' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['healthy-living' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['healthy-living' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['healthy-living' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['healthy-living' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['healthy-living' . '_button_font_text_transform'] . ";
	}
	
	.cmsmasters_events_schedule .cmsmasters_events_schedule_list_date a {
		font-size:" . ((int) $cmsmasters_option['healthy-living' . '_button_font_font_size'] + 1) . "px;
	}
	
/***************** Finish Events Schedule Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('healthy_living_theme_fonts_filter', 'healthy_living_events_schedule_fonts');

