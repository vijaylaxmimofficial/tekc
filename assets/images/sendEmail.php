<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "tekzowdevelopers@gmail.com"; // Replace with your email
    // $subject = "New Contact Form Submission"; // Define the subject
    $messageBody = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    $headers = "From: tekzow@gmail.com"; // Replace with sender email

    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Method not allowed.";
}
?>
