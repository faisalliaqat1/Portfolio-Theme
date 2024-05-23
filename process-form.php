<?php
// Include WordPress
define('WP_USE_THEMES', true);
require_once('../../../wp-load.php');?>

<?php
session_start();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST["name"]);
    $email = sanitize_email($_POST["email"]);
    $subject = sanitize_text_field($_POST["subject"]);
    $message = sanitize_textarea_field($_POST["message"]);

    // Create post object
    $new_submission = array(
        'post_title' => $name,
        'post_content' => $message,
        'post_type' => 'form_submissions',
        'post_status' => 'publish'
    );

    // Insert the post into the database
    $post_id = wp_insert_post($new_submission);

    // Save additional fields as post meta
    update_post_meta($post_id, 'email', $email);
    update_post_meta($post_id, 'subject', $subject);

    // Set success message
    $_SESSION['form_success_message'] = 'Your message has been sent. Thank you!';
} else {
    // Set error message
    $_SESSION['form_error_message'] = 'An error occurred while processing your request. Please try again later.';
}
