<?php

require_once('session.php');
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $companyName, $companyCity, $phone_number){
	$result;
	if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($companyName) || empty($companyCity) || empty($phone_number) || empty($username)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function invalidUid($username){
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidEmail($email){
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat){
	$result;
	if ($pwd !== $pwdRepeat) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username, $email){
	$sql = "SELECT * FROM business WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../users/index.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function companyNameExists($conn, $companyName){
	$sql = "SELECT * FROM business WHERE company_name = ? ;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../users/index.php?error=companyNameExists");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $companyName);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $pwd, $companyName, $companyCity, $phone_number, $document_name){
	$sql = "INSERT INTO business (  username, password ,email,company_name, company_city, phone_number, name, document_name, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../users/index.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	$status = 'Pending';
	mysqli_stmt_bind_param($stmt, "sssssssss", $username,$hashedPwd,$email, $companyName,    $companyCity, $phone_number,$name, $document_name, $status);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../users/index.php?error=none");
		exit();
}

function check_upload_image($file) {
	$file_name = $_FILES['document']['name'];
	$file_tmp_name = $_FILES['document']['tmp_name'];
	$file_size = $_FILES['document']['size'];
	$file_error = $_FILES['document']['error'];
	$file_type = $_FILES['document']['type'];

	$file_ext = explode(".", $file_name);
	$file_actual_ext = strtolower(end($file_ext));

	$allowed = array('jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf');

	if (in_array($file_actual_ext, $allowed)) {
		if ($file_error === 0) {
			if ($file_size < 5000000) {
				$file_name_new = uniqid('', true).".".$file_actual_ext;
				$file_destination = 'proofs/'.$file_name_new;
				move_uploaded_file($file_tmp_name, $file_destination);
			} else {
				header("Location: ../users/index.php?docfs");
				exit();
			}
		} else {
			header("Location: ../users/index.php?docerr");
			exit();
		}
	} else {
		header("Location: ../users/index.php?docft");
		exit();
	}

	return $file_name_new;
}


function emptyInputLogin($username, $pwd){
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd){
	$uidExists = uidExists($conn, $username, $username);

	if ($uidExists === false) {
		header("location: ../users/index.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["password"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../users/index.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true) {
		
		$_SESSION["userid"] = $uidExists["id"];
		$_SESSION["username"] = $uidExists["username"];
		header("location: ../dashboard");
		exit();
	}
}
function confirmLogin(){
	if(isset($_SESSION['userid'])){
		return true;
	}else{
		//$_SESSION["errorMessage"] = "Login is Required";
		header("location: ../login.php");
	}
}

function emptyContacInput($name, $email, $message){
	$result;
	if(empty($name) || empty($email) || empty($message)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function createMessage($conn, $name, $email, $message){
	$sql = "INSERT INTO contact_us (name , email , message) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../contact.php?error=stmtfailed");
		exit();
	}

	

	mysqli_stmt_bind_param($stmt, "sss", $name, $email , $message);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../contact.php?error=none");
		exit();
}


function sendInboxMessage($conn, $sender_id, $receiver_id, $subject, $message, $date) {
	mysqli_query($conn, "INSERT INTO inbox (sender_id, receiver_id, subject, message, data) VALUES ('$sender_id', '$receiver_id', '$subject', '$message', '$date');");
}
function createUsers($conn, $name, $email, $username, $pwd, $phone_number){
	$sql2 = "INSERT INTO users (  username, password ,email, phone_number, full_name) VALUES (?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql2)) {
		header("location: ../users/index.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssss", $username,$hashedPwd,$email,$phone_number,$name);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../users/index.php?error=none");
		exit();
}
function emptyInputSignupUsers($name, $email, $username, $pwd, $pwdRepeat,  $phone_number){
	$result;
	if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)  || empty($phone_number) || empty($username)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}
function usersUidExists($conn, $username, $email){
	$sql2 = "SELECT * FROM users WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql2)) {
		header("location: ../users/index.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}
function loginRealUser($conn, $username, $pwd){
	$uidExists = usersUidExists($conn, $username, $username);

	if ($uidExists === false) {
		header("location: ../users/login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["password"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../users/login.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true) {
		
		$_SESSION["realUserid"] = $uidExists["id"];
		$_SESSION["username"] = $uidExists["username"];
		header("location: ../");
		exit();
	}
}

