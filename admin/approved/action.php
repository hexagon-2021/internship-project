<?php 
  require_once('../../includes/dbh.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    mysqli_query($conn, "DELETE FROM business WHERE id=$id LIMIT 1");
  } 

if (isset($_POST['request'])) {
	$request = $_POST['request'];

	$query = "SELECT * FROM business WHERE company_city ='$request'";

	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);


?>

<table class="approved_businesses_table">
	<?php
	 if ($count) {
	 	
	
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
    	 }else{
    	 	echo "Sorry! no record Found";
    	 }


    	?>

	

	
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
	
</table>
<?php

}

?>

