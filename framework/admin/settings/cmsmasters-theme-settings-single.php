<?php 
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.1
 * 
 * Admin Panel Post, Project, Profile & Donations Campaign Settings
 * Created by CMSMasters
 * 
 */


function healthy_living_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'healthy-living');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'healthy-living');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'healthy-living');
	}
	
	if (CMSMASTERS_DONATIONS) {
		$tabs['campaign'] = esc_attr__('Campaign', 'healthy-living');
	}
	
	
	return $tabs;
}


function healthy_living_options_single_sections() {
	$tab = healthy_living_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'healthy-living');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'healthy-living');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'healthy-living');
		
		
		break;
	case 'campaign':
		$sections = array();
		
		$sections['campaign_section'] = esc_attr__('Donations Campaign Options', 'healthy-living');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function healthy_living_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = healthy_living_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'healthy-living') . '|related', 
				esc_html__('Show Popular Posts', 'healthy-living') . '|popular', 
				esc_html__('Show Recent Posts', 'healthy-living') . '|recent', 
				esc_html__('Hide More Posts Box', 'healthy-living') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'healthy-living'), 
			'desc' => esc_html__('posts', 'healthy-living'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'healthy-living' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'healthy-living'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'healthy-living'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'healthy-living'), 
			'desc' => esc_html__('Enter a project details block title', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'healthy-living') . '|related', 
				esc_html__('Show Popular Projects', 'healthy-living') . '|popular', 
				esc_html__('Show Recent Projects', 'healthy-living') . '|recent', 
				esc_html__('Hide More Projects Box', 'healthy-living') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'healthy-living'), 
			'desc' => esc_html__('projects', 'healthy-living'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'healthy-living'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'healthy-living'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'healthy-living' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'healthy-living'), 
			'desc' => esc_html__('Enter a profile details block title', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'healthy-living' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'campaign':
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_layout', 
			'title' => esc_html__('Layout Type', 'healthy-living'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'healthy-living') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_title', 
			'title' => esc_html__('Campaign Title', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_date', 
			'title' => esc_html__('Campaign Date', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_cat', 
			'title' => esc_html__('Campaign Categories', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_author', 
			'title' => esc_html__('Campaign Author', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_comment', 
			'title' => esc_html__('Campaign Comments', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_tag', 
			'title' => esc_html__('Campaign Tags', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_like', 
			'title' => esc_html__('Campaign Likes', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_nav_box', 
			'title' => esc_html__('Campaign Navigation Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_share_box', 
			'title' => esc_html__('Sharing Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_author_box', 
			'title' => esc_html__('About Author Box', 'healthy-living'), 
			'desc' => esc_html__('show', 'healthy-living'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_more_campaigns_box', 
			'title' => esc_html__('More Campaigns Box', 'healthy-living'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Campaigns', 'healthy-living') . '|related', 
				esc_html__('Show Popular Campaigns', 'healthy-living') . '|popular', 
				esc_html__('Show Recent Campaigns', 'healthy-living') . '|recent', 
				esc_html__('Hide More Campaigns Box', 'healthy-living') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_more_campaigns_count', 
			'title' => esc_html__('More Campaigns Box Items Number', 'healthy-living'), 
			'desc' => esc_html__('campaigns', 'healthy-living'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_more_campaigns_pause', 
			'title' => esc_html__('More Campaigns Slider Pause Time', 'healthy-living'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'healthy-living'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'healthy-living' . '_donations_campaign_slug', 
			'title' => esc_html__('Campaign Slug', 'healthy-living'), 
			'desc' => esc_html__('Enter a page slug that should be used for your donations campaign single item', 'healthy-living'), 
			'type' => 'text', 
			'std' => 'campaign', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;
}

