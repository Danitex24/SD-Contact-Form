<?php
// use [cf_shortcode] to display result for users

function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );


// add_action( 'init', 'sd_add_custom_shortcode' );
 
// function sd_add_custom_shortcode() {
// 	// use [sd_show_form] to display result for users
//     add_shortcode( 'sd_show_form', 'sd_show_results' );
// }

// add_action( 'init', 'sd_do_custom_shortcode' );
 
// function sd_do_custom_shortcode() {
// 	// use [sd_show_emails_record] to display result for users
//     add_shortcode( 'sd_show_emails_record', 'sd_email_record' );
// }