<?php require_once("../../includes/dbh.inc.php") ?>

<table class="approved_businesses_table">
  <?php 
    $sql = "SELECT * FROM ratings";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <tr>
      <th>Id</th>
      <th>Vlersimi</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
            echo "<th>". $row['userid'] ."</th>";
            echo "<th>". $row['rating'] ."</th>";
          echo "</tr>";
        }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka asnje vleresim</h1>";
  } ?>
</table>

<!--<script>
  
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
  
  
</script> -->
