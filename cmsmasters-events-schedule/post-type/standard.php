<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.1.8
 * 
 * Event Schedule Shortcode Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_event_schedule_metadata = explode(',', $cmsmasters_es_metadata);

$title = (in_array('title', $cmsmasters_event_schedule_metadata)) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_event_schedule_metadata)) ? true : false;
$cmsmasters_event_schedule_speaker = (in_array('speaker', $cmsmasters_event_schedule_metadata)) ? get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_speaker', true) : false;



$cmsmasters_event_schedule_time = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_time', true);
$cmsmasters_event_schedule_speaker_heading = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_speaker_heading', true);

$cmsmasters_title = strip_tags(get_the_title(get_the_ID()));

?>

<!-- Start Event Schedule  -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_event_schedule'); ?>>
<?php
	echo '<div class="cmsmasters_event_schedule_cont">' . "\n" . 
		'<div class="cmsmasters_event_schedule_heading_wrap">' . "\n" . 
			'<abbr class="cmsmasters_event_schedule_date">' . esc_html($cmsmasters_event_schedule_time) . '</abbr>' . "\n" . 
			'<div class="cmsmasters_event_schedule_heading">' . "\n" . 
				'<h3 class="cmsmasters_event_schedule_title entry-title">' . '<a href="' . esc_url(get_permalink()) . '">' . $cmsmasters_title . '</a>' . '</h3>' . "\n" . 
			'</div>' . "\n" . 
		'</div>';
		
		
		if ($excerpt && theme_excerpt(20, false) != '' || $cmsmasters_event_schedule_speaker != '') {
			echo '<div class="cmsmasters_event_schedule_content_wrap">' . "\n";
			
			
				if ($excerpt && theme_excerpt(20, false) != '') {
					echo '<div class="cmsmasters_event_schedule_content entry-content">' . wpautop(theme_excerpt(20, false)) . '</div>' . "\n";
				}
				
				
				if ($cmsmasters_event_schedule_speaker != '') {
					echo '<div class="cmsmasters_event_schedule_speaker_wrap">' . "\n";
						
						if ($cmsmasters_event_schedule_speaker != '') {
							echo '<span class="cmsmasters_event_schedule_speaker">' . esc_html($cmsmasters_event_schedule_speaker) . '</span>' . "\n";
						}
						
						
						if ($cmsmasters_event_schedule_speaker_heading != '') {
							echo '<span class="cmsmasters_event_schedule_speaker_heading">' . ' / ' . esc_html($cmsmasters_event_schedule_speaker_heading) . '</span>' . "\n";
						}
						
					echo '</div>';
				}
			
			echo '</div>';
		}
	echo '</div>';
?>
</article>

<!-- Finish Event Schedule  -->