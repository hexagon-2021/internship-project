<?php

if (isset($_POST["submit"])) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];
	$companyName = $_POST["companyName"];
	$companyCity = $_POST["companyCity"];
	$phone_number = $_POST["phone_number"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($name, $email, $pwd, $pwdRepeat, $companyName, $companyCity, $phone_number, $username) !== false) {
		header("location: ../signupForm.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../signupForm.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../signupForm.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd,$pwdRepeat) !== false ){
		header("location: ../signupForm.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn, $username, $email) !== false) {
		header("location: ../signupForm.php?error=usernametaken");
		exit();
	}
	if (companyNameExists($conn, $companyName) !== false ){
		header("location: ../signupForm.php?error=companyNameExists");
		exit();
	}

	createUser($conn, $name, $email, $username, $pwd, $companyName, $companyCity, $phone_number);
}
else{
	header("location: ../signupForm.php");
	exit();
}