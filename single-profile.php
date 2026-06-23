<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Single Profile Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = healthy_living_get_global_options();


$cmsmasters_profile_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_profile_sharing_box', true);


echo '<!-- Start Content  -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="profiles opened-article">' . "\n";
	
	
	get_template_part('framework/post-type/profile/post/standard');
	
	
	if ($cmsmasters_profile_sharing_box == 'true') {
		healthy_living_sharing_box();
	}

	
	if ($cmsmasters_option['healthy-living' . '_profile_post_nav_box']) {
		healthy_living_prev_next_posts();
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


get_footer();

