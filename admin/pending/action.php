<?php 
  require_once('../../includes/dbh.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $action = (int) $_POST['action'];
    mysqli_query($conn, "UPDATE business SET aproved=$action WHERE id=$id");
  } 
?>


