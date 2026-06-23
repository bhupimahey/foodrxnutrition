<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Blog Page Timeline Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);

?>

<!-- Start Audio Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_timeline'); ?>>
	<?php 
	if ($date) {
		echo '<div class="cmsmasters_post_info entry-meta">';
		
			healthy_living_get_post_date('page', 'timeline');
			
		echo '</div>';
	}
	?>
	
	<div class="cmsmasters_timeline_margin">
		<div class="cmsmasters_post_cont_wrap">
			<div class="cmsmasters_post_cont">
				<div class="cmsmasters_post_cont_inner">
				<?php 
					healthy_living_post_heading(get_the_ID(), 'h4');
					
					
					if (!post_password_required() && !empty($cmsmasters_post_audio_links) && sizeof($cmsmasters_post_audio_links) > 0) {
						$attrs = array(
							'preload' => 'none'
						);
						
						
						foreach ($cmsmasters_post_audio_links as $cmsmasters_post_audio_link_url) {
							$attrs[substr(strrchr($cmsmasters_post_audio_link_url, '.'), 1)] = $cmsmasters_post_audio_link_url;
						}
						
						
						echo '<div class="cmsmasters_audio">' . 
							wp_audio_shortcode($attrs) . 
						'</div>';
					}
					
					
					healthy_living_post_exc_cont('page', 'timeline');
					
					
					if ($more) {
						echo '<div class="cmsmasters_post_read_more_wrap">';
						
							$more ? healthy_living_post_more(get_the_ID()) : '';
							
						echo '</div>';
					}
					?>
				</div>
			</div>
			
			<?php 
			if ($author || $categories || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
				
					if ($author || $categories) {
						echo '<div class="cmsmasters_post_cont_info entry-meta">';
						
							$author ? healthy_living_get_post_author('page') : '';
							
							$categories ? healthy_living_get_post_category(get_the_ID(), 'category', 'page') : '';
							
						echo '</div>';
					}
					
					
					if ($likes || $comments) {
						echo '<div class="cmsmasters_post_meta_info entry-meta">';
						
							$likes ? healthy_living_get_post_likes('page') : '';
							
							$comments ? healthy_living_get_post_comments('page') : '';
							
						echo '</div>';
					}
					
				echo '</footer>';
			}
			?>
		</div>
	</div>
</article>
<!-- Finish Audio Article  -->

