<?php

  include '../includes/dbh.inc.php';
  include '../includes/session.php';

  $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);

  mysqli_query($conn, "UPDATE cart SET status='E Pa Realizuar' WHERE id='$cart_id' AND status='Duke Porositur'; ");