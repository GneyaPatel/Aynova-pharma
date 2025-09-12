<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $to      = "yourmail@example.com";  // Change this
    $subject = "New Contact Form Submission";
    $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: no-reply@yourdomain.com\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    // This will show if someone opens send_mail.php directly
    http_response_code(405);
    echo "Method Not Allowed";
}
?>