<?php

  $server_name = "localhost";
  $db_username = "hexagon";
  $db_password = "hexagon12";
  $db_name = "hexagon_db";

  $conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

  if (!$conn){
    die("Connection failed: " .mysqli_connect_error());
  }