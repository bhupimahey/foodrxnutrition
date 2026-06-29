<?php
/**
 * Food Rx Nutrition — rendering helpers.
 *
 * @package Healthy Living
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Open standard page content wrapper (matches theme layout).
 *
 * @param string $layout cmsmasters layout slug.
 */
function foodrx_open_content($layout) {
	echo '<!-- Start Content -->' . "\n";

	if ($layout === 'r_sidebar') {
		echo '<div class="content entry">' . "\n";
	} elseif ($layout === 'l_sidebar') {
		echo '<div class="content entry fr">' . "\n";
	} else {
		echo '<div class="middle_content entry">';
	}

	echo '<div class="foodrx-page">' . "\n";
}

/**
 * Close standard page content wrapper.
 */
function foodrx_close_content() {
	echo '</div><!-- .foodrx-page -->' . "\n";
	echo '</div><!-- .content -->' . "\n";
}

/**
 * @param string $title Section heading.
 * @param string $intro Optional intro paragraph.
 */
function foodrx_section_open($title, $intro = '') {
	echo '<section class="foodrx-section">' . "\n";

	if ($title !== '') {
		echo '<h2 class="foodrx-section__title">' . esc_html($title) . '</h2>' . "\n";
	}

	if ($intro !== '') {
		echo '<p class="foodrx-section__intro">' . esc_html($intro) . '</p>' . "\n";
	}
}

function foodrx_section_close() {
	echo '</section>' . "\n";
}

/**
 * @param string $label Small label above hero title.
 * @param string $title Main hero heading.
 * @param string $subtitle Supporting text.
 * @param string $cta_url Optional CTA link.
 * @param string $cta_label Optional CTA label.
 */
function foodrx_render_hero($label, $title, $subtitle, $cta_url = '', $cta_label = '') {
	echo '<section class="foodrx-hero">' . "\n";
	echo '<p class="foodrx-hero__label">' . esc_html($label) . '</p>' . "\n";
	echo '<h1 class="foodrx-hero__title">' . esc_html($title) . '</h1>' . "\n";
	echo '<p class="foodrx-hero__subtitle">' . esc_html($subtitle) . '</p>' . "\n";

	if ($cta_url && $cta_label) {
		echo '<p class="foodrx-hero__cta"><a class="foodrx-button" href="' . esc_url($cta_url) . '">' . esc_html($cta_label) . '</a></p>' . "\n";
	}

	echo '</section>' . "\n";
}

/**
 * @param array<int, array{title: string, body: string}> $items Card items.
 */
function foodrx_render_cards($items) {
	echo '<div class="foodrx-cards">' . "\n";

	foreach ($items as $item) {
		echo '<article class="foodrx-card">' . "\n";
		echo '<h3 class="foodrx-card__title">' . esc_html($item['title']) . '</h3>' . "\n";
		echo '<div class="foodrx-card__body">' . wpautop(esc_html($item['body'])) . '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, string> $items List items.
 */
function foodrx_render_list($items) {
	echo '<ul class="foodrx-list">' . "\n";

	foreach ($items as $item) {
		echo '<li>' . esc_html($item) . '</li>' . "\n";
	}

	echo '</ul>' . "\n";
}

/**
 * @param array<int, array{step: string, title: string, body: string}> $steps Journey steps.
 */
function foodrx_render_steps($steps) {
	echo '<div class="foodrx-steps">' . "\n";

	foreach ($steps as $step) {
		echo '<article class="foodrx-step">' . "\n";
		echo '<span class="foodrx-step__num">' . esc_html($step['step']) . '</span>' . "\n";
		echo '<h3 class="foodrx-step__title">' . esc_html($step['title']) . '</h3>' . "\n";
		echo '<div class="foodrx-step__body">' . wpautop(esc_html($step['body'])) . '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, array{title: string, price: string, summary: string, details: array<int, string>}> $services Service blocks.
 */
function foodrx_render_services($services) {
	echo '<div class="foodrx-services">' . "\n";

	foreach ($services as $service) {
		echo '<article class="foodrx-service">' . "\n";
		echo '<header class="foodrx-service__header">' . "\n";
		echo '<h3 class="foodrx-service__title">' . esc_html($service['title']) . '</h3>' . "\n";
		echo '<p class="foodrx-service__price">' . esc_html($service['price']) . '</p>' . "\n";
		echo '</header>' . "\n";
		echo '<div class="foodrx-service__summary">' . wpautop(esc_html($service['summary'])) . '</div>' . "\n";

		if (!empty($service['details'])) {
			echo '<ul class="foodrx-service__details">' . "\n";

			foreach ($service['details'] as $detail) {
				echo '<li>' . esc_html($detail) . '</li>' . "\n";
			}

			echo '</ul>' . "\n";
		}

		if (!empty($service['outro'])) {
			echo '<div class="foodrx-service__outro">' . wpautop(esc_html($service['outro'])) . '</div>' . "\n";
		}

		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, array{quote: string, author: string}> $quotes Quote items.
 */
function foodrx_render_quotes($quotes) {
	echo '<div class="foodrx-quotes">' . "\n";

	foreach ($quotes as $item) {
		echo '<blockquote class="foodrx-quote">' . "\n";
		echo '<p class="foodrx-quote__text">&ldquo;' . esc_html($item['quote']) . '&rdquo;</p>' . "\n";
		echo '<cite class="foodrx-quote__author">' . esc_html($item['author']) . '</cite>' . "\n";
		echo '</blockquote>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 *
 * @param array<int, array{question: string, answer: string}> $items FAQ items.
 */
function foodrx_render_faq($items) {
	echo '<div class="cmsmasters_toggles toggles_mode_accordion foodrx-faq">' . "\n";

	foreach ($items as $index => $item) {
		$is_first = ($index === 0);
		$wrap_class = 'cmsmasters_toggle_wrap' . ($is_first ? ' current_toggle' : '');
		$toggle_style = $is_first ? '' : ' style="display:none;"';

		echo '<div class="' . esc_attr($wrap_class) . '">' . "\n";
		echo '<div class="cmsmasters_toggle_title">' . "\n";
		echo '<a href="#"><span class="cmsmasters_toggle_plus"><span></span><span></span></span>' . esc_html($item['question']) . '</a>' . "\n";
		echo '</div>' . "\n";
		echo '<div class="cmsmasters_toggle"' . $toggle_style . '>' . "\n";
		echo '<div class="cmsmasters_toggle_inner">' . wpautop(esc_html($item['answer'])) . '</div>' . "\n";
		echo '</div></div>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * Render Contact Form 7 if available, else fallback message.
 */
function foodrx_render_contact_form() {
	if (!shortcode_exists('contact-form-7')) {
		echo '<p class="foodrx-notice">Install and activate Contact Form 7, then paste the form markup from <code>content/contact-form-7.txt</code> into your contact form in WP Admin.</p>' . "\n";
		return;
	}

	$form_id = get_option('foodrx_cf7_form_id', '');

	if ($form_id !== '' && $form_id !== '0') {
		echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '"]');
		return;
	}

	foreach (array('Food Rx Contact', 'Contact form 1') as $form_title) {
		$form = get_page_by_title($form_title, OBJECT, 'wpcf7_contact_form');

		if ($form instanceof WP_Post) {
			echo do_shortcode('[contact-form-7 id="' . esc_attr((string) $form->ID) . '"]');
			return;
		}
	}

	echo do_shortcode('[contact-form-7 title="Food Rx Contact"]');
}

/**
 * Blog listing for Nutrition Hub.
 *
 * @param string $category_slug Optional category slug.
 */
function foodrx_render_blog_posts($category_slug = '') {
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 6,
	);

	if ($category_slug !== '') {
		$args['category_name'] = $category_slug;
	}

	$query = new WP_Query($args);

	if (!$query->have_posts()) {
		echo '<p class="foodrx-notice">No posts yet. Add blog posts and recipes under <strong>Posts</strong> in WordPress admin, using categories <em>Recipes</em> or <em>Nutrition Blog</em>.</p>' . "\n";
		wp_reset_postdata();
		return;
	}

	echo '<div class="foodrx-post-grid">' . "\n";

	while ($query->have_posts()) {
		$query->the_post();
		echo '<article class="foodrx-post-card">' . "\n";

		if (has_post_thumbnail()) {
			echo '<a class="foodrx-post-card__thumb" href="' . esc_url(get_permalink()) . '">';
			the_post_thumbnail('medium');
			echo '</a>' . "\n";
		}

		echo '<h3 class="foodrx-post-card__title"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>' . "\n";
		echo '<p class="foodrx-post-card__excerpt">' . esc_html(wp_trim_words(get_the_excerpt(), 24)) . '</p>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
	wp_reset_postdata();
}
