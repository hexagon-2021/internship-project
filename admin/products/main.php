<section class="dashboard_categorie" id="approved_businesses">
  <div class="container">
    <h1 class="dashboard_section_title" id="approved_businesses_section_title">Të gjitha produktet</h1>
    <?php 
      require_once('../../includes/dbh.inc.php');
    ?>

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
    <div id="display_approved_businesses" class="display_approved_businesses">
    
    </div> <!-- .display_businesses -->
  </div> <!-- container -->
</section> <!-- #pending_businesses -->
<script>
  $(document).ready(function(){
    function viewData(page, company_name, categorie){
      //let companyName = $("#fetchval > option:selected").val();
        console.log(page);
          $.ajax({
            url: "products/action1.php",
            type: "POST",
            data : {page_no:page, company_name: company_name, categorie:categorie},
            success: function(data){
              $('#display_approved_businesses').html(data);
            } 
          });
    }
    viewData(null, $("#fetchval > option:selected").val());

    // Pagination code
    $(document).on("click", ".nav-pages li", function(e){
      var pageId = $(this).attr("id");
      console.log(pageId);
      viewData(pageId, $("#fetchval > option:selected").val(), $("#fetchvalue > option:selected").val());
    });
    $("#fetchval").on('change' , function(){
      var pageId = $(".nav-pages li").attr("id");
      viewData(pageId, $("#fetchval > option:selected").val(), $("#fetchvalue > option:selected").val());
    });
    $("#fetchvalue").on('change' , function(){
      var pageId = $(".nav-pages li").attr("id");
      viewData(pageId, $("#fetchval > option:selected").val(), $("#fetchvalue > option:selected").val());
    });
  });
  
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
  
        $("#display_approved_businesses").load("products/view.php");

      }
    }) 
    }
  });

  </script>