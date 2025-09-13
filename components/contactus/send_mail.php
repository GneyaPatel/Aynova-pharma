<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize inputs
    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Receiver email address
    $to      = "patelgneya2180@gmail.com";  // 👉 Replace with your real email
    $subject = "New Contact Form Submission";

    // Email content
    $body  = "You have a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers  = "From: no-reply@yourdomain.com\r\n"; // use your domain email
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send email. Check server mail configuration.";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
