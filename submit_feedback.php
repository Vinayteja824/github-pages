<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);

    $to = "alexcostaac5535@gmail.com"; 
    $subject = "New Customer Feedback from $name";
    $message = "
        <html>
        <head>
            <title>Customer Feedback</title>
        </head>
        <body>
            <h2>New Feedback Received</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Rating:</strong> $rating</p>
            <p><strong>Comments:</strong> $comments</p>
        </body>
        </html>
    ";

    // Headers for email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error sending feedback. Please try again later.'); window.location.href='index.html';</script>";
    }
}
?>
