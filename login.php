<?php 
// require_once('inculdes/session.php');
	require_once('includes/functions.inc.php');
	require_once('includes/session.php');
	if(isset($_SESSION['userid'])){
		header('location: dashboard');
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php $active= "Log In"; include 'includes/nav.inc.php'; ?>	
	
		<form action="includes/login.inc.php" method="post">

			<div class="login-items">
				<h1 class="login">Log In</h1>
			<input type="text" name="uid" placeholder="Username/Email..." class="inputL"><br>
			<input type="password" name="pwd" placeholder="Password..." class="inputL"><br>
			<button type="submit" name="submit" class="signinSignupButton">Log in</button>
			<a class="forgotPassword" href="sendEmail.php">Forgot Password?</a>
		<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Fill in all fields!</p>";
					}
					else if ($_GET["error"] == "wronglogin") {
						echo "<p>Incorrect login information!</p>";
					}
				}
	
			?>
		</div>
		</form>
		<div class="dontHaveAnAcc">
			<h1>Don't have an account? <a href="signupForm.php">Sign up</a></h1>
		</div>
	
	
	<script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
	

</body>
</html>