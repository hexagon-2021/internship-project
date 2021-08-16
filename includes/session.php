<?php
	session_start();
	function errorMessage(){
		if(isset($_SESSION["errorMessage"])){
			$output = "<div class=\"errorMessageChangePassword\">".htmlentities($_SESSION["errorMessage"])."</div>";
			$_SESSION["errorMessage"] = null;
			return $output;
		}
	}
	
	function successMessage(){
		if(isset($_SESSION["successMessage"])){
			$output = "<div class=\"errorMessageChangePassword\">".htmlentities($_SESSION["successMessage"])."</div>";
			$_SESSION["successMessage"] = null;
			return $output;
		}
	}
?>