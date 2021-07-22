<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
		.contactUs{
 			text-align: center;
  			color: #bb371a;
  			font-family: Arial, Helvetica, sans-serif;
		}
		.contactUsTxt{
  			text-align: center;
  			color: #eba83a;
  			font-family: Arial, Helvetica, sans-serif;
		}
		.contactField{
   			border: solid 1px #eba83a;
    		text-align: center;
    		margin-left: 15%;
   			margin-right: 15%;
   			color: #eba83a;
		}
		.contactField h1{
			margin-bottom:0px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 25px;
		}
		.inputC {
			margin-top: 10px;
			padding-top: 10px;
			padding-bottom: 15px;
			padding-left: 25px;
			border-radius: 0.7rem;
			border: 1px solid var(--secondary-color);
			color: #eba83a;
 			font-size: 15px;
			font-weight: bold;
			/*padding-left: 15%;*/
			padding-right: 15%;
		}
		.contactButton {
  			margin-top: 20px;
  			padding-top: 20px;
  			padding-bottom: 20px;
  			background-color: #eba83a;
				border-radius: 0.7rem;
  			border: 1px solid var(--secondary-color);
  			/* box-shadow: 12px 12px 10px 1px rgba(0, 0, 255, 0.2); */
  			color: white;
  			/*font-family: Arial, Helvetica, sans-serif;*/
  			font-size: 20px;
  			font-weight: bold;
  			font-family: Arial, Helvetica, sans-serif;
  			padding-left: 15%;
  			padding-right: 15%;
  			margin-bottom: 15px;
		}
		.contactButton:hover {
		  background-color: #bb371a;
		}
		.pointer {
		  cursor: pointer;
		}

		::placeholder {
		  color: #eba83a;
		  font-size: 15px;
		}
	</style>
</head>
<body>
	<?php $active = "Kontakto"; include 'includes/session.php'; include 'includes/nav.inc.php'; ?>
	<div style="clear: both;">
		<form method="POST" action="includes/contact.inc.php">
			<h1 class="contactUs">Contact Us</h1>
			<h1 class="contactUsTxt">
				Keni ndonje pyetje? Do te ishte nje kenaqsi per ne qe te degjonim nga ju. <br /> Na dergoni nje mesazh dhe ne do t'ju kthehemi sa me shpejt! 
			</h1>

			<div class="contactField">
				<h1>Name</h1>
				<input type="text" name="name" placeholder="Name" class="inputC">
				<h1>Email addres</h1>
				<input type="text" name="email" placeholder="Email" class="inputC">
				<h1>Message</h1>
				<input type="text" name="message" placeholder="Message" class="inputC"><br>
				<button type="submit" name="submit" class="contactButton pointer">Dergo Mesazh</button>
			</div>
		</form>
	</div>
	<script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>
</html>
