<?php
/**
 * Template Name: Food Rx — Nutrition Hub
 *
 * Mirrors demo Nutrilon blog: heading banner → full-width split hero →
 * standard blog feed + right sidebar.
 *
 * header.php opens: #middle → .middle_inner → .content_wrap.r_sidebar
 * We close content_wrap immediately so the hero renders at middle_inner
 * width (full viewport), then rebuild the r_sidebar layout for the blog.
 * footer.php closes the final content_wrap we reopen before get_footer().
 *
 * @package Healthy Living
 */

get_header();
// Close the content_wrap opened by header.php — renders hero at full width.
echo '</div>' . "\n";

foodrx_render_nutrition_hub_hero();

// Blog + right sidebar inside their own r_sidebar content_wrap.
echo '<div class="content_wrap r_sidebar">' . "\n";

echo '<div class="content entry">' . "\n";
echo '<div id="foodrx-blog-posts" class="foodrx-hub-blog">' . "\n";
foodrx_render_nutrition_hub_blog();
echo '</div>' . "\n";
echo '</div>' . "\n"; // .content.entry

echo '<div class="sidebar">' . "\n";
get_sidebar();
echo '</div>' . "\n";

echo '</div>' . "\n"; // .content_wrap.r_sidebar (blog section)

// Reopen an empty content_wrap for footer.php to close cleanly.
echo '<div class="content_wrap fullwidth">' . "\n";

get_footer();
