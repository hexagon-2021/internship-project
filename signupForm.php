<?php require_once('includes/functions.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php $active="Sign Up"; include 'includes/nav.inc.php' ?>	
	<form enctype="multipart/form-data" action="includes/signup.inc.php" method="post">
		<div class="signup-items">
			<h1 class="signup">Sign Up</h1>
			<input type="text" name="name" placeholder="Full name..." class="input">
			<input type="text" name="email" placeholder="Email..." class="input">
			<input type="text" name="username" placeholder="Username..." class="input">
			<input type="password" name="pwd" placeholder="Password..." class="input">
			<input type="password" name="pwdRepeat" placeholder="Repeat password..." class="input">
			<input type="text" name="companyName" placeholder="Company name..." class="input">
			<input type="text" name="companyCity" placeholder="Company city..." class="input">
			<input type="text" name="phone_number" placeholder="Phone number..." class="input">
			<input type="file" name="document" placeholder="Dokumenti per vertetim te biznesit" class="input">
			<span style="color: red;font-size: 20px;">Ju lutem te bashkangjitni nje file te formatit PDF, DOCX ose nje foto e cila verteton pronesine e biznesit tuaj!</span>
			<button type="submit" name="submit" class="pointer signinSignupButton">Sign up</button>
			<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Fill in all fields!</p>";
					}
					else if ($_GET["error"] == "invalidemail") {
						echo "<p>Choose a proper email!</p>";
					}
					else if ($_GET["error"] == "invaliduid") {
						echo "<p>Choose a proper username!</p>";
					}
					else if ($_GET["error"] == "passwordsdontmatch") {
						echo "<p>Password doesn't match!</p>";
					}
					else if ($_GET["error"] == "usernametaken") {
						echo "<p>Username already taken!</p>";
					}
					else if ($_GET["error"] == "stmtfailed") {
						echo "<p>Some thing went wrong, try again!</p>";
					}
					else if ($_GET["error"] == "none") {
						echo "<p>You have signed up!</p>";
					}
					else if ($_GET["error"] == "companyNameExists") {
						echo "<p>Company name already taken!</p>";
					} 
					else if ($_GET['error'] == "docfs") {
						echo "<p>Madhesia e file-it eshte shume e madhe!</p>";
					}
					else if ($_GET['error'] == "docerr") {
						echo "<p>Kishte nje error gjate dergimit te file-it</p>";
					}
					else if ($_GET['error'] == "docft") {
						echo "<p>Ky lloj i file-it nuk eshte i suportuar!</p>";
					}
					else if ($_GET['error'] == "FjalkalimiDuhetTiKetSëPaku8Karaktere") {
						echo "<p>Fjalkalimi duhet ti ket së paku 8 karaktere , të përmbaj një shkronjë të madhe një të vogël dhe një numër!</p>";
					}
				}
			?>
		</div>
	</form>
		<div class="haveanAcc">
			<h1>Have an account? <a href="login.php">Log in</a></h1>
		</div>
	<script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
