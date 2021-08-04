<?php require_once("../includes/dbh.inc.php") ?>


  <form action="" method="POST">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Kerko Ushqimin" value="">
        </div>
        <div class="col-md-6 text-left">
            <button class="btnSearch">Kerko</button>
            <button class="btnSearch">Te gjitha produktet</button>
        </div>       
  </form>

  <?php 
  ?>

   

     <?php
        $city = $_COOKIE['city'];
        $query = "SELECT * FROM business WHERE company_city = '$city'; ";
        $result = mysqli_query($conn, $query);

        // $queryall = "SELECT * FROM product WHERE "; 
        //  if (isset($_POST['search'])) {
            //  $queryall .= "item_name LIKE '%$searchKey%'";
              // $sql = "SELECT * FROM product WHERE item_name LIKE '%$searchKey%'"; 
        //  }
        
        while($row1 = mysqli_fetch_assoc($result)){
          $company_id = $row1['id'];
          $company_name = $row1['company_name'];
          $queryall = "SELECT * FROM product WHERE business_id='$company_id' ";
          if (isset($_POST["search"])) {
            $searchKey = $_POST['search'];
            $queryall .= " AND item_name LIKE '%$searchKey%' ";
          }
          
          // $query2 = "SELECT * FROM product WHERE business_id = '$company_id'" ;
          // echo $queryall;
          $result2 = mysqli_query($conn, $queryall);
          echo "<div class='product-form'>";

            while($row2 = mysqli_fetch_assoc($result2)){
                echo "<div class='card' >";
                echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row2['item_picture'] ."'>";
                echo "<p class='card-text'>Emri : ". $row2['item_name'] ."</p>";
                echo "<p class='card-text'>Perbersit : ". $row2['item_ingridients'] ."</p>";
                echo "<p class='card-text'>Cmimi : ". $row2['item_price'] ."</p>";
                echo "</div>";
                echo "<br>";
            } 
           echo "</div>";
        }
        
      // } 
      ?>
