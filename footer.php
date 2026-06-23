<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.5
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = healthy_living_get_global_options();
?>


		</div>
	</div>
</div>
<!--  Finish Middle  -->
<?php 

get_sidebar('bottom');

?>
<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>
</div>
<!--  Finish Main  -->

<!--  Start Footer  -->
<footer id="footer" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option['healthy-living' . '_footer_scheme'] . ($cmsmasters_option['healthy-living' . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small'); ?>">
	<div class="footer_inner">
	<?php 
		healthy_living_footer_logo($cmsmasters_option);
		
		
		healthy_living_get_footer_custom_html($cmsmasters_option);
		
		
		healthy_living_get_footer_nav($cmsmasters_option);
		
		
		healthy_living_get_footer_social_icons($cmsmasters_option);
	?>
		<span class="footer_copyright copyright">
			<?php 
			if (function_exists('the_privacy_policy_link')) {
				the_privacy_policy_link('', ' / ');
			}
			
			echo esc_html(stripslashes($cmsmasters_option['healthy-living' . '_footer_copyright']));
			?>
		</span>
	</div>
</footer>
<!--  Finish Footer  -->

</div>
<span class="cmsmasters_responsive_width"></span>
<!--  Finish Page  -->

<?php wp_footer(); ?>
</body>
</html>
