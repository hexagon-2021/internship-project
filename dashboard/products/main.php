<?php require_once("../../includes/dbh.inc.php") ?>
<?php require_once("../../includes/functions.inc.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php $food_categories = ["Salad", "Pizza", "Pasta", "Meat"]; ?>
<body onload="viewData()">
<section class="dashboard_categorie" id="products">
  <div class="container">
    <button id="add_product_toggler">Shto Produkt</button>
    <h1 class="dashboard_section_title" id="add_products_section_title">Shto Produkt</h1>
    <div id="add-form-div">
      <form id="add-form" action="products/action.php?p=add" method="POST" enctype="multipart/form-data">
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
        <button type="submit" onclick="saveData()" >Submit</button>
      </form>
    </div> <!-- add-forme -->
    <h1 class="dashboard_section_title">Shiqo Produktet</h1>
    <div id="display_products" class="display_products" style="overflow-x: auto;">
            
    </div>
  </div> <!-- container -->
  <?php 
         echo errorMessage();
         echo successMessage(); 
   ?>
</section> <!-- #products -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function saveData(){
		var item_name = $('#item_name').val();
		var item_ingridients = $('#item_ingridients').val();
		var item_price = $('#item_price').val();
		var item_categorie = $('#item_categorie').val();
		var image = $('#image').val();
		$.ajax({
			type: "POST",
			url: "products/action.php?p=add",
			data: "item_name="+item_name+"&item_ingridients="+item_ingridients+"&item_price="+item_price+"&item_categorie="+item_categorie+"&image="+image,
			success:function(data){
				$("#add-form")[0].reset();
				viewData();
			}
		});
	}
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
	$("#editForm-"+id).on('submit', function(e){
				
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
					success:function(data){
						viewData();
						console.log(index);
					}
				});
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
			}
		})
	}	
</script>

