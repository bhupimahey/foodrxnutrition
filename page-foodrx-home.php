<?php
/**
 * Template Name: Food Rx — Home
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();
$site = foodrx_get_site_content();
$contact_url = home_url('/contact/');

foodrx_open_content($cmsmasters_layout);

foodrx_render_hero(
	$site['brand'],
	$site['tagline_primary'],
	$site['tagline_secondary'] . ' · ' . $site['location'],
	$contact_url,
	'Book a Free Discovery Call'
);

foodrx_section_open('Vision & Mission');
foodrx_render_cards(foodrx_get_home_sections());
foodrx_section_close();

foodrx_section_open('Core Values');
foodrx_render_cards(foodrx_get_core_values());
foodrx_section_close();

foodrx_section_open('About Mariam', 'Your partner in nutrition and long-term wellness.');
echo '<div class="foodrx-prose">' . wpautop(esc_html(foodrx_get_about_text())) . '</div>';
foodrx_section_close();

foodrx_section_open('My Approach');
echo '<div class="foodrx-prose">' . wpautop(esc_html(foodrx_get_approach_text())) . '</div>';
foodrx_section_close();

foodrx_section_open('Areas of Expertise', 'I provide nutrition counselling and education to clients with:');
foodrx_render_list(foodrx_get_specialties());
foodrx_section_close();

foodrx_section_open('Favourite Quotes');
foodrx_render_quotes(foodrx_get_favourite_quotes());
echo '<div class="foodrx-prose">' . wpautop(esc_html(foodrx_get_about_closing_text())) . '</div>';
foodrx_section_close();

foodrx_section_open('Your Nutrition Journey', foodrx_get_journey_intro());
foodrx_render_steps(foodrx_get_journey_steps());
echo '<p class="foodrx-hero__cta"><a class="foodrx-button" href="' . esc_url(home_url('/services/')) . '">View Services &amp; Pricing</a></p>';
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
