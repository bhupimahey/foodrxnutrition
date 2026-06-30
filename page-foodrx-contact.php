<?php
/**
 * Template Name: Food Rx — Contact
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();
$site = foodrx_get_site_content();

foodrx_open_content($cmsmasters_layout);

echo '<div class="foodrx-page--contact">' . "\n";

foodrx_breakout_open('foodrx-breakout--contact-map');
echo '<div class="foodrx-contact-map-wide">' . "\n";
echo '<iframe title="Map to ' . esc_attr($site['location']) . '" src="https://www.google.com/maps?q=' . rawurlencode($site['location']) . '&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' . "\n";
echo '</div>' . "\n";
foodrx_breakout_close();

foodrx_breakout_open('foodrx-breakout--contact-details');
foodrx_render_contact_details(foodrx_get_contact_details());
foodrx_breakout_close();

foodrx_breakout_open('foodrx-breakout--info-band');
foodrx_render_info_band(
	'Book a Free Discovery Call',
	'Take the first step toward personalized nutrition support.',
	home_url('/contact/#foodrx-contact-form'),
	'Get Started'
);
foodrx_breakout_close();

foodrx_breakout_open('foodrx-breakout--contact-form');
foodrx_render_form_panel(
	'Contact With Us',
	'Send Us a Message',
	'Book a free discovery call or ask a question. We look forward to supporting your health journey.',
	foodrx_get_page_bg_url('contact-form')
);
foodrx_breakout_close();

foodrx_breakout_open('foodrx-breakout--process-steps');
foodrx_render_process_steps(foodrx_get_contact_steps());
foodrx_breakout_close();

echo '</div>' . "\n";

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
