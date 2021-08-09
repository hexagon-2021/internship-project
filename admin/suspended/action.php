<?php 
  require_once('../../includes/dbh.inc.php');
  require_once('../../includes/functions.inc.php');

  if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $action = (int) $_POST['action'];
    mysqli_query($conn, "UPDATE business SET aproved=$action WHERE id=$id");
  } 

  if (isset($_POST['action'])) {
    $id = mysqli_real_escape_string($conn, $_POST['action_id']);
    $status = mysqli_real_escape_string($conn, $_POST['action']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    mysqli_query($conn, "UPDATE business SET status='$status' WHERE id=$id; ");
    sendInboxMessage($conn, 1, $id, $subject, $message, date('Y-m-d'));
    echo "UPDATE business SET status='$status' WHERE id=$id; ";
  }

if (isset($_POST['request'])) {
	$request = $_POST['request'];

	$query = "SELECT * FROM business WHERE company_city ='$request' AND status='Suspended'; ";

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
				<th>Statusi</th>
      	<th>Fshij</th>
    	</tr>

    	<?php
    	 }else{
    	 	echo "Sorry! no record Found";
    	 }


    	?>

	

	
		<?php 
      $status_options = ["Active", "Inactive", "Suspended"];
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
          echo "<th>". $row['name'] ."</th>";
          echo "<th>". $row['email'] ."</th>";
          echo "<th>". $row['company_name'] ."</th>";
          echo "<th>". $row['company_city'] ."</th>";
          echo "<th>". $row['phone_number'] ."</th>";
          echo "<th>";
            echo "<select class='change_business_status' id='change_business_status_".$row['id']."'>";
              echo "<option>". $row['status'] ."</option>";
              foreach ($status_options as $option) {
                if ($option != $row['status']) {
                  echo "<option>$option</option>";
                }
              }
            echo "</select>";
          echo "</th>";
          echo "<th><button class='delete_business_action' value='".$row['id']."' id='delete_business'><i class='fas fa-times-circle'></i></button></th>";
        echo "</tr>";
      }
    ?>
	
</table>
<?php

}

?>

