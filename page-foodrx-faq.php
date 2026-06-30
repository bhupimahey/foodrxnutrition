<?php
/**
 * Template Name: Food Rx — FAQ
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_render_hero(
	'FAQ',
	'Everything You Need to Know Before Getting Started',
	'Choosing nutrition care is an investment in your health. Below are answers to common questions about working with Food Rx Nutrition Consulting Services.',
	home_url('/contact/'),
	'Ask a Question',
	'cover'
);

foodrx_section_open('Frequently Asked Questions', 'Clear answers to help you feel confident before booking.', 'Good to Know');
foodrx_render_faq(foodrx_get_faq_items());
foodrx_section_close();

foodrx_render_cta_band(
	'Still have questions?',
	'We are happy to help you choose the right next step for your health journey.',
	home_url('/contact/'),
	'Contact Us'
);

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
