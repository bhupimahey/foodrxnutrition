<?php
/**
 * Template Name: Food Rx — Contact
 *
 * @package Healthy Living
 */

get_header();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

foodrx_open_contact_content();

foodrx_render_contact_map();

foodrx_render_contact_details(foodrx_get_contact_details());

foodrx_render_subscribe_band();

foodrx_render_demo_contact_form_panel(foodrx_get_page_bg_url('contact-form'));

foodrx_render_process_steps(foodrx_get_contact_steps());

foodrx_close_contact_content();

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
