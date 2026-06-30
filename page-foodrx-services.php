<?php
/**
 * Template Name: Food Rx — Services
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_breakout_open('foodrx-breakout--tiles');
foodrx_render_featured_tiles(foodrx_get_service_tiles());
foodrx_breakout_close();

foodrx_section_open('Programs & Pricing', 'Choose the program that fits your goals and lifestyle.', 'Our Programs');
foodrx_render_services(foodrx_get_services());
foodrx_section_close();

foodrx_section_open('Corporate Wellness Benefits', 'Why organizations invest in workplace nutrition education.', 'Workplace Wellness');
foodrx_render_icon_boxes(foodrx_get_corporate_benefit_boxes());
echo '<p class="foodrx-prose foodrx-prose--center"><a class="foodrx-button cmsmasters_button" href="' . esc_url(home_url('/contact/')) . '">Book a Workplace Session</a></p>';
foodrx_section_close();

foodrx_section_open('Cooking Classes & Grocery Tours', 'We specialize in supporting clients with:', 'Specializations');
foodrx_render_chips(array(
	'General healthy eating',
	'Pre-diabetes and diabetes',
	'Fatty liver disease',
	'Hypertension (high blood pressure)',
	'Hyperlipidemia',
));
foodrx_section_close();

foodrx_section_open('Your Nutrition Journey', foodrx_get_journey_intro(), 'How It Works');
foodrx_render_steps(foodrx_get_journey_steps());
foodrx_section_close();

foodrx_close_content();

if ($cmsmasters_layout === 'r_sidebar') {
	echo '<div class="sidebar">' . "\n";
	get_sidebar();
	echo '</div>' . "\n";
} elseif ($cmsmasters_layout === 'l_sidebar') {
	echo '<div class="sidebar fl">' . "\n";
	get_sidebar();
	echo '</div>' . "\n";
}

get_footer();
