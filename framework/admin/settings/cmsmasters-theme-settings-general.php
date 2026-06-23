<?php 
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.1.4
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function healthy_living_options_general_tabs() {
	$cmsmasters_option = healthy_living_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'healthy-living');
	
	if ($cmsmasters_option['healthy-living' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'healthy-living');
	}
	
	$tabs['header'] = esc_attr__('Header', 'healthy-living');
	$tabs['content'] = esc_attr__('Content', 'healthy-living');
	$tabs['footer'] = esc_attr__('Footer', 'healthy-living');
	
	return $tabs;
}


function healthy_living_options_general_sections() {
	$tab = healthy_living_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'healthy-living');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'healthy-living');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'healthy-living');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'healthy-living');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'healthy-living');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function healthy_living_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = healthy_living_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'healthy-living') . '|liquid', 
				esc_html__('Boxed', 'healthy-living') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'healthy-living') . '|image', 
				esc_html__('Text', 'healthy-living') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'healthy-living'), 
			'desc' => esc_html__('Choose your website logo image.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'healthy-living'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : 'Healthy Living'), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'healthy-living'), 
			'desc' => esc_html__('enable', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'healthy-living'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'healthy-living' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'healthy-living'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_col', 
			'title' => esc_html__('Background Color', 'healthy-living'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_img', 
			'title' => esc_html__('Background Image', 'healthy-living'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'healthy-living') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'healthy-living') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'healthy-living') . '|repeat-y', 
				esc_html__('Repeat', 'healthy-living') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'healthy-living') . '|top left', 
				esc_html__('Top Center', 'healthy-living') . '|top center', 
				esc_html__('Top Right', 'healthy-living') . '|top right', 
				esc_html__('Center Left', 'healthy-living') . '|center left', 
				esc_html__('Center Center', 'healthy-living') . '|center center', 
				esc_html__('Center Right', 'healthy-living') . '|center right', 
				esc_html__('Bottom Left', 'healthy-living') . '|bottom left', 
				esc_html__('Bottom Center', 'healthy-living') . '|bottom center', 
				esc_html__('Bottom Right', 'healthy-living') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'healthy-living') . '|scroll', 
				esc_html__('Fixed', 'healthy-living') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'healthy-living' . '_bg_size', 
			'title' => esc_html__('Background Size', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'healthy-living') . '|auto', 
				esc_html__('Cover', 'healthy-living') . '|cover', 
				esc_html__('Contain', 'healthy-living') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'healthy-living'), 
			'desc' => esc_html__('enable', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'healthy-living'), 
			'desc' => esc_html__('enable', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'healthy-living'), 
			'desc' => esc_html__('pixels', 'healthy-living'), 
			'type' => 'number', 
			'std' => '32', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'healthy-living'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'healthy-living') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_line_donations_but', 
			'title' => esc_html__('Top Donations Button', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_line_donations_but_text', 
			'title' => esc_html__('Top Donations Button Text', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'healthy-living'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'healthy-living') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'healthy-living') . '|social', 
				esc_html__('Top Line Navigation (will be shown if set in Appearance - Menus tab)', 'healthy-living') . '|nav' 

			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				esc_html__('Default Style', 'healthy-living') . '|default', 
				esc_html__('Compact Style Left Navigation', 'healthy-living') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'healthy-living') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'healthy-living') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'healthy-living'), 
			'desc' => esc_html__('pixels', 'healthy-living'), 
			'type' => 'number', 
			'std' => '90', 
			'min' => '60' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'healthy-living'), 
			'desc' => esc_html__('pixels', 'healthy-living'), 
			'type' => 'number', 
			'std' => '60', 
			'min' => '50' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_search', 
			'title' => esc_html__('Header Search', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'healthy-living'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'healthy-living') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'healthy-living') . '|social', 
				esc_html__('Header Custom HTML', 'healthy-living') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'healthy-living' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'healthy-living'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'healthy-living') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		if (CMSMASTERS_WOOCOMMERCE) {
			$options[] = array(
				'section' => 'header_section',
				'id' => 'healthy-living' . '_woocommerce_cart_dropdown',
				'title' => esc_html__('Disable WooCommerce Cart', 'healthy-living'),
				'desc' => '',
				'type' => 'checkbox',
				'std' => 0
			);
		}

		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'healthy-living'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'healthy-living'), 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'healthy-living'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Archive Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'healthy-living'), 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'healthy-living'), 
			'desc' => esc_html__('Choosing layout with a sidebar please make sure to add widgets to the Search Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'healthy-living'), 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'healthy-living'), 
			'desc' => esc_html__('Layout for pages of non-listed types. Choosing layout with a sidebar please make sure to add widgets to the Sidebar in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'healthy-living'),
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Left', 'healthy-living') . '|left', 
				esc_html__('Right', 'healthy-living') . '|right', 
				esc_html__('Center', 'healthy-living') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_scheme', 
			'title' => esc_html__('Heading Color Scheme by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'healthy-living'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/heading_bg.jpg', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'healthy-living') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'healthy-living') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'healthy-living') . '|repeat-y', 
				esc_html__('Repeat', 'healthy-living') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'healthy-living') . '|scroll', 
				esc_html__('Fixed', 'healthy-living') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'healthy-living') . '|auto', 
				esc_html__('Cover', 'healthy-living') . '|cover', 
				esc_html__('Contain', 'healthy-living') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'healthy-living'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => 'rgba(37,37,37,0)' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'healthy-living'), 
			'desc' => esc_html__('pixels', 'healthy-living'), 
			'type' => 'number', 
			'std' => '360', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Color Scheme', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'first', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living') . '<br><br>' . esc_html__('Please make sure to add widgets in the Appearance - Widgets tab. The empty sidebar won\'t be displayed.', 'healthy-living'),
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'healthy-living' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_scheme', 
			'title' => esc_html__('Footer Color Scheme', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				esc_html__('Default', 'healthy-living') . '|default', 
				esc_html__('Small', 'healthy-living') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'nav', 
			'choices' => array( 
				esc_html__('None', 'healthy-living') . '|none', 
				esc_html__('Footer Navigation (will be shown if set in Appearance - Menus tab)', 'healthy-living') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'healthy-living') . '|social', 
				esc_html__('Custom HTML', 'healthy-living') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'healthy-living'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'healthy-living'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_image_enable', 
			'title' => esc_html__('Footer Background Image Visibility by Default', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_image', 
			'title' => esc_html__('Footer Background Image by Default', 'healthy-living'), 
			'desc' => esc_html__('Choose your footer background image by default.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_repeat', 
			'title' => esc_html__('Footer Background Repeat by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'healthy-living') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'healthy-living') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'healthy-living') . '|repeat-y', 
				esc_html__('Repeat', 'healthy-living') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_pos', 
			'title' => esc_html__('Background Position', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'healthy-living') . '|top left', 
				esc_html__('Top Center', 'healthy-living') . '|top center', 
				esc_html__('Top Right', 'healthy-living') . '|top right', 
				esc_html__('Center Left', 'healthy-living') . '|center left', 
				esc_html__('Center Center', 'healthy-living') . '|center center', 
				esc_html__('Center Right', 'healthy-living') . '|center right', 
				esc_html__('Bottom Left', 'healthy-living') . '|bottom left', 
				esc_html__('Bottom Center', 'healthy-living') . '|bottom center', 
				esc_html__('Bottom Right', 'healthy-living') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_attachment', 
			'title' => esc_html__('Footer Background Attachment by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'fixed', 
			'choices' => array( 
				esc_html__('Scroll', 'healthy-living') . '|scroll', 
				esc_html__('Fixed', 'healthy-living') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_bg_size', 
			'title' => esc_html__('Footer Background Size by Default', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'healthy-living') . '|auto', 
				esc_html__('Cover', 'healthy-living') . '|cover', 
				esc_html__('Contain', 'healthy-living') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'healthy-living'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'healthy-living') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'healthy-living' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => 'Healthy Living' . ' &copy; ' . date('Y') . ' / ' . esc_html__('All Rights Reserved', 'healthy-living'), 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

