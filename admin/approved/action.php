<?php 
  require_once('../../includes/dbh.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    mysqli_query($conn, "DELETE FROM business WHERE id=$id LIMIT 1");
  } 
?>


