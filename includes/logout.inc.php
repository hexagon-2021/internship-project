<?php require_once("functions.inc.php") ?>
<?php require_once("session.php") ?>
<?php
$_SESSION["userid"] = null;
$_SESSION["username"] = null;
session_destroy();

header("location: ../");
exit();
?>
