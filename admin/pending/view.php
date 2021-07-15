<?php require_once("../../includes/dbh.inc.php") ?>

<table class="pending_businesses_table">
  <?php 
    $sql = "SELECT * FROM business WHERE aproved=0; ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <tr>
      <th>Emri & Mbiemri</th>
      <th>E-mail</th>
      <th>Emri i Kompanise</th>
      <th>Qyteti</th>
      <th>Nr. Telefonit</th>
      <th>Aprovo</th>
      <th>Moho</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
            echo "<th>". $row['name'] ."</th>";
            echo "<th>". $row['email'] ."</th>";
            echo "<th>". $row['company_name'] ."</th>";
            echo "<th>". $row['company_city'] ."</th>";
            echo "<th>". $row['phone_number'] ."</th>";
            echo "<th><button class='pending_business_action' value='".$row['id']."' id='approve_business'><i class='fas fa-check-circle'></i></button></th>";
            echo "<th><button class='pending_business_action' value='".$row['id']."' id='deny_business'><i class='fas fa-times-circle'></i></button></th>";
          echo "</tr>";
        }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka biznese ne pritje!</h1>";
  } ?>
</table>