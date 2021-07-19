<?php require_once("../../includes/dbh.inc.php") ?>

<table class="approved_businesses_table">
  <?php 
    $sql = "SELECT * FROM business WHERE aproved=1 AND username != 'admin'; ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <tr>
      <th>Emri & Mbiemri</th>
      <th>E-mail</th>
      <th>Emri i Kompanise</th>
      <th>Qyteti</th>
      <th>Nr. Telefonit</th>
      <th>Fshij</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
            echo "<th>". $row['name'] ."</th>";
            echo "<th>". $row['email'] ."</th>";
            echo "<th>". $row['company_name'] ."</th>";
            echo "<th>". $row['company_city'] ."</th>";
            echo "<th>". $row['phone_number'] ."</th>";
            echo "<th><button class='delete_business_action' value='".$row['id']."' id='delete_business'><i class='fas fa-times-circle'></i></button></th>";
          echo "</tr>";
        }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka biznese ne pritje!</h1>";
  } ?>
</table>

<script>
  
    $(".delete_business_action").on('click', function(e) {
      
      if(confirm("A jeni i sigurt?")){
    //e.preventDefault();
    let id = this.value;
    
    $.ajax({
      url: "approved/action.php",
      type: "POST",
      data: {
        id: id,
      },
      success: function(data) {
  
        $(".display_approved_businesses").load("approved/view.php");

      }
    }) 
    }
  })
  
  
</script>