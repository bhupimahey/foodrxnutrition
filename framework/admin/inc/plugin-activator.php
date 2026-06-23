<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.3.9
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


healthy_living_locate_template('framework/class/class-tgm-plugin-activation.php', true);


if (!function_exists('healthy_living_register_theme_plugins')) {

function healthy_living_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'healthy-living'), 
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '2.5.9', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Custom Fonts', 'healthy-living'), 
			'slug'					=> 'cmsmasters-custom-fonts', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/cmsmasters-custom-fonts.zip', 
			'required'				=> true, 
			'version'				=> '1.0.1', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Events Schedule', 'healthy-living'), 
			'slug'					=> 'cmsmasters-events-schedule', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/cmsmasters-events-schedule.zip', 
			'required'				=> true, 
			'version'				=> '1.0.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Importer', 'healthy-living'), 
			'slug'					=> 'cmsmasters-importer', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-importer.zip', 
			'required'				=> true, 
			'version'				=> '1.0.8', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'healthy-living'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'healthy-living'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '8.1.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'healthy-living'), 
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory_uri() . '/framework/admin/inc/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '6.7.41', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('Envato Market', 'healthy-living'), 
			'slug'					=> 'envato-market', 
			'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'healthy-living'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('GDPR Cookie Consent', 'healthy-living'), 
			'slug'					=> 'cookie-law-info', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WooCommerce', 'healthy-living'), 
			'slug' 					=> 'woocommerce', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('The Events Calendar', 'healthy-living'), 
			'slug' 					=> 'the-events-calendar', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('MailPoet 3', 'healthy-living'), 
			'slug'					=> 'mailpoet', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('Instagram Feed', 'healthy-living'), 
			'slug'					=> 'instagram-feed', 
			'required'				=> false 
 		) 
	);
	
	
	$config = array( 
		'id' => 			'healthy-living', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'healthy-living'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'healthy-living'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'healthy-living') 
		) 
	);
	
	
	tgmpa($plugins, $config);
}

}

add_action('tgmpa_register', 'healthy_living_register_theme_plugins');

