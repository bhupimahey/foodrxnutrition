<?php
/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Single Event Schedule Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = healthy_living_get_global_options();

list($cmsmasters_layout) = healthy_living_theme_page_layout_scheme();


$event_schedule_dates = get_the_terms(get_the_ID(), 'es-date');

$cmsmasters_event_schedule_time = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_time', true);

$cmsmasters_event_schedule_speaker = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_speaker', true);

$cmsmasters_event_schedule_speaker_heading = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_speaker_heading', true);

$cmsmasters_event_schedule_title = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_title', true);

$cmsmasters_event_schedule_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_event_schedule_sharing_box', true);

echo '<!-- Start Content  -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr">' . "\n\t";
} else {
	echo '<div class="middle_content entry">';
}


if (have_posts()) : the_post();

	echo '<div class="events_schedule opened-article">';
	?>
	
	<article id="post-<?php the_ID();?>" <?php post_class('cmsmasters_open_event_schedule'); ?>>
		<?php
			if (!post_password_required()) {
				if (has_post_thumbnail()) {
					healthy_living_thumb(get_the_ID(), 'post-thumbnail', false, 'img_' . get_the_ID(), true, true, true, true, false);
				}
			}
			
			
			if ($cmsmasters_event_schedule_time != '') {
				echo '<abbr class="cmsmasters_event_schedule_time">' . esc_html($cmsmasters_event_schedule_time) . '</abbr>' . "\n";
			}
			
			
			if ($cmsmasters_event_schedule_title == 'true') {
				echo '<h2 class="cmsmasters_event_schedule_title entry-title">' . get_the_title(get_the_ID()) . '</h2>' . "\n";
			}
			
			
			if (get_the_content() != '') {
				echo '<div class="cmsmasters_event_schedule_content entry-content">' . "\n";
					
					the_content();
					
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'healthy-living') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => '<span>', 
						'link_after' => '</span>' 
					));
					
				echo '</div>';
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
			
			
			if (
				(get_the_terms(get_the_ID(), 'es-date')) ||
				(get_the_terms(get_the_ID(), 'es-hall'))
			) {
				echo '<div class="cmsmasters_event_schedule_footer">' . 
					'<span class="cmsmasters_event_schedule_date">' . 
						get_the_term_list(get_the_ID(), 'es-date', '', ', ', '') . 
					'</span>' .
					'<span class="cmsmasters_event_schedule_hall">' . 
						get_the_term_list(get_the_ID(), 'es-hall', '', ', ', '') . 
					'</span>' .
				'</div>';
			}
		?>
	</article>
	
	<?php
	if ($cmsmasters_event_schedule_sharing_box == 'true') {
		healthy_living_sharing_box();
	}
	
	
	if (isset($cmsmasters_option['healthy-living' . '_event_schedule_nav_box']) && $cmsmasters_option['healthy-living' . '_event_schedule_nav_box']) {
		healthy_living_prev_next_posts();
	}
	
	
	comments_template(); 	
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!--  Finish Content  -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!--  Start Sidebar  -->' . "\n" . 
	'<div class="sidebar">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!--  Finish Sidebar  -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!--  Start Sidebar  -->' . "\n" . 
	'<div class="sidebar fl">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!--  Finish Sidebar  -->' . "\n";
}


get_footer();

