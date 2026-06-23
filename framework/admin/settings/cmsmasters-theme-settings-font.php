<?php 
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.2.3
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function healthy_living_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'healthy-living');
	$tabs['link'] = esc_attr__('Links', 'healthy-living');
	$tabs['nav'] = esc_attr__('Navigation', 'healthy-living');
	$tabs['heading'] = esc_attr__('Heading', 'healthy-living');
	$tabs['other'] = esc_attr__('Other', 'healthy-living');
	$tabs['google'] = esc_attr__('Google Fonts', 'healthy-living');
	
	return $tabs;
}


function healthy_living_options_font_sections() {
	$tab = healthy_living_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'healthy-living');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'healthy-living');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'healthy-living');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'healthy-living');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'healthy-living');
		
		break;
	case 'google':
		$sections = array();
		
		$sections['google_section'] = esc_html__('Serving Google Fonts from CDN', 'healthy-living');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function healthy_living_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = healthy_living_get_the_tab();
	}
	
	
	$cmsmasters_option = healthy_living_get_global_options();
	
	
	$options = array();
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'healthy-living' . '_link_font', 
			'title' => esc_html__('Links Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'15', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'healthy-living' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'none', 
			'choices' => healthy_living_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'healthy-living' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'healthy-living' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Kaushan+Script', 
				'font_size' => 			'56', 
				'line_height' => 		'66', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'30', 
				'line_height' => 		'38', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'22', 
				'line_height' => 		'30', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'20', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'healthy-living' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'healthy-living' . '_button_font', 
			'title' => esc_html__('Button Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Cabin:400,400italic,500,500italic,600,600italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'42', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'healthy-living' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'healthy-living' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'15', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'healthy-living' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'healthy-living'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic', 
				'font_size' => 			'18', 
				'line_height' => 		'38', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'google':
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'healthy-living' . '_google_web_fonts', 
			'title' => esc_html__('Google Fonts', 'healthy-living'), 
			'desc' => '', 
			'type' => 'google_web_fonts', 
			'std' => cmsmasters_google_fonts_list()
		);
		
		$options[] = array( 
			'section' => 'google_section', 
			'id' => 'healthy-living' . '_google_web_fonts_subset', 
			'title' => esc_html__('Google Fonts Subset', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select_multiple', 
			'std' => '', 
			'choices' => array( 
				esc_html__('Latin Extended', 'healthy-living') . '|' . 'latin-ext', 
				esc_html__('Arabic', 'healthy-living') . '|' . 'arabic', 
				esc_html__('Cyrillic', 'healthy-living') . '|' . 'cyrillic', 
				esc_html__('Cyrillic Extended', 'healthy-living') . '|' . 'cyrillic-ext', 
				esc_html__('Greek', 'healthy-living') . '|' . 'greek', 
				esc_html__('Greek Extended', 'healthy-living') . '|' . 'greek-ext', 
				esc_html__('Vietnamese', 'healthy-living') . '|' . 'vietnamese', 
				esc_html__('Japanese', 'healthy-living') . '|' . 'japanese', 
				esc_html__('Korean', 'healthy-living') . '|' . 'korean', 
				esc_html__('Thai', 'healthy-living') . '|' . 'thai', 
				esc_html__('Bengali', 'healthy-living') . '|' . 'bengali', 
				esc_html__('Devanagari', 'healthy-living') . '|' . 'devanagari', 
				esc_html__('Gujarati', 'healthy-living') . '|' . 'gujarati', 
				esc_html__('Gurmukhi', 'healthy-living') . '|' . 'gurmukhi', 
				esc_html__('Hebrew', 'healthy-living') . '|' . 'hebrew', 
				esc_html__('Kannada', 'healthy-living') . '|' . 'kannada', 
				esc_html__('Khmer', 'healthy-living') . '|' . 'khmer', 
				esc_html__('Malayalam', 'healthy-living') . '|' . 'malayalam', 
				esc_html__('Myanmar', 'healthy-living') . '|' . 'myanmar', 
				esc_html__('Oriya', 'healthy-living') . '|' . 'oriya', 
				esc_html__('Sinhala', 'healthy-living') . '|' . 'sinhala', 
				esc_html__('Tamil', 'healthy-living') . '|' . 'tamil', 
				esc_html__('Telugu', 'healthy-living') . '|' . 'telugu' 
			) 
		);
		
		break;
	}
	
	return $options;	
}

