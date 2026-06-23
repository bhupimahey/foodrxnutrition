<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Profiles Page Vertical Profile Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>

<!-- Start Vertical Profile  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_vertical'); ?>>
	<div class="profile_outer">
	<?php
	if (has_post_thumbnail()) {
		healthy_living_thumb(get_the_ID(), 'cmsmasters-square-thumb', true, false, false, false, false);
	}
	
	
	echo '<div class="profile_inner">' . 
		'<div class="cmsmasters_profile_header_wrap">';
			
			healthy_living_profile_heading(get_the_ID(), 'vertical', 'h3', $cmsmasters_profile_subtitle, 'h6');
			
			healthy_living_profile_social_icons($cmsmasters_profile_social);
			
		echo '</div>';
		
		healthy_living_profile_exc_cont('vertical');
		
	echo '</div>';
	?>
	</div>
</article>
<!-- Finish Vertical Profile  -->

