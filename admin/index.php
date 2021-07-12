<?php require_once('../includes/dbh.inc.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php if (isset($_SESSION['userid']) && isset($_SESSION['admin'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <?php 
    $active = "Admin";
    include '../includes/nav.inc.php';
  ?>
  <div class="dashboard" id="admin_dashboard">
    <div class="menu">
      <?php 
        $dashboard_categories = ["Në Pritje"];
        $dashboard_categories_files_name = ["pending"];
        $i_class = ["fas fa-clipboard-check"];
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
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script src="../js/dashboard.js"></script>
  <script src="../js/main.js"></script>
  <script>
    $(document).ready(function() {
      $(".main > .content").load("pending/main.php");
    });
  </script>
</body>
</html>
<?php } else {
  header("Location: ../login.php");
}?>