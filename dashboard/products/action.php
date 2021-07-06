<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php 
    $page = isset($_GET['p'])?$_GET['p']:'';
    $businessId = $_SESSION["userid"];
    if($page == 'add'){
        $itemName = $_POST["item_name"];
        $itemIngridients = $_POST["item_ingridients"];
        $itemPrice = $_POST["item_price"];
        $itemCategorie = $_POST["item_categorie"];
        $image = $_FILES["image"]["name"];
        $target = "uploads/".basename($_FILES["image"]["name"]);
    
        if(empty($itemName) || empty($itemIngridients) || empty($itemPrice) || empty($itemCategorie) || empty($image)){
            $_SESSION["errorMessage"] = "Fields can't be empty";
            header("location: ../index.php");
        }else{
            $sql = "INSERT INTO product (business_id, item_name, item_picture, item_ingridients, item_price, item_categorie)";
            $sql .= "VALUES (?, ?, ?, ?, ?,? )";
            if($stmt = mysqli_prepare($conn, $sql)){
            $stmt->bind_param("isssis", $business_id, $item_Name, $item_Picture, $item_Ingridients, $item_Price, $item_Categorie);
            
            $business_id = $businessId;
            $item_Name = $itemName;
            $item_Picture = $image;
            $item_Ingridients = $itemIngridients;
            $item_Price = $itemPrice;
            $item_Categorie = $itemCategorie;
        
            if($execute = mysqli_stmt_execute($stmt)) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                $_SESSION["successMessage"] = "Product added successfully";
                header("location: ../index.php");
                exit();
            }else{
                $_SESSION["errorMessage"] = "Something went wrong . Try again!";
                header("location: ../index.php");
            }
            }else{
            $_SESSION["errorMessage"] = "Error Message";
            header("location: ../index.php");
            }
        }
    }else if($page == 'edit'){
        $itemName = $_POST["item_name"];
        $itemIngridients = $_POST["item_ingridients"];
        $image = $_FILES["image"]["name"];
        $target = "uploads/".basename($_FILES["image"]["name"]);
        $itemPrice = $_POST["item_price"];
        $itemCategorie = $_POST["item_categorie"];

        if(!empty($_FILES["image"]["name"])){
            $sql = "UPDATE product
                SET item_name='$itemName', item_picture = '$image', item_ingridients='$itemIngridients, item_price='$itemPrice', item_categorie='$itemCategorie'
                WHERE id = '$idFromURL'";
        }else{
            $sql = "UPDATE product
                    SET item_name='$itemName', item_ingridients='$itemIngridients, item_price='$itemPrice', item_categorie='$itemCategorie'
                    WHERE id = '$idFromURL'";
        }
        $Execute = mysqli_query($con, $sql);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
        if($Execute){
            $_SESSION["successMessage"] = "Product Updated Successfuly";
            header("location: ../index.php");
        }else{
            $_SESSION["errorMessage"] = "Something went wrong. Try again!";
            header("location: ../index.php");
        }
    }else{
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
                    <form method="POST">
                        <th><input type="text" id="item_name-<?php echo $row['id']; ?>" name="view_product_edit_product_name" class="view_product_edit_component" value="<?php echo htmlentities($itemName) ?>" /></th>
                        <th><img width="50" id="item_picture-<?php echo $row['id']; ?>" src="products/uploads/<?php echo htmlentities($image) ?>" alt="item_picture" /></th>
                        <th><input type="text" id="item_ingridients-<?php echo $row['id']; ?>"  name="view_product_edit_product_ingridients" class="view_product_edit_component" value="<?php echo htmlentities($itemIngredients) ?>" /></th>
                        <th><input type="number" id="item_price-<?php echo $row['id']; ?>" step=".01" style="width: 80%;" name="view_product_edit_product_price" class="view_product_edit_component" value="<?php echo htmlentities($itemPrice) ?>" /> €</th>
                        <th>
                            <select id="item_categorie-<?php echo $row['id']; ?>" name="view_product_edit_product_categorie" class="view_product_edit_component">
                                <?php
                                    $food_categories = ["Salad", "Pizza", "Pasta", "Meat"]; 
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
                            <button type="submit" onclick="updateData(<?php echo $row['id']; ?>)" class="edit_product">Edito</button>
                        </th>
                        <th>
                            <button class="delete_product">Fshij</button>
                        </th>
                    </form>
                </tr>
                                
                    </> <!---display_products -->
                <?php
                }  ?>
            </table> <?php                      
        }else{
            $_SESSION["errorMessage"] = "Something went wrong . Try again!";
            header("location: ../index.php");
        }
    }
?>