<?php
//ini_set('display_errors', 1); // Uncomment for debugging
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$receiving_email_address = 'contact@example.com'; // ***REPLACE with your actual email***

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
    $contact = new PHP_Email_Form;
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact->ajax = true;
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

if ($contact->send()) {
    echo "success";
} else {
    echo "An error occurred while sending the email."; // More generic error
}
?>