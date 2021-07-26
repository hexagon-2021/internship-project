<?php require_once("../../includes/dbh.inc.php") ?>

<table class="approved_businesses_table">

	<?php 
    $sql = "SELECT * FROM product  "; 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>

  <tr>
      <th>Emri</th>
      <th>Qmimi</th>
      <th>Përbërësit</th>
      <th>Kategoria</th>
      <th>Shikueshmëria</th>
      <th>Foto</th>
      <th>Fshij produktin</th>
    </tr>

    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
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
    <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka asnjë produkt!</h1>";
  } ?>
</table>

<script>
  
    $(".delete_product_action").on('click', function(e) {
      
      if(confirm("A jeni i sigurt?")){
    //e.preventDefault();
    let id = this.value;
    
    $.ajax({
      url: "products/action.php",
      type: "POST",
      data: {
        id: id,
      },
      success: function(data) {
  
        $(".display_approved_businesses").load("products/view.php");

      }
    }) 
    }
  })
  </script>
