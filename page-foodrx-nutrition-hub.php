<?php
/**
 * Template Name: Food Rx — Nutrition Hub
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_render_hero(
	'Nutrition Hub',
	'Blog & Recipes',
	'Evidence-based nutrition articles and healthy recipes from Food Rx Nutrition Consulting Services.'
);

foodrx_section_open('Latest Articles', 'Browse nutrition blog posts and recipes.');
foodrx_render_blog_posts('');
foodrx_section_close();

foodrx_section_open('Recipes');
foodrx_render_blog_posts('recipes');
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
