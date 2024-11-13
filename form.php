<?php
	include('classes/phpmailer/Mail.class.php');
	$m = new Mail($_POST);
	$m->sendMail();
?>