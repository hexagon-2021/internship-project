<?php 
  require_once('../../includes/dbh.inc.php');
?>
<table class="approved_businesses_table">


</table>
<?php

    if (isset($_POST['id'])) {
        $id = (int) $_POST['id'];
        mysqli_query($conn, "DELETE FROM product WHERE id=$id LIMIT 1");
        
    } 
    $limit = 5;
    if(isset($_POST['page_no'])){
        if($_POST['page_no'] === ""){
            $page_no = 1;
        }else{
            $page_no = $_POST['page_no'];
        }
    }else{
        $page_no = 1;
    }
    if(isset($_POST['company_name']) && isset($_POST['categorie'])){
        $offset = ($page_no-1) * $limit;
        $company_name = $_POST['company_name'];
        $categorie = $_POST['categorie'];
        if($company_name == 'All Companies'){
            $offset =($page_no-1) * $limit;
            

            $sql1 = "SELECT * FROM `business` WHERE company_name = '$company_name'";
            $result1 = mysqli_query($conn, $sql1);

            while($row1 = mysqli_fetch_assoc($result1)){
              $company_id = $row1['id'];
              $company_name = $row1['company_name'];
            }

            if(isset($_POST['categorie'])){
              $categorie = $_POST['categorie'];
              if($categorie != 'All Categories'){
                $query4 = "SELECT * FROM product WHERE item_categorie ='$categorie' LIMIT $offset, $limit ";
                
                $result = mysqli_query($conn, $query4);
                $count = mysqli_num_rows($result);  

                $sql3 = "SELECT * FROM product WHERE item_categorie ='$categorie'";
                $records = mysqli_query($conn, $sql3);
                $totalRecords = mysqli_num_rows($records);
                $totalPage = ceil($totalRecords/$limit); 
              }else{
                $query = "SELECT * FROM product LIMIT $offset, $limit ";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result); 
                $sql3 = "SELECT * FROM product";
  
                $records = mysqli_query($conn, $sql3);
                $totalRecords = mysqli_num_rows($records);
                $totalPage = ceil($totalRecords/$limit); 
              }    
            }
        }else{
            $offset =($page_no-1) * $limit;

            $sql1 = "SELECT * FROM `business` WHERE company_name = '$company_name'";
            $result1 = mysqli_query($conn, $sql1);
            while($row1 = mysqli_fetch_assoc($result1)){
                $company_id = $row1['id'];
                $company_name = $row1['company_name'];
            }

            if($categorie != "All Categories"){
                $query = "SELECT * FROM product WHERE item_categorie ='$categorie' && business_id = '$company_id' LIMIT $offset, $limit";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);

                $sql3 = "SELECT * FROM product WHERE item_categorie ='$categorie' && business_id = '$company_id'";
                $records = mysqli_query($conn, $sql3);
                $totalRecords = mysqli_num_rows($records);
                $totalPage = ceil($totalRecords/$limit); 
            }else{

                $query = "SELECT * FROM `product` WHERE business_id = '$company_id' LIMIT $offset, $limit ";
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
                echo "Sorry! no record Found";
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
                        echo "<th>". $row['item_price'] ."€</th>";
                        echo "<th>". $row['item_ingridients'] ."</th>";
                        echo "<th>". $row['item_categorie'] ."</th>";
                        echo "<th>". $row['item_views'] ."</th>";
                        echo "<th><img width='60' height='60' src='../dashboard/products/uploads/". $row['item_picture'] ."'></th>";
                        echo "<th><button class='delete_product_action' value='".$row['id']."' id='delete_products'><i class='fas fa-times-circle'></i></button></th>";
                    echo "</tr>";
                }
                ?>
        </table>
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

                <?php 
    }else{

        $offset = ($page_no-1) * $limit;
        $sql = "SELECT * FROM product LIMIT  $offset, $limit "; 
        $result = mysqli_query($conn, $sql);
        

        $sql3 = "SELECT * FROM product";

        $records = mysqli_query($conn, $sql3);

        $totalRecords = mysqli_num_rows($records);

        $totalPage = ceil($totalRecords/$limit); 

        if (mysqli_num_rows($result) > 0) {
        
        ?>
        <table class="approved_businesses_table">
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
                while ($row = mysqli_fetch_assoc($result)) {
                $company_id = $row['business_id'];
                $query2 = "SELECT * FROM `business` WHERE id = '$company_id'";
                $result2 = mysqli_query($conn, $query2);
                while($row2 = mysqli_fetch_assoc($result2)){
                    $company_name = $row2['company_name'];
                }
                echo "<tr>";
                    echo "<th>".$company_name."</th>";
                    echo "<th>". $row['item_name'] ."</th>";
                    echo "<th>". $row['item_price'] . '€'."</th>";
                    echo "<th>". $row['item_ingridients'] ."</th>";
                    echo "<th>". $row['item_categorie'] ."</th>";
                    echo "<th>". $row['item_views'] ."</th>";
                    echo "<th><img width='60' height='60' src='../dashboard/products/uploads/". $row['item_picture'] ."'></th>";
                    echo "<th><button class='delete_product_action' value='".$row['id']."' id='delete_products'><i class='fas fa-times-circle'></i></button></th>";
                echo "</tr>";
                }
            ?>
            <?php } else {
            echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka asnjë produkt!</h1>";
        } ?>
        </table>
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
    <?php
    }?>