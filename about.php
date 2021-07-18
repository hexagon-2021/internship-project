<?php require_once('includes/dbh.inc.php'); ?>
<?php require_once('includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rreth Nesh</title>
  <link rel="stylesheet" href="/internship-project/css/style.css" />
</head>
<body>
  <?php $active = "Rreth Nesh"; include 'includes/nav.inc.php'; ?>
  <section id="about_us_section">
    <div class="container">
      <h1 class="title">Rreth Nesh</h1>
      <div class="content">
        <p class="about_us_section_quick_about">
          "Ordering Website" është platforma e vetme që do ju duhet ndonjëherë për porositjen e ushqimeve. Platforma jonë ofron mundësinë që ju të zgjedhni qytetin prej nga jeni dhe në sekond ju rekomandon ushqimet më të mira, lira dhe më të vlefshme për ju. Me një klikim të vetëm ju mund të zgjedhni kategorinë tuaj të preferuar të ushqimeve.
        </p>
        <?php ?>
      </div> <!-- content -->
      <h1 class="title">Vlerwsimet</h1>
      <div id="ratings">
        <?php 
          $ratingsSql = "SELECT * FROM ratings; ";
          $ratingsResult = mysqli_query($conn, $ratingsSql);
          if (mysqli_num_rows($ratingsResult) > 0) {
            echo "<table>";
              echo  "<tr>";
                echo "<th>User</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
              echo "</tr>";
              while ($rating = mysqli_fetch_assoc($ratingsResult)) {
                echo "<tr>";
                  echo "<th>Drin Ramadani</th>";
                  echo "<th>";
                    for ($i = 1;$i <= 5;$i++) {
                      if ($i <= $rating['rating']) {
                        echo '<i class="fas fa-star"></i>';
                      } else {
                        echo '<i class="far fa-star"></i>';
                      }
                    }
                  echo "</th>";
                  echo "<th>". date('d-m-Y', strtotime($rating['date_added'])) ."</th>";
                echo "</tr>";
              }
            echo "</table>";
          }
        ?>
      </div> <!-- ratings -->
    </div> <!-- container -->
  </section>
  <script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/internship-project/js/main.js"></script>
</body>
</html>