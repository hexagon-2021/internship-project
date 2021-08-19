<?php require_once('../includes/dbh.inc.php'); ?>
<?php require_once('../includes/functions.inc.php'); ?>
<?php if (isset($_SESSION['admin'])) {header("Location: ../admin/index.php");} ?>
<?php if (isset($_SESSION['userid'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
</head>
<body >
  <?php 
    $active = "Dashboard";
    include '../includes/nav.inc.php'; 
  ?>
  
  <?php 
    $query = mysqli_query($conn, "SELECT * FROM business WHERE id=" . $_SESSION['userid']. " AND aproved=1");
    if (mysqli_num_rows($query) > 0) { 
  ?>
  <div class="dashboard">
    <div class="menu">
      <?php 
         $dashboard_categories = ["Produktet", "Porositë" ,"Edito Profilin", "Inbox"];
         $dashboard_categories_files_name = ["products", "orders" ,"profile_edit", "inbox"];
         $i_class = ["fas fa-shopping-basket", "fas fa-clipboard-list" , "fas fa-user-edit", "fa fa-inbox"];
          while ($row = mysqli_fetch_assoc($query)) {
          $logo = $row['company_logo'];
          $company_name = $row['company_name'];
          $company_city = $row['company_city'];
          }
            if ($logo != "") { ?>
              <img src="profile_edit/company_logo/<?php echo $logo ?>" alt="company_picture" width="200px" />
              <?php
              }

              else { ?>
                <img src="../includes/images/profile_pictures/avatar.png" alt="company_picture" width="200px" />
                <?php 
                }
                ?>
     
        <h3 class="company_info_component" id="company_info_name">
        <label><?php echo $company_name ?> </label> <br />
        <label for="location" style="font-size: 24px;"><i class="fas fa-compass"></i> Lokacioni: <?php echo $company_city; ?> </label>
      </h3>
      <!-- <div id="company_info_component_wrapper">
        <span class="company_info_component" id="company_info_city">
          <label class="company_info_component_holder"><i class="fas fa-compass"></i> Lokacioni</label> 
          <label class="company_info_component_value">Ferizaj</label>
        </span>
        <span class="company_info_component" id="company_info_phone_number">
          <label class="company_info_component_holder"><i class="fas fa-phone"></i> Nr. Telefonit</label>
          <label class="company_info_component_value">+38344999888</label>
        </span>
        <span class="company_info_component" id="company_info_email">
          <label class="company_info_component_holder"><i class="fas fa-envelope"></i> Email</label>
          <label class="company_info_component_value">mcdonaldS@gmail.com</label>
        </span>
      </div> #wrapper -->
      
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
  
  <?php } else {?>
    <h1 style='padding-top: 20%;color: var(--secondary-color);text-align: center;font-size: 30px;'>Llogaria juaj nuk eshte verifikuar ende!</h1>
  <?php } ?>


 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/dashboard.js"></script>
  <script src="../js/main.js"></script>
  
  <script>
    $(document).ready(function() {
      $("button.menu_actions_btn[value='products']").addClass("active_action");
      $(".main > .content").load("products/main.php");
      //viewData();
    });
  </script>
  <script>
    /*function viewData(){
      $.ajax({
        url: "products/action.php",
        success: function(data){
          $('#display_products').html(data);
          $("#add-form")[0].reset();
        } 
      });
    }*/
  </script>
</body>
</html>
<?php } else {
  header("Location: ../login.php");
}?>
