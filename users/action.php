<?php

if (isset($_POST["submit"])) {

	require_once '../includes/dbh.inc.php';
	require_once '../includes/functions.inc.php';
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];
	$phone_number = $_POST["phone_number"];
	
	

	if (emptyInputSignupUsers($name, $email, $pwd, $pwdRepeat, $phone_number, $username) !== false) {
		header("location: view.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: view.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: view.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($pwd,$pwdRepeat) !== false ){
		header("location: view.php?error=passwordsdontmatch");
		exit();
	}
	if (usersUidExists($conn, $username, $email) !== false) {
		header("location: view.php?error=usernametaken");
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
		header("location: view.php?error=FjalkalimiDuhetTiKetSëPaku8Karaktere");
		exit();
	}

	
	createUsers($conn, $name, $email, $username, $pwd,  $phone_number);
}
else{
	header("location:login.php");
	exit();
}
