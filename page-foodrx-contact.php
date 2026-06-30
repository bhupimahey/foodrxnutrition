<?php
/**
 * Template Name: Food Rx — Contact
 *
 * Mirrors the CMSMasters Composer pattern used by the Healthy Living demo
 * Contacts page: close the content_wrap opened by header.php so that each
 * section renders as a direct child of .middle_inner (full viewport width),
 * then reopen content_wrap before footer.php closes it.
 *
 * @package Healthy Living
 */

get_header();
// header.php has opened: #middle → .middle_inner → .content_wrap.fullwidth
// Close content_wrap so our sections escape to .middle_inner width:
echo '</div>' . "\n";

foodrx_render_contact_map();
foodrx_render_contact_details(foodrx_get_contact_details());
foodrx_render_subscribe_band();
foodrx_render_demo_contact_form_panel(foodrx_get_page_bg_url('contact-form'));
foodrx_render_process_steps(foodrx_get_contact_steps());

// Reopen content_wrap — footer.php closes content_wrap, middle_inner, #middle.
echo '<div class="content_wrap fullwidth">' . "\n";

get_footer();
