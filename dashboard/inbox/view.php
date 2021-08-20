<?php require_once("../../includes/dbh.inc.php");
  require_once('../../includes/functions.inc.php');
  require_once('../../includes/session.php');
?>
<table class="approved_businesses_table">
  <?php 
    $user_id=$_SESSION['userid'];
    $sql = "SELECT * FROM inbox WHERE receiver_id = $user_id ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <tr>
      <th>From</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Date</th>
    </tr>
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          $sender_id= $row['sender_id'];
          $full_name= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM business WHERE id='$sender_id'"));
          echo "<tr>";
            echo "<th>". $full_name['name'] ."</th>";
            echo "<th>". $row['subject'] ."</th>";
            echo "<th>". $row['message'] ."</th>";
            echo "<th>". $row['data'] ."</th>";
          echo "</tr>";
        }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Your inbox is empty!</h1>";
  } ?>
</table>

