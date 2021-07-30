<?php require_once("../../includes/dbh.inc.php") ?>
<?php require_once("../../includes/functions.inc.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php $food_categories = ["Salad", "Pizza", "Pasta", "Meat"]; ?>
<body onload="viewData()">
<section class="dashboard_categorie" id="products">
  <div class="container">
  <h3 id="result"></h3>
    <button id="add_product_toggler">Shto Produkt</button>
    <h1 class="dashboard_section_title" id="add_products_section_title">Shto Produkt</h1>
    <div id="add-form-div">
      <form id="add-form"  method="POST" enctype="multipart/form-data">
          <?php if (isset($_GET['error'])) { ?>
     	    	<p class="error"><?php echo $_GET['error']; ?></p>
     	      <?php } ?>

     	      <?php if (isset($_GET['success'])) { ?>
              <p class="success"><?php echo $_GET['success']; ?></p>
           <?php } ?>
        <input class="input-form" type="text" id="item_name" name="item_name" placeholder="Item Name">
        <input class="input-form" type="textarea" id="item_ingridients" name="item_ingridients"  placeholder="Item Ingridients">
        <input class="input-form" type="number" id="item_price" name="item_price" placeholder="Item Price" step=".01">
        <select class="input-form" id="item_categorie" name="item_categorie">
          <?php
            foreach ($food_categories as $food_categorie) {
              echo "<option value='$food_categorie'>$food_categorie</option>";
            }
          ?>
        </select>
        <input class="input-form" class="custum-file-input" type="file" id="image" name="image" >
        <button type="submit" >Submit</button>
      </form>
    </div> <!-- add-forme -->
	<?php if(!empty($response)) { ?>
		<div id="response <?php echo $response["type"]; ?>
			">
			<?php echo $response["message"]; ?>
		</div>
	<?php }?>
    <h1 class="dashboard_section_title">Shiqo Produktet</h1>
    <div id="display_products" class="display_products" style="overflow-x: auto;">
            
    </div>
  </div> <!-- container -->
</section> <!-- #products -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function viewData(){
		$.ajax({
			url: "products/action.php",
			success: function(data){
				$('#display_products').html(data);
				$("#add-form")[0].reset();
			} 
		});
  }
  $("#add-form").on('submit' , function(e){
      e.preventDefault();
      var formData = new FormData(this);
        $.ajax({
          url: 'products/action.php?p=add',
          type: 'POST',
          cache: false,
          contentType : false, // you can also use multipart/form-data replace of false
          processData : false,
          data: formData,
          success:function(response){
            $("#result").html(response);
            $("#add-form")[0].reset();
            setTimeout(function(){
              $("#result").fadeOut("slow");
            }, 3000);
            
          },
          error:function(response){
            $("#result").html(response);
          },
        });
    });
  function viewData(){
		$.ajax({
			url: "products/action.php",
			success: function(data){
				$('#display_products').html(data);
				$("#add-form")[0].reset();
			} 
		});
  }
  function updateData(str){
	var id = str;
	console.log(id);	
	console.log(id);
	var item_name = $('#item_name-'+str).val();
	var item_ingridients = $('#item_ingridients-'+str).val();
	var item_price = $('#item_price-'+str).val();
	var item_categorie = $('#item_categorie-'+str).val();
	var image = $('#image-'+str).val();
	let parts = image.split("\\");
	let index = parts[parts.length-1]
	console.log(index);
	
	$.ajax({
		type: "POST",
		url: "products/action.php?p=edit",
		//enctype: 'multipart/form-data',
		data:  "item_name="+item_name+"&item_ingridients="+item_ingridients+"&item_price="+item_price+"&item_categorie="+item_categorie+"&image="+index+"&id="+id,
		//data: {item_name:item_name, item_ingridients:item_ingridients, item_price:item_price, item_categorie:item_categorie, image:image},
		success:function(response){
			viewData();
			$("#result").html(response);
			setTimeout(function(){
              $("#result").fadeOut("slow");
            }, 3000);
		}
	});
  	}
				
	function deleteData(str){
		var id = str;
		$.ajax({
			type: "GET",
			url: "products/action.php?p=delete",
			data: "id="+id,
			success: function(data){
				viewData();
				setTimeout(function(){
              	$("#result").fadeOut("slow");
            	}, 3000);
			}
		})
	}	
</script>

