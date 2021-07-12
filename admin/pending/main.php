<?php require_once("../../includes/dbh.inc.php") ?>

<section class="dashboard_categorie" id="pending_businesses">
  <div class="container">
    <h1 class="dashboard_section_title" id="pending_businesses_section_title">Bizneset Në Pritje</h1>
    <div class="display_businesses">
      <table class="businesses">
        <tr>
          <th>Emri</th>
          <th>E-mail</th>
          <th>Emri Kompanise</th>
          <th>Qyteti</th>
          <th>Nr. Telefonit</th>
          <th>Aprovo</th>
          <th>Refuzo</th>
        </tr>
        <?php 
          $businessessSql = "SELECT * FROM business WHERE aproved=0";
          $businessessResult = mysqli_query($conn, $businessessSql);
          if (mysqli_num_rows($businessessResult) > 0) {
            while ($business = mysqli_fetch_assoc($businessessResult)) {
              echo "<tr>";
                echo "<th>". $business['name'] ."</th>";
                echo "<th>". $business['email'] ."</th>";
                echo "<th>". $business['company_name'] ."</th>";
                echo "<th>". $business['company_city'] ."</th>";
                echo "<th>". $business['phone_number'] ."</th>";
                echo "<th><button>Aprovo</button></th>";
                echo "<th><button>Refuzo</button></th>";
              echo "</tr>";
            }
          }
        ?>
      </table>
    </div> <!-- .display_businesses -->
  </div> <!-- container -->
</section> <!-- #pending_businesses -->