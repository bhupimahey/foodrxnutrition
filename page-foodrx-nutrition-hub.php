<?php
/**
 * Template Name: Food Rx — Nutrition Hub
 *
 * Matches the Healthy Living demo Nutrilon blog page layout:
 * heading banner, split hero row, standard blog feed with right sidebar.
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout, 'foodrx-page foodrx-page--nutrition-hub');

foodrx_breakout_open('foodrx-breakout--hub-hero');
foodrx_render_nutrition_hub_hero();
foodrx_breakout_close();

echo '<div id="foodrx-blog-posts" class="foodrx-hub-blog">' . "\n";
foodrx_render_nutrition_hub_blog();
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
