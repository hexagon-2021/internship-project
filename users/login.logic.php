<?php
require_once('../includes/functions.inc.php');
require_once('../includes/session.php');
	if(isset($_SESSION['realUserid'])){
		header('location: ../');
	}
	if (isset($_POST["submit"])) {
	
		$username = $_POST["uid"];
		$pwd = $_POST["pwd"];

		require_once '../includes/dbh.inc.php';
		require_once '../includes/functions.inc.php';

		if ($username == "admin" && $pwd == "admin") {
			$_SESSION['admin'] = "admin";
		}
		
		if (emptyInputLogin($username, $pwd) !== false) {
			header("location: login.php?error=emptyinput");
			exit();
		}

		loginRealUser($conn, $username, $pwd);
	}
	else{
		header("location: login.php");
		exit();
	}
