<?php 
// require_once('inculdes/session.php');
	require_once('includes/functions.inc.php');
require_once('includes/session.php');
if(isset($_SESSION['userid'])){
    		header('location:dashboard.php');
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include 'includes/nav.inc.php' ?>	
	
		<form action="includes/login.inc.php" method="post">

			<div class="login-items">
				<h1 class="login">Log In</h1>
			<input type="text" name="uid" placeholder="Username/Email..." class="inputL"><br>
			<input type="password" name="pwd" placeholder="Password..." class="inputL"><br>
			<button type="submit" name="submit" class="signinSignupButton">Log in</button>
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
	
	

	

</body>
</html>