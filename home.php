<?php
/**
 * Blog posts index.
 *
 * When Nutrition Hub is set as Settings → Reading → Posts page, use the custom
 * Nutrilon-style layout instead of the default archive template.
 *
 * @package Healthy Living
 */

if (function_exists('foodrx_is_nutrition_hub_posts_page_view') && foodrx_is_nutrition_hub_posts_page_view()) {
	require get_template_directory() . '/page-foodrx-nutrition-hub.php';
	return;
}

require get_template_directory() . '/index.php';
