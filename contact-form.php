<?php
// If you are using Composer
require 'vendor/autoload.php';

// If you are not using Composer (recommended)
// require("path/to/sendgrid-php/sendgrid-php.php");

$name = $_POST['name']; 
$message = $_POST['message'];
$email = $_POST['email'];
$thankyou = 'Thank you! Redirecting you back to my portfolio...';

$from = new SendGrid\Email($name, "clint.mossman@gmail.com");
$subject = "Portfolio Message";
$to = new SendGrid\Email(null, "clint.mossman@gmail.com");
$content = new SendGrid\Content("text/plain", $message + $email);
$mail = new SendGrid\Mail($from, $subject, $to, $content,);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
sleep(3);
echo $thankyou;
header('Location: https://clintmossman-portfolio.herokuapp.com/');
exit();
// echo $response->statusCode();
// echo $response->headers();
// echo $response->body();

?>