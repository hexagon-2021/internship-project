<!DOCTYPE html>
<html>
<head>
	<title></title>
	 
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <style type="text/css">
	 	body {
  			background-color: var(--fourth-color);
		}
	 </style>
	 <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<?php $active = 'Ballina'; include '../includes/nav.inc.php'; ?>
	<form enctype="multipart/form-data" action="action.php" method="post">
		<div class="signup-items">
			<h1 class="signup">User Sign Up</h1>
			<input type="text" name="name" placeholder="Full name..." class="input">
			<input type="text" name="email" placeholder="Email..." class="input">
			<input type="text" name="username" placeholder="Username..." class="input">
			<input type="password" name="pwd" placeholder="Password..." class="input">
			<input type="password" name="pwdRepeat" placeholder="Repeat password..." class="input">
			<input type="text" name="phone_number" placeholder="Phone number..." class="input">
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
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>
