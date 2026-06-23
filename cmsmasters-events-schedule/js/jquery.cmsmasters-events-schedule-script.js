/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version 	1.1.7
 * 
 * Events Schedule Scripts
 * Created by CMSMasters
 * 
 */


"use strict";

jQuery(document).ready(function() { 
	/* Events Schedule Hover */
	(function ($) { 
		$(".cmsmasters_event_schedule .cmsmasters_event_schedule_cont").on("mouseenter mouseleave", function(e) {
			if ($(window).width() >= (768 - 17)) {
				var active_event = $(this);
				
				active_event.removeClass('cmsmasters_hover_tab');
				
				
				if (e.type == "mouseenter") {
					active_event.addClass('cmsmasters_hover_tab');
					
					setTimeout(function () { 
						if (active_event.hasClass('cmsmasters_hover_tab')) {
							active_event.find('.cmsmasters_event_schedule_content_wrap').stop().slideDown(400);
						}
					}, 200);
				} else {
					active_event.removeClass('cmsmasters_hover_tab');
					
					active_event.find('.cmsmasters_event_schedule_content_wrap').stop().slideUp(400);
				}
			}
		});
	} )(jQuery);
} );