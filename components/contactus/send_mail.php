<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values safely
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $phone   = htmlspecialchars($_POST['phone'] ?? '');
    $country = htmlspecialchars($_POST['country'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Your email (change this 👇)
    $to = "gneyapatel81202@outlook.com";

    // Subject
    $subject = "New Contact Form Submission from $name";

    // Email body
    $body  = "You have received a new message from the contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Country: $country\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers  = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('✅ Your message has been sent successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('❌ Sorry, your message could not be sent. Please try again later.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}