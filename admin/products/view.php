<?php 
  require_once('../../includes/dbh.inc.php');
  ?>

<?php 
  $query = "SELECT * FROM business";
  $stmt = mysqli_query($conn, $query);
?>
<div class="filters">

    
    <span class="spanFiltro">Filtro në bazë të &nbsp;</span>
    <select name="fetchval" id="fetchval">
      <?php 
      echo "<option>All Companies</option>";
      $item_categorie_options = ["Salad", "Fast Food", "Pizza", "Pasta", "Meat" , "Rice" , "Noodles" , "Fish" , "Eggs" , "Desert" , "Fruit", "Vegetables" , "Traditional"];
        if (mysqli_num_rows($stmt) > 0) {
          $companyName = $res['company_name'];
          foreach ($stmt as $resu){
            $companyName = $resu['company_name'];
            echo "<option> $companyName</option>";
          }
        }
      ?>
    </select>
    <select name="fetchvalue" id="fetchvalue">
      <?php
      echo "<option>All Categories</option>"; 
        if (mysqli_num_rows($stmt) > 0) {
          $companyName = $res['company_name'];
          foreach ($item_categorie_options as $option){
            echo "<option>$option</option>";
          }
        }
      ?>
    </select>
  </div>
