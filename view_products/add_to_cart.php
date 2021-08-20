<?php

  include '../includes/dbh.inc.php';
  include '../includes/session.php';

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $real_user_id = $_SESSION['realUserid'];
  
  $cart_sql = "SELECT * FROM cart WHERE user_id='$real_user_id' AND status='Duke Porositur';";
  $cart_result = mysqli_query($conn, $cart_sql);
  if (mysqli_num_rows($cart_result) > 0) {
    $cart_id;
    $products = "";
    $quantities = "";
    while ($cart = mysqli_fetch_assoc($cart_result)) {
      $cart_id = $cart['id'];
      $products = $cart['products'];
      $quantities = $cart['quantities'];
    }
    $products .= ", $id";
    $quantities .= ", 1";
    mysqli_query($conn, "UPDATE cart SET products='$products', quantities='$quantities' WHERE id='$cart_id'; ");
    echo count(explode(", ", $quantities));
  }