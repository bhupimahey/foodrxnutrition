<?php
/**
 * Template Name: Food Rx — FAQ
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_section_open('Frequently Asked Questions', 'Clear answers to help you feel confident before booking.', 'Good to Know');
foodrx_render_faq(foodrx_get_faq_items());
foodrx_section_close();

foodrx_breakout_open('foodrx-breakout--info-band');
foodrx_render_info_band(
	'Still Have Questions?',
	'We are happy to help you choose the right next step for your health journey.',
	home_url('/contact/'),
	'Contact Us'
);
foodrx_breakout_close();

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
