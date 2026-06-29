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
echo '<aside class="foodrx-contact-sidebar">' . "\n";
echo '<div class="foodrx-contact-info">' . "\n";
echo '<h3>Food Rx Nutrition Consulting Services</h3>' . "\n";
echo '<p class="foodrx-contact-info__lead">Personalized nutrition care for individuals, families, and teams.</p>' . "\n";
echo '<ul class="foodrx-contact-list">' . "\n";
echo '<li><strong>Location:</strong> ' . esc_html($site['location']) . '</li>' . "\n";

if (!empty($site['contact_email'])) {
	echo '<li><strong>Email:</strong> <a href="mailto:' . esc_attr($site['contact_email']) . '">' . esc_html($site['contact_email']) . '</a></li>' . "\n";
}

echo '<li><strong>Service Area:</strong> Virtual care across Canada</li>' . "\n";
echo '</ul>' . "\n";
echo '<p class="foodrx-contact-info__note">Book your free discovery call and get expert guidance tailored to your health goals.</p>' . "\n";
echo '<a class="foodrx-button" href="#foodrx-contact-form">Start With a Message</a>' . "\n";
echo '</div>' . "\n";

echo '<div class="foodrx-contact-map">' . "\n";
echo '<iframe title="Map to London, Ontario, Canada" src="https://www.google.com/maps?q=' . rawurlencode($site['location']) . '&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' . "\n";
echo '</div>' . "\n";
echo '</div>' . "\n";

echo '<div id="foodrx-contact-form" class="foodrx-contact-form">' . "\n";
echo '<h3>Send a Message</h3>' . "\n";
echo '<p class="foodrx-contact-form__intro">Tell us what support you are looking for, and we will get back to you soon.</p>' . "\n";
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
