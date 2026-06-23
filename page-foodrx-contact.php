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

foodrx_render_hero(
	'Contact Us',
	'Start Your Nutrition Journey',
	'Reach out to book a free discovery call or ask a question. We look forward to supporting your health journey.'
);

echo '<div class="foodrx-contact-grid">' . "\n";
echo '<div class="foodrx-contact-info">' . "\n";
echo '<h3>Food Rx Nutrition Consulting Services</h3>' . "\n";
echo '<p><strong>Location:</strong> ' . esc_html($site['location']) . '</p>' . "\n";

if (!empty($site['contact_email'])) {
	echo '<p><strong>Email:</strong> <a href="mailto:' . esc_attr($site['contact_email']) . '">' . esc_html($site['contact_email']) . '</a></p>' . "\n";
}

echo '<p>Serving clients virtually across Canada.</p>' . "\n";
echo '</div>' . "\n";
echo '<div class="foodrx-contact-form">' . "\n";
foodrx_render_contact_form();
echo '</div>' . "\n";
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
