<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data from form
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Specify your email here
    $to = 'mohamedbouhaja106@gmail.com';

    // Construct email subject
    $subject = 'Contact Form Submission from ' . $name;

    // Construct email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";

    // Email Headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
} else {
    // Not a POST request, redirect to form or display an error
    header('Location: contact-form.html');
    // Or you can display an error
    // echo "Invalid Request";
}
?>
