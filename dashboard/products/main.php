<?php require_once("../../includes/dbh.inc.php") ?>
<?php require_once("../../includes/functions.inc.php") ?>
<?php require_once("../../includes/session.php") ?>
<?php $food_categories = ["Salad", "Pizza", "Pasta", "Meat"]; ?>
<section class="dashboard_categorie" id="products">
  <div class="container">
    <button id="add_product_toggler">Shto Produkt</button>
    <h1 class="dashboard_section_title" id="add_products_section_title">Shto Produkt</h1>
    <div id="add-form-div">
      <form id="add-form" action="products/add_food.inc.php" method="POST" enctype="multipart/form-data">
        <input class="input-form" type="text" name="item_name" placeholder="Item Name">
        <input class="input-form" type="textarea" name="item_ingridients"  placeholder="Item Ingridients">
        <input class="input-form" type="number" name="item_price" placeholder="Item Price" step=".01">
        <select class="input-form" name="item_categorie">
          <?php
            foreach ($food_categories as $food_categorie) {
              echo "<option value='$food_categorie'>$food_categorie</option>";
            }
          ?>
        </select>
        <input class="input-form" class="custum-file-input" type="file" name="image" >
        <button type="submit" name="submit" class="">Submit</button>
      </form>
    </div> <!-- add-forme -->
    <h1 class="dashboard_section_title">Shiqo Produktet</h1>
    <div class="display_products" style="overflow-x: auto;">
      <table>
        <tr>
          <th>Emri i Produktit</th>
          <th>Foto</th>
          <th>Perberesit</th>
          <th>Cmimi</th>
          <th>Kategoria</th>
          <th>Shiqimet</th>
          <th>Data</th>
          <th>Edito Produktin</th>
          <th>Fshij Produktin</th>
        </tr>
        <tr>
          <th><input type="text" name="view_product_edit_product_name" class="view_product_edit_component" value="test" /></th>
          <th><img width="50" src="products/uploads/polygon1Square__800_800.png" alt="item_picture" /></th>
          <th><input type="text" name="view_product_edit_product_ingridients" class="view_product_edit_component" value="test, test, test" /></th>
          <th><input type="number" step=".01" style="width: 80%;" name="view_product_edit_product_price" class="view_product_edit_component" value="5.00" /> €</th>
          <th>
            <select name="view_product_edit_product_categorie" class="view_product_edit_component">
              <?php
                $temporary_categorie = "Pizza";
                echo "<option value='$temporary_categorie'>$temporary_categorie</option>";
                foreach ($food_categories as $food_categorie) {
                  if ($temporary_categorie != $food_categorie) {
                    echo "<option value='$food_categorie'>$food_categorie</option>";
                  }
                }
              ?>
            </select>
          </th>
          <th>2</th>
          <th>29-06-2021</th>
          <th>
            <button class="edit_product">Edito</button>
          </th>
          <th>
            <button class="delete_product">Fshij</button>
          </th>
        </tr>
      </table>
      <?php 
        echo errorMessage();
        echo successMessage(); 
      ?>
    </div> <!---display_products -->
  </div> <!-- container -->
</section> <!-- #products -->
