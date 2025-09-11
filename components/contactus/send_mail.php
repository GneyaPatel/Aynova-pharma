<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captcha validation (7+5=12)
    if (empty($_POST["captcha_input"]) || $_POST["captcha_input"] != 12) {
        echo "<p style='color:red;'>Captcha is incorrect. Please try again.</p>";
        exit;
    }

    // Collect form data
    $name    = htmlspecialchars($_POST["name"]);
    $email   = htmlspecialchars($_POST["email"]);
    $phone   = htmlspecialchars($_POST["phone"]);
    $country = htmlspecialchars($_POST["country"]);
    $message = htmlspecialchars($_POST["message"]);

    // Recipient email
    $to = "ayunovapharmaceutical@gmail.com";

    // Email subject
    $subject = "New Inquiry from Website Contact Form";

    // Email body
    $body = "
    You have received a new message from your website form:

    Name: $name
    Email: $email
    Phone: $phone
    Country: $country

    Message:
    $message
    ";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<p style='color:green;'>Thank you! Your message has been sent successfully.</p>";
    } else {
        echo "<p style='color:red;'>Sorry, your message could not be sent. Please try again later.</p>";
    }
}
?>
