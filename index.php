<?php 
require_once('includes/dbh.inc.php'); 
require_once('includes/session.php'); 
require_once('includes/functions.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project Name</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <?php $active="Ballina"; include 'includes/nav.inc.php'; ?>
  
  <div id="home_page">
    <div class="clickbait">
      <div class="row">
        <div class="col-4 clickbait_item">
          <i class="fas fa-search-location"></i>
          <label>Zgjedh Qytetin Tuaj</label>
        </div>
        <div class="col-4 clickbait_item">
          <i class="fas fa-shopping-basket"></i>
          <label>Zgjedh Ushqimin</label>
        </div>
        <div class="col-4 clickbait_item">
          <i class="fas fa-money-bill-wave"></i>
          <label>Paguaj Si Te Duash</label>
        </div>
      </div> <!-- row -->
    </div> <!-- clickbait-->
    <div id="choose_city">
      <h3>Zgjedh Qytetin</h3>
      <div class="cities_to_select">
        <button class='city_selectable'><label>1</label>. Prishtinë</button>
        <button class='city_selectable'><label>2</label>. Mitrovicë</button>
        <button class='city_selectable'><label>3</label>. Pejë</button>
        <button class='city_selectable'><label>4</label>. Prizren</button>
        <button class='city_selectable'><label>5</label>. Ferizaj</button>
        <button class='city_selectable'><label>6</label>. Gjilan</button>
        <button class='city_selectable'><label>7</label>. Gjakovë</button>
      </div>
    </div>
    <!-- <img src="https://www.recipetineats.com/wp-content/uploads/2020/02/Chicken-Burritos_2.jpg?w=500&h=500&crop=1" alt="burrito" /> -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/RedDot_Burger.jpg/1200px-RedDot_Burger.jpg" alt="hamburger" />
  </div> <!-- #home_page -->

  <script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>
</html>
