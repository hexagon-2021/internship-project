<?php 
  require_once('../../includes/dbh.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    mysqli_query($conn, "DELETE FROM product WHERE id=$id LIMIT 1");
  } 
  
  if (isset($_POST['company_name'])) {
    $request;
    $company_name;
    $request = $_POST['request'];
    $company_name = $_POST['company_name'];

    $limit = 5;

    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    }else{
        $page_no = 1;
    }
        $offset = ($page_no-1) * $limit;

    if($company_name == 'All Companies'){
      $sql1 = "SELECT * FROM `business` WHERE company_name = '$company_name'";
      $result1 = mysqli_query($conn, $sql1);
  
      while($row1 = mysqli_fetch_assoc($result1)){
        $company_id = $row1['id'];
        $company_name = $row1['company_name'];
      }
      if($request != 'All Categories'){
        $query = "SELECT * FROM product WHERE item_categorie ='$request'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);  

      }else{ 
        $query = "SELECT * FROM product ORDER BY business_id";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

      }      
    }else{
      
      if($request != 'All Categories'){
        $sql1 = "SELECT * FROM `business` WHERE company_name = '$company_name'";
        $result1 = mysqli_query($conn, $sql1);
    
        while($row1 = mysqli_fetch_assoc($result1)){
          $company_id = $row1['id'];
        }
        $query = "SELECT * FROM product WHERE item_categorie ='$request' && business_id = '$company_id'";
  
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        $sql3 = "SELECT * FROM product WHERE item_categorie ='$request' && business_id = '$company_id'";

        $records = mysqli_query($conn, $sql3);

        $totalRecords = mysqli_num_rows($records);

        $totalPage = ceil($totalRecords/$limit); 

      }else{
        $sql1 = "SELECT * FROM `business` WHERE company_name = '$company_name'";
        $result1 = mysqli_query($conn, $sql1);
    
        while($row1 = mysqli_fetch_assoc($result1)){
          $company_id = $row1['id'];
          $companyName = $row1['company_name'];
        }
        $query = "SELECT * FROM product WHERE business_id = '$company_id'";
  
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        $sql3 = "SELECT * FROM product WHERE business_id = '$company_id'";

        $records = mysqli_query($conn, $sql3);

        $totalRecords = mysqli_num_rows($records);

        $totalPage = ceil($totalRecords/$limit); 
      }
    }
    
  
  
  ?>
  
    <table class="approved_businesses_table">
      <?php
      if ($count) {
        
      
      ?>
      
        <tr>
          <th>Emri i Kompanisë</th>
          <th>Emri i Produktit</th>
          <th>Çmimi</th>
          <th>Përbërësit</th>
          <th>Kategoria</th>
          <th>Shikueshmëria</th>
          <th>Foto</th>
          <th>Fshij produktin</th>
        </tr>
    
          <?php
      }else{
        echo "<h1 class='errorMessageFilterProducts'>Sorry! no record Found </h1>";
      }

        while ($row = mysqli_fetch_assoc($result)) {
          $business_id = $row['business_id'];
          $sql1 = "SELECT * FROM `business` WHERE id = '$business_id'";
          $result1 = mysqli_query($conn, $sql1);
      
          while($row1 = mysqli_fetch_assoc($result1)){
              
              $company_id = $row1['id'];
              $company_name = $row1['company_name'];
          }
          echo "<tr>";
            echo "<th>".$company_name."</th>";
            echo "<th>". $row['item_name'] ."</th>";
            echo "<th>". $row['item_price'] ."</th>";
            echo "<th>". $row['item_ingridients'] ."</th>";
            echo "<th>". $row['item_categorie'] ."</th>";
            echo "<th>". $row['item_views'] ."</th>";
            echo "<th><img width='50 ' src='../dashboard/products/uploads/". $row['item_picture'] ."'></th>";
            echo "<th><button class='delete_product_action' value='".$row['id']."' id='delete_products'><i class='fas fa-times-circle'></i></button></th>";
          echo "</tr>";
        }
        ?>
        <?php 
  }?>
  </table>
  <?php
    
?>
  <nav class="pagination">
            <ul class='nav-pages' style='margin:20px 0'>
                <?php 
                if(isset($page_no)){
                    if($page_no > 1){ 
                        
                    ?>
                        <li id='<?php echo ($page_no-1); ?>' class="page-item">
                            <a class="page-link">&laquo;</a>
                        </li>
                    <?php }
                }
                for ($i=1; $i <= $totalPage ; $i++) { 
                if ($i == $page_no) {
                    $active = "active";
                }else{
                    $active = "";
                }
                ?>
                    <li id='<?php echo $i ?>' class='page-item  <?php echo $active?>'><a class='page-link'  ><?php echo $i ?></a></li>
                    <?php
                }
                if(isset($page_no) && !empty($page_no)){
                    if($page_no+1 <= $totalPage){ ?>
                        <li id='<?php echo ($page_no+1); ?>' class='page-item  <?php echo $active?>'>
                            <a  class="page-link" id='<?php echo ($page_no+1); ?>'>&raquo;</a>
                        </li>
                    <?php }
                }
                ?>
            </ul>
        </nav>

