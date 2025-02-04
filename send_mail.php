<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@skymed.com";  // Replace with your actual email
    $userEmail = $_POST["email"];
    $subject = "New Lead Captured: Meta Ads Campaign";

    $message = "
    <html>
    <head>
        <title>New Lead Captured</title>
    </head>
    <body>
        <p>Dear SkyMed Essentials Team,</p>
        <p>You’ve just received a new lead from the Meta Ads campaign landing page! Here are the details:</p>
        <p><strong>Email Address:</strong> $userEmail</p>
        <p>This user expressed interest in learning more about SkyMed travel services and potential savings. Please ensure they are contacted within the next 24 hours to maximize engagement and conversion opportunities.</p>
        <p>Thank you for following up promptly!</p>
    </body>
    </html>
    ";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: SkyMed Essentials email@skymedessentials.com";  // Replace with your sender email

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "success";  // Response for JavaScript
    } else {
        echo "error";
    }
}
?>