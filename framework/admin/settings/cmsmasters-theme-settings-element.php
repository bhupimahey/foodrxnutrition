<?php 
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.2.8
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function healthy_living_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'healthy-living');
	$tabs['icon'] = esc_attr__('Social Icons', 'healthy-living');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'healthy-living');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'healthy-living');
	$tabs['error'] = esc_attr__('404', 'healthy-living');
	$tabs['code'] = esc_attr__('Custom Codes', 'healthy-living');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'healthy-living');
	}
	
	return $tabs;
}


function healthy_living_options_element_sections() {
	$tab = healthy_living_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'healthy-living');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'healthy-living');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'healthy-living');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'healthy-living');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'healthy-living');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'healthy-living');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'healthy-living');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function healthy_living_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = healthy_living_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'healthy-living' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'healthy-living'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'healthy-living' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'healthy-living'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'healthy-living') . '|false||', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'healthy-living') . '|false||', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'healthy-living') . '|false||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'healthy-living') . '|false||', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'healthy-living') . '|false||' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'healthy-living') . '|dark', 
				esc_html__('Light', 'healthy-living') . '|light', 
				esc_html__('Mac', 'healthy-living') . '|mac', 
				esc_html__('Metro Black', 'healthy-living') . '|metro-black', 
				esc_html__('Metro White', 'healthy-living') . '|metro-white', 
				esc_html__('Parade', 'healthy-living') . '|parade', 
				esc_html__('Smooth', 'healthy-living') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'healthy-living'), 
			'desc' => esc_html__('Sets path for switching windows', 'healthy-living'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'healthy-living') . '|vertical', 
				esc_html__('Horizontal', 'healthy-living') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'healthy-living'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'healthy-living'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'healthy-living'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'healthy-living'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'healthy-living'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'healthy-living'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'healthy-living'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'healthy-living'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'healthy-living'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'healthy-living'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'healthy-living'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'healthy-living'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'healthy-living') . '|center', 
				esc_html__('Fit', 'healthy-living') . '|fit', 
				esc_html__('Fill', 'healthy-living') . '|fill', 
				esc_html__('Stretch', 'healthy-living') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets buttons be available or not', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'healthy-living'), 
			'desc' => esc_html__('Enable the arrow buttons', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets the fullscreen button', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'healthy-living'), 
			'desc' => esc_html__('Sets the swipe navigation', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'healthy-living' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'healthy-living'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'healthy-living' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_color', 
			'title' => esc_html__('Text Color', 'healthy-living'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'healthy-living'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#252525' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'healthy-living'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'healthy-living'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_search', 
			'title' => esc_html__('Search Line', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'healthy-living' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'healthy-living' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'healthy-living'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'healthy-living' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'healthy-living'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'healthy-living' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'healthy-living' . '_twitter_access_data', 
			'title' => esc_html__('Twitter Access Data', 'healthy-living'), 
			'desc' => sprintf(
				/* translators: Twitter access data. %s: Link to twitter access data generator */
				esc_html__( 'Generate %s and paste access data to fields.', 'healthy-living' ),
				'<a href="' . esc_url( 'https://api.cmsmasters.net/wp-json/cmsmasters-api/v1/twitter-request-token' ) . '" target="_blank">' .
					esc_html__( 'twitter access data', 'healthy-living' ) .
				'</a>'
			), 
			'type' => 'multi-text', 
			'std' => array(),
			'class' => 'regular-text', 
			'choices' => array( 
				esc_html__('Consumer Key', 'healthy-living') . '|consumer_key', 
				esc_html__('Consumer Secret', 'healthy-living') . '|consumer_secret', 
				esc_html__('Access Token', 'healthy-living') . '|access_token', 
				esc_html__('Access Token Secret', 'healthy-living') . '|access_token_secret' 
			) 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'healthy-living' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'healthy-living' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'healthy-living'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

