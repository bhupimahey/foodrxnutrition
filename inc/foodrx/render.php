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
 * Render the theme page heading banner using a specific page's CMSMasters meta.
 *
 * Used when Nutrition Hub is assigned as the WordPress "Posts page" (is_home()),
 * because healthy_living_page_heading() only reads meta on is_singular().
 *
 * @param int $page_id Page ID whose heading meta should be rendered.
 */
function foodrx_render_page_heading_for_id($page_id) {
	$page_id = (int) $page_id;

	if ($page_id <= 0 || !function_exists('healthy_living_page_heading')) {
		return;
	}

	$page = get_post($page_id);

	if (!$page instanceof WP_Post) {
		return;
	}

	global $wp_query, $post;

	$saved_post = $post;
	$saved_state = array(
		'is_home' => $wp_query->is_home,
		'is_page' => $wp_query->is_page,
		'is_singular' => $wp_query->is_singular,
		'is_archive' => $wp_query->is_archive,
		'queried_object' => $wp_query->queried_object,
		'queried_object_id' => $wp_query->queried_object_id,
	);

	$wp_query->is_home = false;
	$wp_query->is_page = true;
	$wp_query->is_singular = true;
	$wp_query->is_archive = false;
	$wp_query->queried_object = $page;
	$wp_query->queried_object_id = $page_id;
	$post = $page;

	healthy_living_page_heading();

	$wp_query->is_home = $saved_state['is_home'];
	$wp_query->is_page = $saved_state['is_page'];
	$wp_query->is_singular = $saved_state['is_singular'];
	$wp_query->is_archive = $saved_state['is_archive'];
	$wp_query->queried_object = $saved_state['queried_object'];
	$wp_query->queried_object_id = $saved_state['queried_object_id'];
	$post = $saved_post;
}

/**
 * Open standard page content wrapper (matches theme layout).
 *
 * @param string $layout cmsmasters layout slug.
 * @param string $page_class Optional extra classes on .foodrx-page.
 */
function foodrx_open_content($layout, $page_class = '') {
	echo '<!-- Start Content -->' . "\n";

	if ($layout === 'r_sidebar') {
		echo '<div class="content entry">' . "\n";
	} elseif ($layout === 'l_sidebar') {
		echo '<div class="content entry fr">' . "\n";
	} else {
		echo '<div class="middle_content entry">';
	}

	$class_attr = trim('foodrx-page ' . $page_class);
	echo '<div class="' . esc_attr($class_attr) . '">' . "\n";
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
 * @param string $label Optional small label above title (demo style).
 */
function foodrx_section_open($title, $intro = '', $label = '') {
	echo '<section class="foodrx-section">' . "\n";

	if ($label !== '' || $title !== '') {
		foodrx_render_section_heading($label, $title, $intro);
	} elseif ($intro !== '') {
		echo '<p class="foodrx-section__intro">' . esc_html($intro) . '</p>' . "\n";
	}
}

function foodrx_section_close() {
	echo '</section>' . "\n";
}

/**
 * Demo-style section heading: small label + title + divider.
 *
 * @param string $label Small uppercase label.
 * @param string $title Main section title.
 * @param string $intro Optional intro copy.
 */
function foodrx_render_section_heading($label, $title, $intro = '') {
	echo '<div class="foodrx-section-head">' . "\n";

	if ($label !== '') {
		echo '<p class="foodrx-section-head__label">' . esc_html($label) . '</p>' . "\n";
	}

	if ($title !== '') {
		echo '<h2 class="foodrx-section-head__title">' . esc_html($title) . '</h2>' . "\n";
	}

	echo '<div class="foodrx-section-head__divider" aria-hidden="true"></div>' . "\n";

	if ($intro !== '') {
		echo '<p class="foodrx-section-head__intro">' . esc_html($intro) . '</p>' . "\n";
	}

	echo '</div>' . "\n";
}

function foodrx_breakout_open($class = '') {
	$class_attr = trim('foodrx-breakout ' . $class);
	echo '<div class="' . esc_attr($class_attr) . '">' . "\n";
}

function foodrx_breakout_close() {
	echo '</div>' . "\n";
}

/**
 * @param string $label Small label above hero title.
 * @param string $title Main hero heading.
 * @param string $subtitle Supporting text.
 * @param string $cta_url Optional CTA link.
 * @param string $cta_label Optional CTA label.
 * @param string $variant Hero style: default|cover.
 */
function foodrx_render_hero($label, $title, $subtitle, $cta_url = '', $cta_label = '', $variant = 'default') {
	$classes = 'foodrx-hero';

	if ($variant === 'cover') {
		$classes .= ' foodrx-hero--cover';
		$bg_url = foodrx_get_hero_bg_url();

		if ($bg_url !== '') {
			$classes .= ' foodrx-hero--has-image';
			echo '<section class="' . esc_attr($classes) . '" style="background-image:url(' . esc_url($bg_url) . ');">' . "\n";
		} else {
			echo '<section class="' . esc_attr($classes) . '">' . "\n";
		}
	} else {
		echo '<section class="' . esc_attr($classes) . '">' . "\n";
	}

	echo '<div class="foodrx-hero__inner">' . "\n";
	echo '<p class="foodrx-hero__label">' . esc_html($label) . '</p>' . "\n";
	echo '<h1 class="foodrx-hero__title">' . esc_html($title) . '</h1>' . "\n";
	echo '<p class="foodrx-hero__subtitle">' . esc_html($subtitle) . '</p>' . "\n";

	if ($cta_url && $cta_label) {
		echo '<p class="foodrx-hero__cta"><a class="foodrx-button cmsmasters_button" href="' . esc_url($cta_url) . '">' . esc_html($cta_label) . '</a></p>' . "\n";
	}

	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * @param array<int, array{icon: string, title: string, color: string, url: string}> $tiles Featured tiles.
 */
function foodrx_render_featured_tiles($tiles) {
	echo '<div class="foodrx-featured-tiles">' . "\n";

	foreach ($tiles as $tile) {
		$url = !empty($tile['url']) ? $tile['url'] : '#';
		echo '<a class="foodrx-featured-tile" href="' . esc_url($url) . '" style="background-color:' . esc_attr($tile['color']) . ';">' . "\n";
		echo '<span class="cmsmasters_simple_icon ' . esc_attr($tile['icon']) . '" aria-hidden="true"></span>' . "\n";
		echo '<h3 class="foodrx-featured-tile__title">' . esc_html($tile['title']) . '</h3>' . "\n";
		echo '<span class="foodrx-featured-tile__link">Learn More</span>' . "\n";
		echo '</a>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, array{icon: string, title: string, body: string}> $items Icon box items.
 */
function foodrx_render_icon_boxes($items) {
	echo '<div class="foodrx-icon-boxes">' . "\n";

	foreach ($items as $item) {
		echo '<article class="cmsmasters_icon_box cmsmasters_icon_box_left foodrx-icon-box">' . "\n";
		echo '<span class="cmsmasters_simple_icon ' . esc_attr($item['icon']) . '" aria-hidden="true"></span>' . "\n";
		echo '<div class="icon_box_inner">' . "\n";
		echo '<h5 class="icon_box_heading">' . esc_html($item['title']) . '</h5>' . "\n";
		echo '<div class="icon_box_text"><p>' . esc_html($item['body']) . '</p></div>' . "\n";
		echo '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, string> $items Chip/tag items.
 */
function foodrx_render_chips($items) {
	echo '<div class="foodrx-chips">' . "\n";

	foreach ($items as $item) {
		echo '<span class="foodrx-chip">' . esc_html($item) . '</span>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param string $title CTA title.
 * @param string $subtitle CTA subtitle.
 * @param string $url CTA URL.
 * @param string $label CTA button label.
 */
function foodrx_render_cta_band($title, $subtitle, $url, $label) {
	echo '<section class="foodrx-cta-band">' . "\n";
	echo '<div class="foodrx-cta-band__inner">' . "\n";
	echo '<div class="foodrx-cta-band__copy">' . "\n";
	echo '<h2 class="foodrx-cta-band__title">' . esc_html($title) . '</h2>' . "\n";
	echo '<p class="foodrx-cta-band__subtitle">' . esc_html($subtitle) . '</p>' . "\n";
	echo '</div>' . "\n";
	echo '<div class="foodrx-cta-band__action">' . "\n";
	echo '<a class="foodrx-button foodrx-button--light cmsmasters_button" href="' . esc_url($url) . '">' . esc_html($label) . '</a>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * @param array<int, array{number: string, title: string, body: string, color: string}> $steps Contact/process steps.
 */
function foodrx_render_process_steps($steps) {
	echo '<div class="foodrx-process-steps">' . "\n";

	foreach ($steps as $step) {
		echo '<article class="cmsmasters_featured_block foodrx-process-step" style="background-color:' . esc_attr($step['color']) . ';">' . "\n";
		echo '<div class="featured_block_inner">' . "\n";
		echo '<p class="foodrx-process-step__number">' . esc_html($step['number']) . '</p>' . "\n";
		echo '<h2 class="foodrx-process-step__title">' . esc_html($step['title']) . '</h2>' . "\n";

		if (!empty($step['lines']) && is_array($step['lines'])) {
			foreach ($step['lines'] as $line) {
				echo '<h3 class="foodrx-process-step__line">' . esc_html($line) . '</h3>' . "\n";
			}
		} elseif (!empty($step['body'])) {
			echo '<p class="foodrx-process-step__body">' . esc_html($step['body']) . '</p>' . "\n";
		}
		echo '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param array<int, array{icon: string, color: string, value: string, label: string, href: string}> $items Contact detail items.
 */
function foodrx_render_contact_details($items) {
	echo '<div class="foodrx-contact-details">' . "\n";

	foreach ($items as $item) {
		echo '<article class="cmsmasters_featured_block foodrx-contact-detail">' . "\n";
		echo '<div class="featured_block_inner">' . "\n";
		echo '<span class="cmsmasters_simple_icon ' . esc_attr($item['icon']) . '" style="color:' . esc_attr($item['color']) . ';" aria-hidden="true"></span>' . "\n";

		if (!empty($item['href'])) {
			echo '<h3 class="foodrx-contact-detail__value"><a href="' . esc_url($item['href']) . '">' . esc_html($item['value']) . '</a></h3>' . "\n";
		} else {
			echo '<h3 class="foodrx-contact-detail__value">' . esc_html($item['value']) . '</h3>' . "\n";
		}

		echo '<h6 class="foodrx-contact-detail__label">' . esc_html($item['label']) . '</h6>' . "\n";
		echo '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * Full-width map image matching the demo Contacts page.
 */
function foodrx_render_contact_map() {
	$map_url = foodrx_get_page_bg_url('contact-map');

	echo '<div class="foodrx-contact-map-wide">' . "\n";
	echo '<img src="' . esc_url($map_url) . '" alt="Map location" width="1920" height="760" loading="lazy" />' . "\n";
	echo '</div>' . "\n";
}

function foodrx_open_contact_content() {
	echo '<div class="foodrx-contact-layout">' . "\n";
}

function foodrx_close_contact_content() {
	echo '</div><!-- .foodrx-contact-layout -->' . "\n";
}

/**
 * Demo Contacts page form section (background image, heading, gray form card).
 *
 * @param string $bg_url Background image URL.
 */
function foodrx_render_demo_contact_form_panel($bg_url) {
	$classes = 'foodrx-form-panel foodrx-form-panel--demo foodrx-form-panel--has-bg';
	$style = ' style="background-image:url(' . esc_url($bg_url) . ');"';

	echo '<section class="' . esc_attr($classes) . '"' . $style . '>' . "\n";
	echo '<div class="foodrx-form-panel__row">' . "\n";
	echo '<div class="foodrx-form-panel__col foodrx-form-panel__col--copy">' . "\n";
	echo '<p class="foodrx-demo-form__label">Contact With Us</p>' . "\n";
	echo '<h2 class="foodrx-demo-form__title">Change Your Life In One Click</h2>' . "\n";
	echo '<hr class="foodrx-demo-divider" />' . "\n";
	echo '<img class="foodrx-section-divider-img" src="' . esc_url(foodrx_get_divider_image_url()) . '" alt="" width="120" height="auto" />' . "\n";
	echo '<h3 class="foodrx-demo-form__intro">Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum estibulum issim posuere cubilia Curae Suspendisse</h3>' . "\n";
	echo '<div class="foodrx-demo-form__buttons">' . "\n";
	echo '<a class="cmsmasters_button foodrx-button" href="' . esc_url(home_url('/services/')) . '"><span>Purchase</span></a>' . "\n";
	echo '<a class="cmsmasters_button foodrx-button foodrx-button--outline-green" href="' . esc_url(home_url('/contact/#foodrx-contact-form')) . '"><span>Learn More</span></a>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '<div class="foodrx-form-panel__col foodrx-form-panel__col--form">' . "\n";
	echo '<div class="cmsmasters_featured_block foodrx-form-panel__card">' . "\n";
	echo '<div class="featured_block_inner">' . "\n";
	echo '<div id="foodrx-contact-form" class="foodrx-contact-form foodrx-contact-form--full cmsmasters_contact_form">' . "\n";
	foodrx_render_contact_form();
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * Demo Contacts page subscribe band.
 */
function foodrx_render_subscribe_band() {
	echo '<section class="foodrx-subscribe-band">' . "\n";
	echo '<div class="foodrx-subscribe-band__inner">' . "\n";
	echo '<div class="foodrx-subscribe-band__title-col">' . "\n";
	echo '<h2 class="foodrx-subscribe-band__title">Subscribe to stay informed</h2>' . "\n";
	echo '</div>' . "\n";
	echo '<div class="foodrx-subscribe-band__form-col">' . "\n";

	if (is_active_sidebar('mail-poet')) {
		dynamic_sidebar('mail-poet');
	} else {
		echo '<form class="foodrx-subscribe-form mailpoet_form" action="#" method="post">' . "\n";
		echo '<p class="foodrx-subscribe-form__field mailpoet_paragraph">' . "\n";
		echo '<input type="email" name="email" class="mailpoet_text" placeholder="Your Email" aria-label="Your Email" required />' . "\n";
		echo '</p>' . "\n";
		echo '<p class="foodrx-subscribe-form__submit mailpoet_paragraph">' . "\n";
		echo '<input type="submit" class="mailpoet_submit" value="Subscribe" />' . "\n";
		echo '</p>' . "\n";
		echo '</form>' . "\n";
	}

	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * @param string $label Small label.
 * @param string $title Form section title.
 * @param string $intro Form intro text.
 * @param string $bg_url Optional background image URL.
 */
function foodrx_render_form_panel($label, $title, $intro, $bg_url = '') {
	$classes = 'foodrx-form-panel';

	if ($bg_url !== '') {
		$classes .= ' foodrx-form-panel--has-bg';
	}

	$style = $bg_url !== '' ? ' style="background-image:url(' . esc_url($bg_url) . ');"' : '';

	echo '<section class="' . esc_attr($classes) . '"' . $style . '>' . "\n";
	echo '<div class="foodrx-form-panel__inner">' . "\n";
	foodrx_render_section_heading($label, $title, $intro);
	echo '<img class="foodrx-section-divider-img" src="' . esc_url(foodrx_get_divider_image_url()) . '" alt="" width="120" height="auto" />' . "\n";
	echo '<div class="cmsmasters_featured_block foodrx-form-panel__card">' . "\n";
	echo '<div class="featured_block_inner">' . "\n";
	echo '<div id="foodrx-contact-form" class="foodrx-contact-form foodrx-contact-form--full">' . "\n";
	foodrx_render_contact_form();
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * Split hero used on the Nutrition Hub page (demo Nutrilon blog style).
 */
function foodrx_render_nutrition_hub_hero() {
	$featured = foodrx_get_nutrition_hub_featured();
	$bg_url = foodrx_get_page_bg_url('nutrition-hub-hero');
	$divider_url = foodrx_get_hub_divider_image_url();

	echo '<div class="foodrx-hub-hero">' . "\n";
	echo '<div class="foodrx-hub-hero__left cmsmasters_featured_block">' . "\n";
	echo '<div class="featured_block_inner">' . "\n";
	echo '<p class="foodrx-hub-hero__label">' . esc_html($featured['label']) . '</p>' . "\n";
	echo '<h2 class="foodrx-hub-hero__title">' . esc_html($featured['title']) . '</h2>' . "\n";
	echo '<img class="foodrx-hub-hero__divider-img" src="' . esc_url($divider_url) . '" alt="" width="100" height="14" loading="lazy" />' . "\n";
	echo '<p class="foodrx-hub-hero__body">' . esc_html($featured['body']) . '</p>' . "\n";
	echo '<a class="foodrx-button foodrx-button--outline cmsmasters_button" href="' . esc_url($featured['cta_url']) . '"><span>' . esc_html(strtoupper($featured['cta_label'])) . '</span></a>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '<div class="foodrx-hub-hero__right cmsmasters_featured_block" style="background-image:url(' . esc_url($bg_url) . ');"></div>' . "\n";
	echo '</div>' . "\n";
}

/**
 * Standard blog feed matching the demo Nutrilon blog page.
 */
function foodrx_render_nutrition_hub_blog() {
	if (shortcode_exists('cmsmasters_blog')) {
		echo do_shortcode('[cmsmasters_blog orderby="date" order="DESC" count="6" layout="standard" metadata="date,categories,author,comments,more" pagination="more"]');
		return;
	}

	foodrx_render_blog_posts('');
}

/**
 * Teal info band used on the demo Contacts page (newsletter substitute).
 *
 * @param string $title Band title.
 * @param string $subtitle Band subtitle.
 * @param string $url CTA URL.
 * @param string $label CTA label.
 */
function foodrx_render_info_band($title, $subtitle, $url, $label) {
	echo '<section class="foodrx-info-band">' . "\n";
	echo '<div class="foodrx-info-band__inner">' . "\n";
	echo '<div class="foodrx-info-band__copy">' . "\n";
	echo '<h2 class="foodrx-info-band__title">' . esc_html($title) . '</h2>' . "\n";

	if ($subtitle !== '') {
		echo '<p class="foodrx-info-band__subtitle">' . esc_html($subtitle) . '</p>' . "\n";
	}

	echo '</div>' . "\n";
	echo '<div class="foodrx-info-band__action">' . "\n";
	echo '<a class="foodrx-button foodrx-button--light cmsmasters_button" href="' . esc_url($url) . '"><span>' . esc_html($label) . '</span></a>' . "\n";
	echo '</div>' . "\n";
	echo '</div>' . "\n";
	echo '</section>' . "\n";
}

/**
 * @param array<int, array{title: string, price: string, summary: string, details: array<int, string>}> $services Service blocks.
 */
function foodrx_render_services($services) {
	echo '<div id="foodrx-programs" class="cmsmasters_pricing_table pricing_one foodrx-pricing-table">' . "\n";

	foreach ($services as $index => $service) {
		$is_featured = ($index === 0);
		$item_class = 'cmsmasters_pricing_item foodrx-pricing-item' . ($is_featured ? ' pricing_best' : '');
		$price_parts = foodrx_parse_price_display($service['price']);

		echo '<article class="' . esc_attr($item_class) . '">' . "\n";
		echo '<div class="cmsmasters_pricing_item_inner">' . "\n";
		echo '<h3 class="pricing_title">' . esc_html($service['title']) . '</h3>' . "\n";
		echo '<div class="cmsmasters_price_wrap">' . "\n";

		if ($price_parts['currency'] !== '') {
			echo '<span class="cmsmasters_currency">' . esc_html($price_parts['currency']) . '</span>' . "\n";
		}

		echo '<span class="cmsmasters_price">' . esc_html($price_parts['amount']) . '</span>' . "\n";

		if ($price_parts['period'] !== '') {
			echo '<br /><span class="cmsmasters_period">' . esc_html($price_parts['period']) . '</span>' . "\n";
		}

		echo '</div>' . "\n";

		if (!empty($service['summary'])) {
			echo '<div class="foodrx-pricing-item__summary">' . wpautop(esc_html($service['summary'])) . '</div>' . "\n";
		}

		if (!empty($service['details'])) {
			echo '<ul class="feature_list">' . "\n";

			foreach ($service['details'] as $detail) {
				echo '<li>' . esc_html($detail) . '</li>' . "\n";
			}

			echo '</ul>' . "\n";
		}

		if (!empty($service['outro'])) {
			echo '<div class="foodrx-pricing-item__outro">' . wpautop(esc_html($service['outro'])) . '</div>' . "\n";
		}

		echo '<a class="cmsmasters_button" href="' . esc_url(home_url('/contact/')) . '">Book Now</a>' . "\n";
		echo '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
}

/**
 * @param string $price Raw price string from content.
 * @return array{currency: string, amount: string, period: string}
 */
function foodrx_parse_price_display($price) {
	$price = trim($price);

	if ($price === '' || stripos($price, 'custom') !== false) {
		return array(
			'currency' => '',
			'amount' => $price,
			'period' => '',
		);
	}

	if (preg_match('/^(\$)\s*([^\/]+?)(?:\s*\/\s*(.+))?$/', $price, $matches)) {
		return array(
			'currency' => $matches[1],
			'amount' => trim($matches[2]),
			'period' => isset($matches[3]) ? trim($matches[3]) : '',
		);
	}

	return array(
		'currency' => '',
		'amount' => $price,
		'period' => '',
	);
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
	// cmsmasters_color_scheme_default lets the theme's color variables (teal
	// border, accent title) apply — same classes the [cmsmasters_toggles]
	// shortcode generates on the reference demo page.
	echo '<div class="cmsmasters_toggles toggles_mode_accordion cmsmasters_color_scheme_default foodrx-faq">' . "\n";

	foreach ($items as $index => $item) {
		$wrap_class = 'cmsmasters_toggle_wrap' . ($index === 0 ? ' current_toggle' : '');

		echo '<div class="' . esc_attr($wrap_class) . '">' . "\n";
		echo '<div class="cmsmasters_toggle_title">' . "\n";
		// Span class names are required by theme CSS (rotation transforms) and JS.
		echo '<a href="#">';
		echo '<span class="cmsmasters_toggle_plus">';
		echo '<span class="cmsmasters_toggle_plus_hor"></span>';
		echo '<span class="cmsmasters_toggle_plus_vert"></span>';
		echo '</span>';
		echo esc_html($item['question']);
		echo '</a>' . "\n";
		echo '</div>' . "\n";
		echo '<div class="cmsmasters_toggle">' . "\n";
		echo '<div class="cmsmasters_toggle_inner">' . wpautop(esc_html($item['answer'])) . '</div>' . "\n";
		echo '</div>' . "\n";
		echo '</div>' . "\n";
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
 * @param string $section_label Optional section label for native shortcode heading.
 * @param string $section_title Optional section title for native shortcode heading.
 */
function foodrx_render_blog_posts($category_slug = '', $section_label = '', $section_title = '') {
	if (shortcode_exists('cmsmasters_blog') && $category_slug === '') {
		echo do_shortcode('[cmsmasters_blog layout="standard" count="6" metadata="date,categories,more"]');
		return;
	}

	if (shortcode_exists('cmsmasters_blog') && $category_slug !== '') {
		echo do_shortcode('[cmsmasters_blog layout="standard" count="6" categories="' . esc_attr($category_slug) . '" metadata="date,categories,more"]');
		return;
	}

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
		echo '<article class="cmsmasters_post_default foodrx-post-card">' . "\n";

		if (has_post_thumbnail()) {
			echo '<a class="foodrx-post-card__thumb" href="' . esc_url(get_permalink()) . '">';
			the_post_thumbnail('medium');
			echo '</a>' . "\n";
		} else {
			echo '<a class="foodrx-post-card__thumb foodrx-post-card__thumb--placeholder" href="' . esc_url(get_permalink()) . '"><span>Food Rx</span></a>' . "\n";
		}

		echo '<div class="foodrx-post-card__body">' . "\n";
		echo '<p class="foodrx-post-card__meta">' . esc_html(get_the_date()) . '</p>' . "\n";
		echo '<h3 class="foodrx-post-card__title"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>' . "\n";
		echo '<p class="foodrx-post-card__excerpt">' . esc_html(wp_trim_words(get_the_excerpt(), 24)) . '</p>' . "\n";
		echo '<a class="foodrx-post-card__more" href="' . esc_url(get_permalink()) . '">Read More</a>' . "\n";
		echo '</div>' . "\n";
		echo '</article>' . "\n";
	}

	echo '</div>' . "\n";
	wp_reset_postdata();
}
