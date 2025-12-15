<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address');history.back();</script>";
        exit;
    }

    $to = "primeinteriors.works@gmail.com";
    $subject = "New Website Notification Subscription";
    $message = "New subscriber email:\n\n" . $email;
    $headers = "From: Prime Interiors <noreply@primeinteriors.works>";

    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Thank you! You will be notified.');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Email could not be sent.');history.back();</script>";
    }
}
?>