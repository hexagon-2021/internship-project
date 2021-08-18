<?php

if (isset($_POST["submit"])) {

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];
	$companyName = $_POST["companyName"];
	$companyCity = $_POST["companyCity"];
	$phone_number = $_POST["phone_number"];
	
	$file = $_FILES['document'];

	if (emptyInputSignup($name, $email, $pwd, $pwdRepeat, $companyName, $companyCity, $phone_number, $username) !== false) {
		header("location: ../users/index.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../users/index.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../users/index.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd,$pwdRepeat) !== false ){
		header("location: ../users/index.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn, $username, $email) !== false) {
		header("location: ../users/index.php?error=usernametaken");
		exit();
	}
	if (companyNameExists($conn, $companyName) !== false ){
		header("location: ../users/index.php?error=companyNameExists");
		exit();
	}
	
	if( 
        ctype_alnum($pwd) // numbers & digits only 
        && strlen($pwd)>6 // at least 7 chars 
        && strlen($pwd)<21 // at most 20 chars 
        && preg_match('`[A-Z]`',$pwd) // at least one upper case 
        && preg_match('`[a-z]`',$pwd) // at least one lower case 
        && preg_match('`[0-9]`',$pwd) // at least one digit 
        ) {
		
			// echo "bravo";
	}else{
		header("location: ../users/index.php?error=FjalkalimiDuhetTiKetSëPaku8Karaktere");
		exit();
	}

	$document_name = check_upload_image($file);
	createUser($conn, $name, $email, $username, $pwd, $companyName, $companyCity, $phone_number, $document_name);
}
else{
	header("location: ../users/index.php");
	exit();
}
