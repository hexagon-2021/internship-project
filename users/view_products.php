<?php 
	include '../includes/dbh.inc.php';
	 include '../includes/session.php';
	include '../includes/functions.inc.php';
	
 ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<?php
	// session_start();
	$_SESSION['realUserid'] = 1;
	$active = 'Ballina'; include '../includes/nav.inc.php';
?>
	<div style="width: 100%; text-align: center; color:var(--secondary-color);clear: both;">
		<h1 class="porosiaetashme">Porosia e tashme</h1>
	</div>
	

	
	<table id="customers">
            <tr>
                <th>Foto</th>
                <th>Emri</th>
                <th>Cmimi</th>
                <th>Sasia</th>
            </tr>
        
<?php
	$realUserid = $_SESSION['realUserid'];
		$sql = "SELECT * FROM cart WHERE user_id = '$realUserid' AND status = 'E Pa Realizuar'";
		$query = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($query)) {
			foreach (explode(", ",$row['products']) as $i => $product_id) {
			$sql2 = "SELECT * FROM product WHERE id = '$product_id' ";
			$query2 = mysqli_query($conn,$sql2);
			while ($row2 = mysqli_fetch_assoc($query2)) {
				echo "<tr>";
					echo "<td><img style=' width: 100px !important 'class='card-img-top' src='../dashboard/products/uploads/". $row2['item_picture'] ."'></td>";
					echo "<td><p class='card-text'> ". $row2['item_name'] ."</p></td>";
					echo "<td><p class='card-text'>Cmimi Total : ". $row2['item_price'] . "€</p></td>";
					echo "<td><p>Sasia: ". explode(", ", $row['quantities'])[$i] ."</p></td>";
				echo "</tr>";
				}
			}
		}
		?>
		</table>

		<div style="width:100%; text-align: center; color:var(--secondary-color)">
			<h1 class="porosiaetashme">Porosia e Perfunduara</h1>
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
			echo "<td><p>#".$row2['id'] ."</p></td>";
			echo "<td><p>".$products."</p></td>";
			echo "<td><p>Cmimi Total: ".$price."$</p></td>";
			echo "<td><p>". date("d-m-Y", strtotime($row2['date'])) ."</p></td>";
			echo "</tr>";
		}
		
	?>
</table>


<script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/dashboard.js"></script>
<script src="../js/main.js"></script>