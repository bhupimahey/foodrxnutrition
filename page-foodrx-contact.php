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

foodrx_breakout_open('foodrx-breakout--contact-map');
echo '<div class="foodrx-contact-map-wide">' . "\n";
echo '<iframe title="Map to ' . esc_attr($site['location']) . '" src="https://www.google.com/maps?q=' . rawurlencode($site['location']) . '&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' . "\n";
echo '</div>' . "\n";
foodrx_breakout_close();

foodrx_breakout_open('foodrx-breakout--contact-details');
foodrx_render_contact_details(foodrx_get_contact_details());
foodrx_breakout_close();

foodrx_section_open('Send a Message', 'Book a free discovery call or ask a question. We will get back to you soon.', 'Get In Touch');
echo '<div id="foodrx-contact-form" class="foodrx-contact-form foodrx-contact-form--full">' . "\n";
foodrx_render_contact_form();
echo '</div>' . "\n";
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
