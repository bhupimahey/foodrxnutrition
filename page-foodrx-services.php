<?php
/**
 * Template Name: Food Rx — Services
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_render_hero(
	'Services',
	'Nutrition Programs & Consulting',
	'Evidence-based, personalized nutrition care — from individual coaching to corporate wellness.',
	home_url('/contact/'),
	'Contact Us'
);

foodrx_section_open('Programs & Pricing');
foodrx_render_services(foodrx_get_services());
foodrx_section_close();

foodrx_section_open('Corporate Wellness Benefits');
foodrx_render_list(array(
	'Greater staff retention',
	'Decreased absentee days',
	'Increased productivity',
	'Improved workplace morale',
	'Increased quality of work',
));
echo '<p class="foodrx-prose">Incorporating workplace wellness is a strategic move that benefits both your employees and your organization. <a href="' . esc_url(home_url('/contact/')) . '">Contact us</a> to discuss a custom session.</p>';
foodrx_section_close();

foodrx_section_open('Cooking Classes & Grocery Tours — Specializations', 'At cooking classes and grocery tours, we specialize in supporting clients with:');
foodrx_render_list(array(
	'General healthy eating',
	'Pre-diabetes and diabetes',
	'Fatty liver disease',
	'Hypertension (high blood pressure)',
	'Hyperlipidemia',
));
echo '<p class="foodrx-prose">These classes and tours are suitable for all ages and levels of nutrition knowledge, making them accessible to everyone looking to improve their diet and health.</p>';
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
