<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$message = trim($_POST["message"]);

	if ($name == "" OR $email == "" OR $message == "") {
		echo "You must specify a value for name, email, and message.";
		exit;
		}

	foreach( $_POST as $value){
		if (stripos($value,'Content-Type:') !== FALSE ){
			echo "There was a problem with the information you entered.";
			exit;
		}
	}

	if ($_POST["address"] != "") {
		echo "Your form submission has an error.";
		exit;
	}

require_once('inc/class.phpmailer.php');
$mail = new PHPMailer();
if(!$mail->ValidateAddress($email)){
	echo "You must specify a valid email address.";
	exit;
}


$email_body = "";

$email_body = $email_body . "Name: " . $name . "<br>";
$email_body = $email_body . "E-Mail: " . $email . "<br>";
$email_body = $email_body . "Message: " . $message;


$mail->AddReplyTo($email, $name);
$mail->SetFrom($email, $name);
$address = "fake@notarealwebsite.com";
$mail->AddAddress($address, "Lou's Cellar Webmaster");
$mail->Subject = "Lou's Cellar Contact Form Submission";
$mail->MsgHTML($email_body);


if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
} 

header("Location: contact.php?status=thanks");
exit;
}

//END OF CONTACT PROCESS

?><?php
require_once('inc/database.php');
$pageTitle = "Lou's Cellar - Contact Us";
$section = "contact";
include('inc/header.php');
?>

<!-- Start -->

<div class="wrapper">

	<h1> Contact </h1>

	<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>

		<p> Thank you for contacting us! 
			We'll get back to you as soon as possible.</p>

	<?php } else { ?>

	<p>Do you love local wines and beers? 
		Found something new I haven't added? Are you a brewer?</br>
		Send me a note about your drinking adventures!</p>

	<form method="post" action="contact.php">
		<table class="contacttable"><tr>
		<td><label for="name">Name: </label></td>
			<td><input type="text" name="name" id="name"></td></tr>
		<tr><td><label for="email">Email: </label></td>
			<td><input type="text" name="email" id="email"></td></tr>
		<tr><td><label for="message">Message: </label></td>
			<td><textarea name="message" id="message"></textarea></td></tr>
		<tr style="display: none;"><td><label for="address">Address: </label></td>
			<td><input type="text" name="address" id="address">
				<p>If you are a human, please leave this field blank.</p></td></tr>
	</table>

	<input class="success button" type="submit" value="Send">
	</form>
	<?php } ?>
</div>

<!-- End -->


<?php
include('inc/footer.php');
?>