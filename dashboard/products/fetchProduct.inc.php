
<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php
    $user_id = $_SESSION['userid'];
    $sql = "SELECT * FROM product WHERE business_id = '$user_id' ORDER BY id desc";
    $stmt = mysqli_query($conn, $sql) or die('error');
    if(mysqli_num_rows($stmt) > 0){ ?>
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
            <?php 
                while($row = mysqli_fetch_assoc($stmt)){
                    $id = $row['id'];
                    $itemName = $row['item_name'];
                    $itemPrice = $row['item_price'];
                    $itemIngredients = $row['item_ingridients'];
                    $itemCategorie = $row['item_categorie'];
                    $image = $row['item_picture'];
                    $dateAdded = $row['date_added'];
            ?>
            <tr id="tdata">
                <th><input type="text" name="view_product_edit_product_name" class="view_product_edit_component" value="<?php echo htmlentities($itemName) ?>" /></th>
                <th><img width="50" src="products/uploads/<?php echo htmlentities($image) ?>" alt="item_picture" /></th>
                <th><input type="text" name="view_product_edit_product_ingridients" class="view_product_edit_component" value="<?php echo htmlentities($itemIngredients) ?>" /></th>
                <th><input type="number" step=".01" style="width: 80%;" name="view_product_edit_product_price" class="view_product_edit_component" value="<?php echo htmlentities($itemPrice) ?>" /> €</th>
                <th>
                    <select name="view_product_edit_product_categorie" class="view_product_edit_component">
                        <?php
                            $food_categories = ["Salad", "Fast Food", "Pizza", "Pasta", "Meat" , "Rice" , "Noodles" , "Fish" , "Eggs" , "Desert" , "Fruit", "Vegetables" , "Traditional"]; 
                            $temporary_categorie = "$itemCategorie";
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
                <th><?php echo htmlentities($dateAdded) ?></th>
                <th>
                    <button class="edit_product">Edito</button>
                </th>
                <th>
                    <button class="delete_product">Fshij</button>
                </th>
            </tr>
                            
                </> <!---display_products -->
            <?php
            }  ?>
            </table> <?php                      
    }else{
        $_SESSION["errorMessage"] = "Something went wrong . Try again!";
        header("location: ../index.php");
    }
?>
