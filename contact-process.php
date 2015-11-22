<?php 

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$email_body = "";

$email_body = $email_body . "Name: " . $name . "/n";
$email_body = $email_body . "E-Mail: " . $email . "/n";
$email_body = $email_body . "Message: " . $message;

// TODO SEND EMAIL

header("Location: contact-thanks.php");