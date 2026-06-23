<?php
/**
 * Template Name: Food Rx — Legal Page
 *
 * Use for Terms & Conditions or Privacy Policy pages.
 * Set the page slug to "terms-and-conditions" or "privacy-policy".
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();
$legal = foodrx_get_legal_content();
$slug = get_post_field('post_name', get_the_ID());
$is_privacy = ($slug === 'privacy-policy');
$title = $is_privacy ? 'Privacy Policy' : 'Terms & Conditions';
$body = $is_privacy ? $legal['privacy'] : $legal['terms'];

foodrx_open_content($cmsmasters_layout);

foodrx_render_hero('Legal', $title, 'Food Rx Nutrition Consulting Services');

foodrx_section_open($title);
echo '<div class="foodrx-prose">' . wpautop(esc_html($body)) . '</div>';
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
