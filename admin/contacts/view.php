<?php require_once("../../includes/dbh.inc.php");
  $limit = 5;

  if (isset($_POST['page_no'])) {
      $page_no = $_POST['page_no'];
  }else{
      $page_no = 1;
  }
    $offset = ($page_no-1) * $limit;
?>
<table class="approved_businesses_table">
  <?php 
    $sql = "SELECT * FROM contact_us LIMIT $offset, $limit";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <tr>
      <th>Emri</th>
      <th>E-mail</th>
      <th>Mesazhi</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
            echo "<th>". $row['name'] ."</th>";
            echo "<th>". $row['email'] ."</th>";
            echo "<th>". $row['message'] ."</th>";
          echo "</tr>";
        }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk keni asnje mesazh!</h1>";
  } ?>
</table>
<?php
    $sql3 = "SELECT * FROM contact_us";

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

