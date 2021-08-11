<?php require_once("../includes/dbh.inc.php") ?>

<center>
  <form class="view_products_form"action="" method="POST">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Kerko Ushqimin" value="">
        </div>
        <div class="col-md-6 text-left">
            <button class="btnSearch">Kerko</button>
            <button class="btnSearch">Te gjitha produktet</button>
             <button name="filtro" class="btnSearch">Filtro nga cmimi me i vogel</button>
            <button name="filtro2" class="btnSearch">Filtro nga cmimi me i madh</button> 
        </div>
  </form>
</center>

  
  <?php 
  ?>

   

     <?php
        $city = $_COOKIE['city'];
        $query = "SELECT * FROM business WHERE company_city = '$city'; ";
        $result = mysqli_query($conn, $query);
       
            while($row1 = mysqli_fetch_assoc($result)){

            $company_id = $row1['id'];
            $company_name = $row1['company_name'];
             if (!isset($_POST["filtro"]) && !isset($_POST["filtro2"])) {
            $queryall = "SELECT * FROM product WHERE business_id='$company_id' ";
            if (isset($_POST["search"])) {
              $searchKey = $_POST['search'];
              $queryall .= " AND item_name LIKE '%$searchKey%' ";
            }
            
            $result2 = mysqli_query($conn, $queryall);
            echo "<div class='product-form'>";

              while($row2 = mysqli_fetch_assoc($result2)){
                  echo "<div class='card' >";
                  echo "<div class='img_card '>";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row2['item_picture'] ."'>";
                  echo "</div>";
                  echo "<p class='card-text'>Emri : ". $row2['item_name'] ."</p>";
                  // echo "<p class='card-text'>Perbersit : ". $row2['item_ingridients'] ."</p>";
                  echo "<p class='card-text'>Cmimi : ". $row2['item_price'] . "€</p>";
                  echo "</div>";
                  echo "<br>";
              } 
             echo "</div>"; 
        }
        
         

          
            if (isset($_POST["filtro"])) {
              $queryLower = "SELECT item_name , item_ingridients , item_price , item_picture FROM product WHERE business_id='$company_id' ORDER BY item_price";
              

            $query_run = mysqli_query($conn , $queryLower);
            echo "<div class='product-form'>";
            while ($row3 = mysqli_fetch_assoc($query_run)) {
              echo "<div class='card' >";
                  echo "<div class='img_card '>";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row3['item_picture'] ."'>";
                  echo "</div>";
                  echo "<p class='card-text'>Emri : ". $row3['item_name'] ."</p>";
                  // echo "<p class='card-text'>Perbersit : ". $row3['item_ingridients'] ."</p>";
                  echo "<p class='card-text'>Cmimi : ". $row3['item_price'] ."€</p>";
                  echo "</div>";
                  echo "<br>";
            }
             echo "</div>";
           }

             if (isset($_POST["filtro2"])) {
              $queryHigher = "SELECT item_name , item_ingridients , item_price , item_picture FROM product WHERE business_id='$company_id' ORDER BY item_price DESC";
            

            $query_run2 = mysqli_query($conn , $queryHigher);
            echo "<div class='product-form'>";
            while ($row4 = mysqli_fetch_assoc($query_run2)) {
             echo "<div class='card' >";
                  echo "<div class='img_card '>";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row4['item_picture'] ."'>";
                  echo "</div>";
                  echo "<p class='card-text'>Emri : ". $row4['item_name'] ."</p>";
                  // echo "<p class='card-text'>Perbersit : ". $row4['item_ingridients'] ."</p>";
                  echo "<p class='card-text'>Cmimi : ". $row4['item_price'] ."€</p>";
                  echo "</div>";
                  echo "<br>";
            }
             echo "</div>";
          }
          }
        
       
      ?>
