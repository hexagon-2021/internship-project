<?php 
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');
  $business_id=$_SESSION['userid'];?>
  
  <table class="approved_businesses_table">
  <?php
  if (isset($_POST['value_id'])) {
    $id = (int) $_POST['value_id'];
    $value = $_POST['value'];
    mysqli_query($conn, "UPDATE cart SET status='$value' WHERE id='$id'");
  } 

  if (isset($_POST['action'])) {
    $id = mysqli_real_escape_string($conn, $_POST['action_id']);
    $status = mysqli_real_escape_string($conn, $_POST['action']);
    mysqli_query($conn, "UPDATE cart SET status='$status' WHERE id=$id; ");
  }

  $sql = "SELECT * FROM cart WHERE business_id = '$business_id' ORDER BY status ASC";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  ?>
  <tr>
    <th>ID</th>
    <th>Statusi</th>
    <th>Klienti</th>
    <th>Datë</th>
    <th>Lokacioni</th>
    <th>Produktet</th>
    <th>Totali</th>
    
  </tr>
  <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          $user_id = $row['user_id'];
          $full_name= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'"));
          $products = "";
          $price = 0;
          $status_options = ["E Përfunduar", "E Pa Realizuar"];
            echo "<tr>";
              echo "<th>". "#". $row['id'] ."</th>";
              echo "<th>";
                echo "<select class='change_order_status' id='change_order_status_".$row['id']."'>";
                echo "<option>". $row['status'] ."</option>";
                foreach ($status_options as $option) {
                  if ($option != $row['status']) {
                    echo "<option>$option</option>";
                  }
                }
            echo "</th>";
          echo "</select>";
              echo "<th>". $full_name['full_name'] ."</th>";
              echo "<th>". date("d-m-Y", strtotime($row['date'])) ."</th>";
              echo "<th>". "Rr. Agim Ramadani" ."</th>";
              foreach(explode(", ", $row['products']) as $i => $product_id){
                $sql3 ="SELECT * FROM product WHERE id= '$product_id'";
                $query3 = mysqli_query($conn, $sql3);
                while($row3 = mysqli_fetch_assoc($query3)){
                  $price += $row3['item_price'] * explode(", ", $row['quantities'])[$i];
                  $products .= explode(", ", $row['quantities'])[$i] . 'x '. $row3['item_name'] .   '<br>';
                }
              }
              echo "<th>". $products ."</th>";
              echo "<th>". $price ."€"."</th>";
              
            echo "</tr>";
          
        }
        ?> 
      
        <?php
    } else {
      echo "<h1 style='color: var(--secondary-color);text-align: center;'>Your inbox is empty!</h1>";
    } ?>
</table>
<?php


?>

