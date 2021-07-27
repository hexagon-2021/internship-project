<?php require_once('../includes/dbh.inc.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php if (isset($_SESSION['userid']) && isset($_SESSION['admin'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
  <?php 
    $active = "Admin";
    include '../includes/nav.inc.php';
  ?>
  <div class="dashboard" id="admin_dashboard">
    <div class="menu">
      <h1 class='menu_title'>Super Admin</h1>
      <?php 
        $dashboard_categories = ["Në Pritje", "Te aprovuara", "Produktet", "Kontaktet"];
        $dashboard_categories_files_name = ["pending", "approved", "products", "contacts"];
        $i_class = ["fas fa-history", "fas fa-clipboard-check", "fas fa-shopping-basket", "fas fa-envelope"];
      ?>
      
      <div id="menu_actions">
        <?php 
          foreach ($dashboard_categories as $i=>$dashboard_categorie) {
            echo "<button value='". $dashboard_categories_files_name[$i] ."' class='menu_actions_btn'><i class='".$i_class[$i]."'></i> $dashboard_categorie</button>";
          }
        ?>
      </div> <!-- #menu_actions -->
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
  <script src="../js/dashboard.js"></script>
  <script src="../js/main.js"></script>
  <script>
    $(document).ready(function() {
      $("button.menu_actions_btn[value='pending']").addClass("active_action");
      $(".main > .content").load("pending/main.php");
    });
  </script>
</body>
</html>
<?php } else {
  header("Location: ../login.php");
}?>
