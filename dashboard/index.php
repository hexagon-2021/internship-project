<?php include '../includes/dbh.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
  <?php 
    $active = "Dashboard";
    include '../includes/nav.inc.php'; 
  ?>
  <div class="dashboard">
    <div class="menu">
      <?php 
        $dashboard_categories = ["Produktet", "Edito Profilin"];
        $dashboard_categories_files_name = ["products", "profile_edit"];
      ?>
    </div> <!-- menu -->
    <div class="main">
      <h2 class='dashboard_categorie_change_text'>Zgjedh: 
        <select name="categorie" class='dashboard_categorie_change_select'>
          <?php 
            foreach ($dashboard_categories as $i=>$dashboard_categorie) {
              echo "<option value='". $dashboard_categories_files_name[$i] ."'>" . $dashboard_categorie . "</option>";
            }
          ?>
        </select>
      </h2>
      <div class="content">

      </div> <!-- content -->
    </div> <!-- main -->
  </div> <!-- .dashboard -->
  <script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
  <script src="../js/dashboard.js"></script>
  <script>
    $(document).ready(function() {
      $(".main > .content").load("products/main.php");
    });
  </script>
</body>
</html>