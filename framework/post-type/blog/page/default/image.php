<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.7
 * 
 * Blog Page Default Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = !is_home() ? explode(',', $cmsmasters_metadata) : array();


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || (is_home() && CMSMASTERS_CONTENT_COMPOSER)) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

?>

<!-- Start Image Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_default'); ?>>
	<div class="cmsmasters_post_cont_wrap">
	<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				healthy_living_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), false, false, false, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				healthy_living_thumb(get_the_ID(), 'cmsmasters-masonry-thumb', false, 'img_' . get_the_ID(), false, false, false, true, false);
			}
		}
		?>
		
		<div class="cmsmasters_post_cont">
		<?php 
			if ($date) {
				echo '<div class="cmsmasters_post_info entry-meta">';
				
					$date ? healthy_living_get_post_date('page', 'default') : '';
					
				echo '</div>';
			}
			
			
			healthy_living_post_heading(get_the_ID(), 'h2');
			
			
			healthy_living_post_exc_cont('page', 'default');
			
			
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
</article>
<!-- Finish Image Article  -->

