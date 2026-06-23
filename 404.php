<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.0.0
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = healthy_living_get_global_options();

?>

</div>

<!--  Start Content  -->
<div class="entry">
	<div class="error">
		<div class="error_bg">
			<div class="error_inner">
				<h1 class="error_title"><?php echo esc_html__('404', 'healthy-living'); ?></h1>
				<h2 class="error_subtitle"><?php echo esc_html__("We're sorry, but the page you were looking for doesn't exist.", 'healthy-living'); ?></h2>
			</div>
			<div class="error_cont">
				<?php 
				if ($cmsmasters_option['healthy-living' . '_error_search']) { 
					get_search_form(); 
				}
				
				
				if ($cmsmasters_option['healthy-living' . '_error_sitemap_button'] && $cmsmasters_option['healthy-living' . '_error_sitemap_link'] != '') {
					echo '<div class="error_button_wrap"><a href="' . esc_url($cmsmasters_option['healthy-living' . '_error_sitemap_link']) . '" class="button">' . esc_html__('Sitemap', 'healthy-living') . '</a></div>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="content_wrap fullwidth">
<!--  Finish Content  -->

<?php 
get_footer();

