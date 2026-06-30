<?php
/**
 * Template Name: Food Rx — Nutrition Hub
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_content($cmsmasters_layout);

foodrx_section_open('Latest Articles', 'Browse nutrition blog posts, tips, and practical guidance.', 'Be First to Read');
foodrx_render_blog_posts('');
foodrx_section_close();

foodrx_section_open('Recipes', 'Simple, nourishing ideas you can use at home.', 'Healthy Kitchen');
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
