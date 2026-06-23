<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.4
 * 
 * Single Project Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = healthy_living_get_global_options();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsmasters_project_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_project_sharing_box', true);

$cmsmasters_project_author_box = get_post_meta(get_the_ID(), 'cmsmasters_project_author_box', true);

$cmsmasters_project_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_project_more_posts', true);


echo '<!-- Start Content  -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="portfolio opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/post-type/portfolio/post/' . get_post_format());
	} else {
		get_template_part('framework/post-type/portfolio/post/standard');
	}
	
	
	if ($cmsmasters_project_sharing_box == 'true') {
		healthy_living_sharing_box();
	}
	
	
	if ($cmsmasters_option['healthy-living' . '_portfolio_project_nav_box']) {
		healthy_living_prev_next_posts();
	}
	
	
	if ($cmsmasters_project_author_box == 'true') {
		healthy_living_author_box(esc_html__('About author', 'healthy-living'), 'h2', 'h4');
	}
	
	
	if ($project_tags) {
		$tgsarray = array();
		
		
		foreach ($project_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_project_more_posts != 'hide') {
		healthy_living_related( 
			'h2', 
			$cmsmasters_project_more_posts, 
			$tgsarray, 
			$cmsmasters_option['healthy-living' . '_portfolio_more_projects_count'], 
			$cmsmasters_option['healthy-living' . '_portfolio_more_projects_pause'], 
			'project', 
			'pj-tags' 
		);
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


get_footer();

