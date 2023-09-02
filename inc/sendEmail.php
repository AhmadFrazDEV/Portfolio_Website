<?php

// Replace this with your own email address
$siteOwnersEmail = 'chahmad2004@gmail.com';

$error = array();

if ($_POST) {
    $name = trim($_POST['contactName']);
    $email = trim($_POST['contactEmail']);
    $subject = trim($_POST['contactSubject']);
    $contact_message = trim($_POST['contactMessage']);

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Please enter your name.";
    }
    
    // Check Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please enter a valid email address.";
    }
    
    // Check Message
    if (strlen($contact_message) < 15) {
        $error['message'] = "Please enter your message. It should have at least 15 characters.";
    }
    
    // Subject
    if (empty($subject)) {
        $subject = "Contact Form Submission";
    }

    // Set Message
    $message = "Email from: " . $name . "<br />";
    $message .= "Email address: " . $email . "<br />";
    $message .= "Message: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

    // Set From: header
    $from = $name . " <" . $email . ">";

    // Email Headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (empty($error)) {
        $mail = mail($siteOwnersEmail, $subject, $message, $headers);

        if ($mail) {
            echo "OK";
        } else {
            echo "Something went wrong. Please try again.";
        }
    } else {
        $response = '';
        foreach ($error as $err) {
            $response .= $err . "<br />";
        }
        echo $response;
    }
}

?>
