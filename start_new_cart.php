<?php

  include 'includes/dbh.inc.php';
  include 'includes/session.php';

  $realUserid = $_SESSION['realUserid'];
  $date = date('Y-m-d H:i:s');
  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$realUserid' AND status='Duke Porositur'; ")) == 0) {
    mysqli_query($conn, "INSERT INTO cart (business_id, user_id, products, quantities, date, status) VALUES (1, '$realUserid', '', '', '$date', 'Duke Porositur'); ");
  }