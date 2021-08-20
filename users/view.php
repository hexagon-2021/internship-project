
	 
<?php 
	include '../includes/dbh.inc.php';
	 include '../includes/session.php';
	include '../includes/functions.inc.php';
	
 ?>
 <?php 
	
	$realUserid = $_SESSION['realUserid'];
	$sql = "SELECT * FROM cart WHERE user_id = '$realUserid' AND status = 'Duke Porositur'; ";
	$query = mysqli_query($conn,$sql);
	if (mysqli_num_rows($query) > 0) {

	
 ?>
<table id="customers">
            <tr>
                <th>Foto</th>
                <th>Emri</th>
                <th>Cmimi Per Njesi</th>
                <th>Sasia</th>
								<th>Cmimi</th>
								<th>Heq</th>
            </tr>
        
		<?php
			
			$total_price = 0;
			$total_quantitie = 0;
			$cart_id = 0;
			
			while ($row = mysqli_fetch_assoc($query)) {
				foreach (explode(", ",$row['products']) as $i => $product_id) {
				$sql2 = "SELECT * FROM product WHERE id = '$product_id' ";
				$query2 = mysqli_query($conn,$sql2);
				$cart_id = $row['id'];
				while ($row2 = mysqli_fetch_assoc($query2)) {
						echo "<tr>";
							echo "<td><img style='width: 100px !important; height: 100px; 'class='card-img-top' src='../dashboard/products/uploads/". $row2['item_picture'] ."'></td>";
							echo "<td><p class='card-text'> ". $row2['item_name'] ."</p></td>";
							echo "<td><p class='card-text'>Cmimi : ". $row2['item_price'] . "€</p></td>";
							echo "<td><p>Sasia: <span style='font-size: 20px;' id='add_quantity_span_". $row2['id'] ."'><i class='fas fa-minus-square remove_quantity change_quantity'></i> <label>". explode(", ", $row['quantities'])[$i] ."</label> <i class='fas fa-plus-square add_quantity change_quantity'></i></span> </p></td>";
							echo "<td><p class='card-text'>Cmimi : ". $row2['item_price'] * explode(", ", $row['quantities'])[$i] . "€</p></td>";
							echo "<td><button class='remove_product' id='remove_product_". $row2['id'] ."'><i class='fas fa-trash-alt'></i></button></td>";
						echo "</tr>";
						// echo $row2['item_price'] . " " . explode(", ", $row['quantities'])[$i] . "<br />";
						$total_price += $row2['item_price'] * explode(", ", $row['quantities'])[$i];
						$total_quantitie += explode(", ", $row['quantities'])[$i];
					}
				}
				echo "<tr>";
					echo "<th style='text-align: center;'>". convert_id($cart_id) ."</th>";
					echo "<th style='text-align: center;'></th>";
					echo "<th style='text-align: center;'></th>";
					echo "<th style='text-align: center;'>$total_quantitie</th>";
					echo "<th style='text-align: center;'>$total_price €</th>";
					echo "<th style='text-align: center;'></th>";
				echo "</tr>";
			}
		?>
</table>
<?php } else { ?>
	<h3 style='text-align: center;margin-top: 15px;margin-bottom: 150px;color: var(--secondary-color);'>Nuk keni produkte ne kartë</h3>
	<?php } ?>
		<?php if (mysqli_num_rows($query) > 0) { ?>
		<center>
			<button id='order_id_"<?php echo $cart_id; ?>"' class='order_current_order'>
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16" style="margin-top: -5px;">
					<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
					<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
				</svg> 
				<label>Porosit</label>
			</button>
		</center>
		<?php } ?>
<div style="width:100%; text-align: center; color:var(--secondary-color)">
			<h1 class="porosiaetashme">Porosite Aktive</h1>
		</div>
			<table id="customers" style="margin-bottom: 100px;">
					<tr>
						<th>Id</th>
						<th>Emri I Produkteve</th>
						<th>Cmimi Total</th>
						<th>Data</th>
					</tr>

		<?php
				$realUserid = $_SESSION['realUserid'];
				$sql3 = "SELECT * FROM cart WHERE user_id = '$realUserid' AND status = 'E Pa Realizuar' ORDER BY id DESC";
				$query3 = mysqli_query($conn,$sql3);
				while ($row2 = mysqli_fetch_assoc($query3)) {
					$products = "";
					$price = 0;
					echo "<tr>";
					foreach (explode(", ",$row2['products']) as $i => $product_id) {
						$sql4 = "SELECT * FROM product WHERE id = '$product_id' ";
						$query4 = mysqli_query($conn,$sql4);
						while ($row3 = mysqli_fetch_assoc($query4)) {
							error_reporting(0);
							$price += $row3['item_price'] * explode(", ", $row2['quantities'])[$i];
							$products .= explode(", ", $row2['quantities'])[$i] . 'x ' . $row3['item_name'] . ' (' . $row3['item_price'] . '$)<br>';
							error_reporting(1);
							// echo "<td><p>".$row2['id'] ."</p></td>";
							// echo "<td><p class='card-text'> ". $row3['item_name'] ."</p></td>";
							// echo "<td><p class='card-text'>Cmimi : ". $row3['item_price'] . "€</p></td>";
							
							
						}
					}
					echo "<td><p>". convert_id($row2['id']) ."</p></td>";
					echo "<td><p>".$products."</p></td>";
					echo "<td><p>Cmimi Total: ".$price."$</p></td>";
					echo "<td style='text-align: left;'><p>". date("d-m-Y", strtotime($row2['date'])) ."</p></td>";
					echo "</tr>";
				}
				
			?>
		</table>


		<div style="width:100%; text-align: center; color:var(--secondary-color)">
			<h1 class="porosiaetashme">Porosite e Perfunduara</h1>
		</div>
		

		<table id="customers">
			<tr>
				<th>Id</th>
				<th>Emri I Produkteve</th>
				<th>Cmimi Total</th>
				<th>Data</th>
			</tr>

<?php
		$realUserid = $_SESSION['realUserid'];
		$sql3 = "SELECT * FROM cart WHERE user_id = '$realUserid' AND status = 'E Realizuar'";
		$query3 = mysqli_query($conn,$sql3);
		while ($row2 = mysqli_fetch_assoc($query3)) {
			$products = "";
			$price = 0;
			echo "<tr>";
			foreach (explode(", ",$row2['products']) as $i => $product_id) {
				$sql4 = "SELECT * FROM product WHERE id = '$product_id' ";
				$query4 = mysqli_query($conn,$sql4);
				while ($row3 = mysqli_fetch_assoc($query4)) {
					$price += $row3['item_price'] * explode(", ", $row2['quantities'])[$i];
					$products .= explode(", ", $row2['quantities'])[$i] . 'x ' . $row3['item_name'] . ' (' . $row3['item_price'] . '$)<br>';
					// echo "<td><p>".$row2['id'] ."</p></td>";
					// echo "<td><p class='card-text'> ". $row3['item_name'] ."</p></td>";
					// echo "<td><p class='card-text'>Cmimi : ". $row3['item_price'] . "€</p></td>";
					
					
				}
			}
			echo "<td><p>". convert_id($row2['id']) ."</p></td>";
			echo "<td><p>".$products."</p></td>";
			echo "<td><p>Cmimi Total: ".$price."$</p></td>";
			echo "<td style='text-align: left;'><p>". date("d-m-Y", strtotime($row2['date'])) ."</p></td>";
			echo "</tr>";
		}
		
	?>
</table>

<script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


	<script>
  
		$("i.change_quantity").click(function() {
			let label = parseInt($(this).siblings("label").html());
			let product_id = $(this).parent()[0].id.split("_")[3];;
			if ($(this).attr("class").split(/\s+/)[2] == "add_quantity") {
				label += 1;
			} else {
				if (label != 1) {
					label -= 1;
				}
			}
			$(this).siblings("label").html(label);
			$.ajax({
				method: "POST",
				url: "change_quantity.php",
				data: {
					product_id: product_id,
					quantity: label
				}, 
				success: function() {
					$("#to_load_cart").load("view.php");
				}
			})
		});

		$("button.remove_product").click(function() {
			let id = this.id.split("_")[2];
			$.ajax({
				method: "POST",
				url: "remove_from_cart.php", 
				data: {
					id: id
				}, 
				success: function(data) {
					$("#to_load_cart").load("view.php");
					$("#navbar > div > i.shopping_cart > label").html(data - 1);
				}
			})
		})
		$("button.order_current_order").click(function() {
			let id = this.id.split("_")[2];
			let final_id = id.substring(1,id.length-1);
			$.ajax({
				method: "POST",
				url: "start_order.php", 
				data: {
					cart_id: final_id
				}, 
				success: function(data) {
					// alert("HDHSDHS");
					$("#to_load_cart").load("view.php");
					// $("#navbar > div > i.shopping_cart > label").html();
				}
			})
		})
	</script>