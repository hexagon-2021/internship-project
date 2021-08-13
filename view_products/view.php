<?php require_once("../includes/dbh.inc.php") ?>

<center>
  <form class="view_products_form" method="GET">
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
             if (!isset($_GET["filtro"]) && !isset($_GET["filtro2"])) {
            $queryall = "SELECT * FROM product WHERE business_id='$company_id' ";
            if (isset($_GET["search"])) {
              $searchKey = $_GET['search'];
              $queryall .= " AND item_name LIKE '%$searchKey%' ";
            }
            
            $result2 = mysqli_query($conn, $queryall);
          
           echo "<div class='product-form'>";
            
              while($row2 = mysqli_fetch_assoc($result2)){
                
                // echo "<div class='modal-body'>";
                  echo "<div class='card' >";
                  echo "<div class='img_card '>";
                  echo "<a class='productinfo' data-id=". $row2['id'] ." >";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row2['item_picture'] ."'>";
                  echo "</a>";
                  echo "</div>";
                  echo "<p class='card-text'>Emri : ". $row2['item_name'] ."</p>";
                  // echo "<p class='card-text'>Perbersit : ". $row2['item_ingridients'] ."</p>";
                  echo "<p class='card-text'>Cmimi : ". $row2['item_price'] . "€</p>";
                  echo "</div>";
                  echo "<br>";
              } 
             echo "</div>"; 
             
        }
        
         

          
            if (isset($_GET["filtro"])) {
              $queryLower = "SELECT * FROM product WHERE business_id='$company_id' ORDER BY item_price";
              

            $query_run = mysqli_query($conn , $queryLower);
            echo "<div class='product-form'>";
            while ($row3 = mysqli_fetch_assoc($query_run)) {
              echo "<div class='card' >";
                  echo "<div class='img_card '>";
                 echo "<a class='productinfo' data-id=". $row3['id'] ." >";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row3['item_picture'] ."'>";
                  echo "</a>";
                  echo "</div>";
                  echo "<p class='card-text'>Emri : ". $row3['item_name'] ."</p>";
                  // echo "<p class='card-text'>Perbersit : ". $row3['item_ingridients'] ."</p>";
                  echo "<p class='card-text'>Cmimi : ". $row3['item_price'] ."€</p>";
                  echo "</div>";
                  echo "<br>";
            }
             echo "</div>";
           }

             if (isset($_GET["filtro2"])) {
              $queryHigher = "SELECT * FROM product WHERE business_id='$company_id' ORDER BY item_price DESC";
            

            $query_run2 = mysqli_query($conn , $queryHigher);
            
            echo "<div class='product-form'>";
            while ($row4 = mysqli_fetch_assoc($query_run2)) {
               
              echo "<div class='card' >";
                  echo "<div class='img_card '>";
                  echo "<a class='productinfo' data-id=". $row4['id'] ." >";
                  echo "<img class='card-img-top'  src='../dashboard/products/uploads/". $row4['item_picture'] ."'>";
                  echo"</a>";
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

      <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Informata shtes rreth produktit</h4>
                          <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
        </div>

      
<script>
  $(document).ready(function(){
       $('.productinfo').click(function(){
        var productid = $(this).data('id');
        $.ajax({
          url:'palidhje.php',
          type:'GET',
          data: {productid: productid},
          success: function(response){
            $('.modal-body').html(response);
            $('#empModal').modal('show');
          }
        })
    });
  });
</script>
