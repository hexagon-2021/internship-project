<?php
  require_once('../includes/dbh.inc.php');
  // require_once('view.php');
  $productid = $_GET['productid'];
  
  

    
    
   

  $sql = "SELECT * FROM product where id=".$productid;
  $result = mysqli_query($conn,$sql);
  while( $row = mysqli_fetch_array($result) ){
      $queryC = "SELECT * FROM business WHERE id = '". $row['business_id'] ."'";
      $resultC = mysqli_query($conn, $queryC);
      while ($business = mysqli_fetch_assoc($resultC)) {
      $companyName = $business['company_name'];
    }
    echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row['item_picture'] ."'>";
    echo "<p class='card-text'>Emri : ". $row['item_name'] ."</p>";
    echo "<p class='card-text'>Perbersit : ". $row['item_ingridients'] ."</p>";
    echo "<p class='card-text'>Cmimi : ". $row['item_price'] ."€</p>";
    echo "<p class='card-text'>Kategoria : ". $row['item_categorie'] ."</p>";
    echo "<p class='card-text'>Kompania : ". $companyName ."</p>";
  }
  ?>
  
