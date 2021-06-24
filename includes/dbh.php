<?php

  $server_name = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "hexagon_db";

  $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

  if (!$conn){
    die("Conncetion faild: " .mysqli_connect_error());
  }