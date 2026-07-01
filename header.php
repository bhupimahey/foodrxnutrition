<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.1.7
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = healthy_living_get_global_options();


?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="cmsmasters_html">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	
<!--  Start Page  -->
<div id="page" class="<?php healthy_living_get_page_classes($cmsmasters_option); ?>hfeed site">

<!--  Start Main  -->
<div id="main">
	
<!--  Start Header  -->
<header id="header">
	<?php 
	healthy_living_header_top($cmsmasters_option);
	
	
	healthy_living_header_mid($cmsmasters_option);
	
	
	healthy_living_header_bot($cmsmasters_option);
	?>
</header>
<!--  Finish Header  -->

	
<!--  Start Middle  -->
<div id="middle"<?php echo (is_404()) ? ' class="error_page"' : ''; ?>>
<?php
$foodrx_posts_hub_heading = function_exists('foodrx_is_nutrition_hub_posts_page_view') && foodrx_is_nutrition_hub_posts_page_view();

if (!is_404() && (!is_home() || $foodrx_posts_hub_heading)) {
	if ($foodrx_posts_hub_heading) {
		foodrx_render_page_heading_for_id((int) get_option('page_for_posts'));
	} else {
		healthy_living_page_heading();
	}
} elseif (is_404()) {
	echo "";
} else {
	echo "<div class=\"headline\">
		<div class=\"headline_outer cmsmasters_headline_disabled\"></div>
	</div>";
}


list($cmsmasters_layout, $cmsmasters_page_scheme) = healthy_living_theme_page_layout_scheme();


echo '<div class="middle_inner' . (($cmsmasters_page_scheme != 'default') ? ' cmsmasters_color_scheme_' . $cmsmasters_page_scheme : '') . '">' . "\n" . 
	'<div class="content_wrap ' . $cmsmasters_layout . 
	((is_singular('project')) ? ' project_page' : '') . 
	((is_singular('profile')) ? ' profile_page' : '') . 
	((CMSMASTERS_WOOCOMMERCE && (
		is_woocommerce() || 
		is_cart() || 
		is_checkout() || 
		is_checkout_pay_page() || 
		is_account_page() || 
		is_order_received_page() || 
		is_add_payment_method_page()
	)) ? ' cmsmasters_woo' : '') . 
	'">' . "\n\n";

