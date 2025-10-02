<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your_email@example.com"; // **This is where you set the owner's email**
    $subject = "Contact Form Submission";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message: $message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message!";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
} else {
    header("HTTP/1.1 403 Forbidden");
    echo "You are not allowed to access this page directly.";
}
?>
