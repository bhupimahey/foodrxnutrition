/**
 * @package 	WordPress
 * @subpackage 	Healthy Living
 * @version		1.0.0
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 

/* 
// For Change Fields in Shortcodes

var sc_name_new_fields = {};


for (var id in cmsmastersShortcodes.sc_name.fields) {
	if (id === 'field_name') { // Delete Field
		delete cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Delete Field Attribute
		delete cmsmastersShortcodes.sc_name.fields[id]['field_attribute'];  
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add/Change Field Attribute
		cmsmastersShortcodes.sc_name.fields[id]['field_attribute'] = 'value';
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else if (id === 'field_name') { // Add Field (before the field as found, add new field)
		sc_name_new_fields['field_name'] = { 
			type : 		'rgba', 
			title : 	composer_shortcodes_extend.sc_name_field_custom_bg_color, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		};
		
		
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	} else { // Allways add this in the bottom
		sc_name_new_fields[id] = cmsmastersShortcodes.sc_name.fields[id];
	}
}


cmsmastersShortcodes.sc_name.fields = sc_name_new_fields; 
*/



/**
 * Theme Shortcodes
 */
 
var cmsmastersShortcodes_new_shortcode = {};


for (var id in cmsmastersShortcodes) {
	if (id === 'cmsmasters_notice') {
		/* Menu */
		cmsmastersShortcodes_new_shortcode['instagram-feed'] = { 
			title : 	composer_shortcodes_extend.instagram_feed_title, 
			icon : 		'admin-icon-image', 
			pair : 		false, 
			content : 	false, 
			visual : 	false, 
			multiple : 	false, 
			def : 		'',  
			fields : { 
				// id
				id : { 
					type : 		'input', 
					title : 	composer_shortcodes_extend.id_instagram_feed_title, 
					descr : 	composer_shortcodes_extend.id_instagram_feed_descr, 
					def : 		'', 
					required : 	false, 
					width : 	'half' 
				} 
			} 
		};
		
		
		cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
	} else {
		cmsmastersShortcodes_new_shortcode[id] = cmsmastersShortcodes[id];
	}
}


cmsmastersShortcodes = cmsmastersShortcodes_new_shortcode;



/**
 * Posts Slider Extend
 */

var posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];
		
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = posts_slider_new_fields;



/**
 * Posts Slider Extend
 */

var posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes 
		};
		
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = posts_slider_new_fields;



/**
 * Heading Extend
 */

var cmsmasters_heading_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_heading.fields) {
	if (id === 'animation') {
		cmsmasters_heading_new_fields['custom_check'] = { 
			type : 		'checkbox', 
			title : 	composer_shortcodes_extend.heading_field_custom_check, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half',  
			choises : { 
				'true' : cmsmasters_shortcodes.choice_enable 
			}
		};
		cmsmasters_heading_new_fields['width_monitor'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_field_width_monitor, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.heading_field_size_zero_note + "</span>", 
			def : 		'767', 
			required : 	false, 
			width : 	'number', 
			min : 		'320', 
			depend : 	'custom_check:true' 
		};
		cmsmasters_heading_new_fields['custom_font_size'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_field_custom_font_size, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.heading_field_size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'custom_check:true' 
		};
		cmsmasters_heading_new_fields['custom_line_height'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_field_custom_line_height, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + composer_shortcodes_extend.heading_field_size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'custom_check:true' 
		};
		
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	} else {
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_heading.fields = cmsmasters_heading_new_fields;

