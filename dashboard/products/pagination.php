<?php
require_once("../../includes/dbh.inc.php");  
require_once("../../includes/functions.inc.php"); 
require_once("../../includes/session.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css" /> 
<?php
    $limit = 1;

    if (isset($_POST['page_no'])) {
        $page_no = $_POST['page_no'];
    }else{
        $page_no = 1;
    }
    $user_id = $_SESSION['userid'];
    $offset = ($page_no-1) * $limit;
    $sql = "SELECT * FROM product WHERE business_id = '$user_id' LIMIT $offset, $limit";
    $stmt = mysqli_query($conn, $sql) or die('error');
    $sql3 = "SELECT * FROM product WHERE business_id = '$user_id'";

    $records = mysqli_query($conn, $sql3);

    $totalRecords = mysqli_num_rows($records);

    $totalPage = ceil($totalRecords/$limit); 
    ?>
    <nav class="pagination">
        <ul class='nav-pages' style='margin:20px 0'>
            <?php 
            if(isset($page_no)){
                if($page_no > 1){ 
                    
                ?>
                    <li id='<?php ($page_no-1) ?>' class="page-item">
                        <a href=""  class="page-link">&laquo;</a>
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
                <li id='<?php echo $i ?>' class='page-item  <?php echo $active?>'><a class='page-link'  href=''><?php echo $i ?></a></li>
                <?php
            }
            if(isset($page_no) && !empty($page_no)){
                if($page_no+1 <= $totalPage){ ?>
                    <li class="page-item mx-1">
                        <a href="" class="page-link" id='<?php ($page_no+1) ?>'>&raquo;</a>
                    </li>
                <?php }
            }
            ?>
        </ul>
    </nav>
            