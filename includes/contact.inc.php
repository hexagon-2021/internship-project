<?php

if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyContacInput($name , $email , $message) !== false) {
		header("location: ../contact.php?error=emptyinput");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../contact.php?error=invalidemail");
		exit();
	}

	createMessage($conn, $name, $email, $message);
}