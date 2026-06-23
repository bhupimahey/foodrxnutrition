<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.1.3
 * 
 * Blog Post Standard Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_id = get_the_ID();

$cmsmasters_option = healthy_living_get_global_options();


$cmsmasters_post_title = get_post_meta($cmsmasters_id, 'cmsmasters_post_title', true);

$cmsmasters_post_image_show = get_post_meta($cmsmasters_id, 'cmsmasters_post_image_show', true);


list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'cmsmasters-full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'cmsmasters-masonry-thumb';
}


$cmsmasters_heading = get_post_meta($cmsmasters_id, 'cmsmasters_heading', true);

?>

<!-- Start Standard Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if (!post_password_required() && has_post_thumbnail() && $cmsmasters_post_image_show != 'true') {
		healthy_living_thumb($cmsmasters_id, $cmsmasters_image_thumb_size, false, 'img_' . $cmsmasters_id, false, false, false, true, false);
	}
	
	
	if ($cmsmasters_option['healthy-living' . '_blog_post_date']) {
		echo '<div class="cmsmasters_post_meta_info entry-meta">';
			
			healthy_living_get_post_date('post');
			
		echo '</div>';
	}
	
	
	if ($cmsmasters_post_title == 'true') {
		healthy_living_post_title_nolink($cmsmasters_id, ( $cmsmasters_heading == 'disabled' ? 'h1' : 'h2' ) );
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_post_content entry-content">';
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'healthy-living') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => '<span>', 
				'link_after' => '</span>' 
			));
			
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_option['healthy-living' . '_blog_post_author'] || 
		$cmsmasters_option['healthy-living' . '_blog_post_cat'] || 
		$cmsmasters_option['healthy-living' . '_blog_post_tag'] || 
		$cmsmasters_option['healthy-living' . '_blog_post_like'] || 
		$cmsmasters_option['healthy-living' . '_blog_post_comment'] 
	) {
		echo '<footer class="cmsmasters_post_footer entry-meta">';
		
		
			if (
				$cmsmasters_option['healthy-living' . '_blog_post_author'] || 
				$cmsmasters_option['healthy-living' . '_blog_post_cat'] || 
				$cmsmasters_option['healthy-living' . '_blog_post_tag'] 
			) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
					healthy_living_get_post_author('post');
					
					healthy_living_get_post_category($cmsmasters_id, 'category', 'post');
					
					healthy_living_get_post_tags();
					
				echo '</div>';
			}
			
			
			if (
				$cmsmasters_option['healthy-living' . '_blog_post_like'] || 
				$cmsmasters_option['healthy-living' . '_blog_post_comment'] 
			) {
				echo '<div class="cmsmasters_post_info entry-meta">';
				
					healthy_living_get_post_likes('post');
					
					healthy_living_get_post_comments('post');
					
				echo '</div>';
			}
			
			
		echo '</footer>';
	}
	?>
</article>
<!-- Finish Standard Article  -->

