<?php require_once("../../includes/dbh.inc.php") ?>

<?php 
  $query = "SELECT * FROM business";
  $stmt = mysqli_query($conn, $query);
?>
<div class="filters">
  
    <span class="spanFiltro">Filtro në bazë të &nbsp;</span>
    <select name="fetchval" id="fetchval">
      <?php 
      echo "<option>All Companies</option>";
      $item_categorie_options = ["Meat", "Salad", "Pizza", "Pasta"];
        if (mysqli_num_rows($stmt) > 0) {
          $companyName = $res['company_name'];
          foreach ($stmt as $resu){
            $companyName = $resu['company_name'];
            echo "<option> $companyName</option>";
          }
        }
      ?>
    </select>
    <select name="fetchvalue" id="fetchvalue">
      <?php
      echo "<option>All Categories</option>"; 
        if (mysqli_num_rows($stmt) > 0) {
          $companyName = $res['company_name'];
          foreach ($item_categorie_options as $option){
            echo "<option>$option</option>";
          }
        }
      ?>
    </select>
  </div>

<table class="approved_businesses_table">

	<?php 
    $sql = "SELECT * FROM product ORDER BY business_id "; 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      
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
  });
    $(document).ready(function(){
    $("#fetchval").on('change' , function(){
      var value = $(this).val();
      $.ajax({
        url:'products/action1.php',
        type:'POST',
        data: '&company_name='+value,
        success:function(data){
          $(".approved_businesses_table").html(data);
          $('#fetchvalue option:first').prop('selected',true);
        }
      });
    });
  });
  $(document).ready(function(){
    $("#fetchvalue").on('change' , function(){
      var value = $(this).val();
      var company_name = $("#fetchval").val();
      $.ajax({
        url:'products/action.php',
        type:'POST',
        data: 'request=' + value+"&company_name="+company_name,
        success:function(data){
          $(".approved_businesses_table").html(data);
        }
      });
    });
  });
  </script>
