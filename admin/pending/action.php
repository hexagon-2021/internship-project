<?php 
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $action = (int) $_POST['action'];
    mysqli_query($conn, "UPDATE business SET status='Active' WHERE id=$id");
    sendInboxMessage($conn, 1, $id, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', date('Y-m-d'));
  } 
?>


