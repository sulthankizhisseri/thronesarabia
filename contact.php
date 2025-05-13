<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<div class='alert alert-danger'>All fields are required.</div>";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-warning'>Invalid email format.</div>";
        exit;
    }

    // Send email (Modify recipient email)
    $to = "airdroper786@gmail.com"; // Change this to your email
    $email_subject = "New Contact Form Submission: $subject";
    $headers = "From: " . $email . "\r\n" . "Reply-To: " . $email . "\r\n";
    $email_body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<div class='alert alert-success'>Your message has been sent!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to send message.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Invalid request.</div>";
}
?>