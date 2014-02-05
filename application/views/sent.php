<?php

//Spam Check
function spamcheck($field)
{
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
	if(filter_var($field, FILTER_VALIDATE_EMAIL))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
};

//Check if necessary fields are missing
if (!isset($_REQUEST["name"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["contact"]) || !isset($_REQUEST["message"])){

	$icon = "exclamation-triangle";
	$status = "WHY ARE YOU HERE?";
	$text = "It seems like you've ventured into the wrong place...";

} else {

	//Spam Checking
	$mailcheck = spamcheck($_REQUEST['email']);
	if ($mailcheck==FALSE)
	{
		
		$icon = "exclamation-triangle";
		$status = "Error Detected!";
		$text = "Something is wrong with your data, please try again."; 

	} else {

	//Composing data

		$message = "";
		$message .= "<strong>LX2 Inquiry</strong><br><br>";
		$message .= "===================================<br><br>";
		$message .= "<strong>Name</strong> : " 		. trim(preg_replace("/\s\s+/", " ", $_REQUEST["name"])) . "<br><br>";
		$message .= "<strong>Email</strong> : " 		. trim(preg_replace("/\s\s+/", " ", $_REQUEST["email"])) . "<br><br>";
		$message .= "<strong>Company</strong> : " 	. trim(preg_replace("/\s\s+/", " ", $_REQUEST["company"])) . "<br><br>";
		$message .= "<strong>Contact</strong> : " 	. trim(preg_replace("/\s\s+/", " ", $_REQUEST["contact"])) . "<br><br>";
		$message .= "<strong>Message</strong> : " 	. trim(preg_replace("/\s\s+/", " ", $_REQUEST["message"])) . "<br><br>";

         //HTML EMAIL TAG 
		$headers = "";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		//Sending mail
		if(mail('lucian0014@live.co.uk', 'LX2 Inquiry', $message, $headers)){

			$icon = "check";
			$status = "Mail successfully sent!";
			$text = "We will get back to you soon!"; 
		
		} else {

			//Sending failed
			$icon = "times";
			$status = "Error Occured";
			$text = "The mail is not sent, please try again later.<br>We are sorry for the incoviniences caused!"; 

		};

	};
	
};

?>

<div class="container about">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="block b100"></div>
			<div class="fa fa-4x fa-<?= $icon ?>"></div>
			<h1><?= $status ?></h1>
			<p><?= $text; ?></p>
			<div class="block"></div>

		</div>
	</div>

	

	<div class="block b100"></div>
</div>
<hr class="nomargin">