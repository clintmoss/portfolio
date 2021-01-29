<?php
// If you are using Composer
require 'vendor/autoload.php';

// If you are not using Composer (recommended)
// require("path/to/sendgrid-php/sendgrid-php.php");

$name = $_POST['name']; 
$message = $_POST['message'];
$email = $_POST['email'];
$thankyou = "Thank you! Redirecting you back to my portfolio...";

$from = new SendGrid\Email($name, "clint.mossman@gmail.com");
$subject = "Portfolio Message";
$to = new SendGrid\Email(null, "clint.mossman@gmail.com");
$content = new SendGrid\Content("text/plain", $message . "\n\nEmail: " . $email);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo "<div style='height:100vh;width:100vw;background-color:#e7e7e7;display:flex;align-items:center;justify-content:center;'><h1 style='color:##1d2d50;font-size:5em;'>{$thankyou}</h1></div>" ;
echo"<script>setTimeout(\"location.href = 'https://clintmossman-portfolio.herokuapp.com/';\",1500);</script>";


?>