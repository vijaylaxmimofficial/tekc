<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
    $message = htmlspecialchars(trim($_POST['message']));
    $save = htmlspecialchars(trim($_POST['save']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate phone number format
    if (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
        echo "Invalid phone number format.";
        exit;
    }

    // Construct the email message
    $to = "tekzowdevelopers@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $messageBody = "Name: $name\nEmail: $email\nPhone Number: $phoneNumber\nMessage: $message\nSave: $save";
    $headers = "From: noreply@yourdomain.com"; // Replace with a valid sender email

    // Log email sending attempts (for debugging)
    error_log("Attempting to send email to $to with subject $subject");

    // Send the email
    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
        error_log("Failed to send email.");
    }
} else {
    echo "Method not allowed.";
    error_log("Invalid request method.");
}
?>
