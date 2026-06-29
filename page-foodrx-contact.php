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

echo '<div class="foodrx-contact-map-wide">' . "\n";
echo '<iframe title="Map to Brooklyn, NY 10036, United States" src="https://www.google.com/maps?q=' . rawurlencode('Brooklyn, NY 10036, United States') . '&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' . "\n";
echo '</div>' . "\n";

echo '<div class="foodrx-contact-quickinfo">' . "\n";
echo '<div class="foodrx-contact-quickinfo__item">' . "\n";
echo '<p class="foodrx-contact-quickinfo__value">1-800-123-1234</p>' . "\n";
echo '<p class="foodrx-contact-quickinfo__label">Phone</p>' . "\n";
echo '</div>' . "\n";
echo '<div class="foodrx-contact-quickinfo__item">' . "\n";
echo '<p class="foodrx-contact-quickinfo__value">Brooklyn, NY 10036, United States</p>' . "\n";
echo '<p class="foodrx-contact-quickinfo__label">Address</p>' . "\n";
echo '</div>' . "\n";
echo '<div class="foodrx-contact-quickinfo__item">' . "\n";
echo '<p class="foodrx-contact-quickinfo__value">healthy-life@example.com</p>' . "\n";
echo '<p class="foodrx-contact-quickinfo__label">Email</p>' . "\n";
echo '</div>' . "\n";
echo '</div>' . "\n";

echo '<div id="foodrx-contact-form" class="foodrx-contact-form foodrx-contact-form--full">' . "\n";
echo '<h3>Send a Message</h3>' . "\n";
echo '<p class="foodrx-contact-form__intro">Tell us what support you are looking for, and we will get back to you soon.</p>' . "\n";
foodrx_render_contact_form();
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
