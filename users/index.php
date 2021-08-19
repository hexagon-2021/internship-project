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
<center>
		<button id="userRegister" value="Regjistrohu Si Biznes" class="ndrroRegjistriminBtn">Regjistrohu Si Biznes</button>
</center>
	

	<div class="formChange" id="formChange-div">

	<form enctype="multipart/form-data" action="action.php" method="post" id="registerUi" style="display: block;">
		<div class="signup-items">
			<h1 class="signup">Regjistrimi Per Klient</h1>
			<input type="text" name="name" placeholder="Emri i plot..." class="input">
			<input type="text" name="email" placeholder="Email..." class="input">
			<input type="text" name="username" placeholder="Emri..." class="input">
			<input type="password" name="pwd" placeholder="Fjalekalimi..." class="input">
			<input type="password" name="pwdRepeat" placeholder="Perserit fjalekalimin..." class="input">
			<input type="text" name="phone_number" placeholder="Numri i telefonit..." class="input">
			<button type="submit" name="submit" class="pointer signinSignupButton">Regjistrohu</button>
			<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Mbushni te gjitha fushat!</p>";
					}
					else if ($_GET["error"] == "invalidemail") {
						echo "<p>Zgjidhni nje email te rregullt!</p>";
					}
					else if ($_GET["error"] == "invaliduid") {
						echo "<p>Zgjidhni nje emer te rregullt!</p>";
					}
					else if ($_GET["error"] == "passwordsdontmatch") {
						echo "<p>Fjalkalimi nuk pershtatet!</p>";
					}
					else if ($_GET["error"] == "usernametaken") {
						echo "<p>Emri i perdoruesit ekziston!</p>";
					}
					else if ($_GET["error"] == "stmtfailed") {
						echo "<p>Diqka shkoj gabim , provo perseri!</p>";
					}
					else if ($_GET["error"] == "none") {
						echo "<p>Ju jeni regjistruar!</p>";
					} 
					else if ($_GET['error'] == "FjalkalimiDuhetTiKetSëPaku8Karaktere") {
						echo "<p>Fjalekalimi duhet ti ket së paku 8 karaktere , të përmbaj një shkronjë të madhe një të vogël dhe një numër!</p>";
					}
				}
			?>
		</div>
	</form>
		<div class="haveanAcc" id="haveanAccUsrers" style="display: block;">
			<h1>Keni llogari? <a href="login.php">Regjistrohu</a></h1>
		</div>




		<form enctype="multipart/form-data" action="../includes/signup.inc.php" method="post" id="registerBu" >
		<div class="signup-items">
			<h1 class="signup">Regjistrimi Per Biznes</h1>
			<input type="text" name="name" placeholder="Emri i plot..." class="input">
			<input type="text" name="email" placeholder="Email..." class="input">
			<input type="text" name="username" placeholder="Emri..." class="input">
			<input type="password" name="pwd" placeholder="Fjalekalimi..." class="input">
			<input type="password" name="pwdRepeat" placeholder="Perserit fjalekalimin..." class="input">
			<input type="text" name="companyName" placeholder="Emri i kompanis..." class="input">
			<input type="text" name="companyCity" placeholder="Qyteti i kompanis..." class="input">
			<input type="text" name="phone_number" placeholder="Numri i telefonit..." class="input">
			<input type="file" name="document" placeholder="Dokumenti per vertetim te biznesit" class="input">
			<span style="color: red;font-size: 20px;">Ju lutem te bashkangjitni nje file te formatit PDF, DOCX ose nje foto e cila verteton pronesine e biznesit tuaj!</span>
			<button type="submit" name="submit" class="pointer signinSignupButton">Regjistrohu</button>
			<?php
				if (isset($_GET["error"])) {
					if ($_GET["error"] == "emptyinput") {
						echo "<p>Mbush te gjitha fushat!</p>";
					}
					else if ($_GET["error"] == "invalidemail") {
						echo "<p>Zgjedh nje email te rregullt!</p>";
					}
					else if ($_GET["error"] == "invaliduid") {
						echo "<p>Zgjedh nje emer te rregullt!</p>";
					}
					else if ($_GET["error"] == "passwordsdontmatch") {
						echo "<p>Fjalkalimi nuk pershtatet!</p>";
					}
					else if ($_GET["error"] == "usernametaken") {
						echo "<p>Emri i perdoruesit ekziston!</p>";
					}
					else if ($_GET["error"] == "stmtfailed") {
						echo "<p>Diqka shkoj gabim , provoni perseri!</p>";
					}
					else if ($_GET["error"] == "none") {
						echo "<p>Jeni regjistruar!</p>";
					}
					else if ($_GET["error"] == "companyNameExists") {
						echo "<p>Emri i kompanis i zen!</p>";
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
						echo "<p>Fjalekalimi duhet ti ket së paku 8 karaktere , të përmbaj një shkronjë të madhe një të vogël dhe një numër!</p>";
					}
				}
			?>
		</div>
	</form>
		<div class="haveanAcc" id="haveanAccBusiness" >
			<h1>Keni llogari? <a href="login.php">Kyqu</a></h1>
		</div>


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
