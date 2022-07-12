<?php
//add form
function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" name="sd-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["sd-name"] ) ? esc_attr( $_POST["sd-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" name="sd-email" value="' . ( isset( $_POST["sd-email"] ) ? esc_attr( $_POST["sd-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
    echo '<p>';
	echo 'State<br/>';
    echo '<select name="sd-state" id="state">';
    echo '<option value="' . ( isset( $_POST["sd-state"] ) ? esc_attr( $_POST["sd-state"] ) : '' ) . '" > Select';
	echo '</option>';
    echo '</select>';
	echo '</p>';
    echo '<p>';
	echo 'Subject (required) <br/>';
	echo '<input type="text" name="sd-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["sd-subject"] ) ? esc_attr( $_POST["sd-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" name="sd-message">' . ( isset( $_POST["sd-message"] ) ? esc_attr( $_POST["sd-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="sd-submitted" value="Send"></p>';
	echo '</form>';
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['sd-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["sd-name"] );
		$email   = sanitize_email( $_POST["sd-email"] );
		$subject = sanitize_text_field( $_POST["sd-subject"] );
		$message = esc_textarea( $_POST["sd-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Thanks for contacting me, expect a response soon.</p>';
			echo '</div>';
		} else {
			echo 'An unexpected error occurred';
		}
	}
}