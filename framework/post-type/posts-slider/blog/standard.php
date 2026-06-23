<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Posts Slider Standard Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && healthy_living_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;

?>

<!-- Start Standard Article  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
	<div class="cmsmasters_slider_post_outer">
	<?php
		echo '<div class="cmsmasters_slider_post_img_wrap">';
		
			healthy_living_thumb_rollover(get_the_ID(), 'cmsmasters-blog-masonry-thumb', false, true, false, false, false, false, false, false, true, false, false);
			
		echo '</div>';
		
		
		if ($date || $title || $excerpt || $more || $author || $categories || $likes || $comments) {
			echo '<div class="cmsmasters_slider_post_inner">';
			
				if ($date || $title || $excerpt || $more) {
					echo '<div class="cmsmasters_slider_post_cont_wrap">';
					
						$date ? healthy_living_get_slider_post_date('post') : '';
						
						$title ? healthy_living_slider_post_heading(get_the_ID(), 'post', 'h4') : '';
						
						$excerpt ? healthy_living_slider_post_exc_cont('post') : '';
						
						
						if ($more) {
							echo '<div class="cmsmasters_post_read_more_wrap">';
							
								$more ? healthy_living_slider_post_more(get_the_ID()) : '';
								
							echo '</div>';
						}
						
					echo '</div>';
				}
				
				
				if ($author || $categories || $likes || $comments) {
					echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
					
						if ($author || $categories) {
							echo '<div class="cmsmasters_slider_post_cont_info entry-meta">';
							
								$author ? healthy_living_get_slider_post_author('post') : '';
								
								$categories ? healthy_living_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
								
							echo '</div>';
						}
						
						
						if ($likes || $comments) {
							echo '<div class="cmsmasters_slider_post_meta_info entry-meta">';
							
								$likes ? healthy_living_slider_post_like('post') : '';
								
								$comments ? healthy_living_get_slider_post_comments('post') : '';
								
							echo '</div>';
						}
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!-- Finish Standard Article  -->

