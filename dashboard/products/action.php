<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php 
    $page = isset($_GET['p'])?$_GET['p']:'';
    $businessId = $_SESSION["userid"];
    if($page == 'add'){
        //$fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
        $itemName = $_POST["item_name"];
        $itemIngridients = $_POST["item_ingridients"];
        $itemPrice = $_POST["item_price"];
        $itemCategorie = $_POST["item_categorie"];
        $image = $_FILES["image"]["name"];
        $target = "uploads/".basename($_FILES["image"]["name"]);

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if(empty($itemName) || empty($itemIngridients) || empty($itemPrice) || empty($itemCategorie) || empty($image)){
            echo "<h1 class='errorMessageChangePassword'>Fields can't be empty! </h1>";
            //header("location: ../index.php");
        }else if (! file_exists($_FILES["image"]["tmp_name"])) {
            echo "<h1 class='errorMessageChangePassword'>Choose image file to upload.</h1>";
            //header("location: ../index.php");
        }    // Validate file input to check if is with valid extension
        else if (! in_array($file_extension, $allowed_image_extension)) {
            echo "<h1 class='errorMessageChangePassword'>Upload valid images. Only PNG and JPEG are allowed. </h1>";
            //header("location: ../index.php");
        }    // Validate image file size
        else if (($_FILES["image"]["size"] > 5000000)) {
            echo "<h1 class='errorMessageChangePassword'>Image size exceeds 5MB </h1>";
            //header("location: ../index.php");
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
                    echo "<h1 class='errorMessageChangePassword'>Image uploaded successfully.</h1>";
                    //header("location: ../index.php");
                    exit();
                }else{
                    echo "<h1 class='errorMessageChangePassword'>Problem in uploading image files.</h1>";
                    //header("location: ../index.php");
                }
            }else{
                echo "<h1 class='errorMessageChangePassword'>Error message.</h1>";
              //header("location: ../index.php");
            }
        }
    }else if($page == 'edit'){
        $itemName = $_POST["item_name"];
        $itemIngridients = $_POST["item_ingridients"];
        $image = $_POST["image"];
        $target = "uploads/".basename($_FILES["image"]["name"]);
        $itemPrice = $_POST["item_price"];
        $itemCategorie = $_POST["item_categorie"];
        $id = $_POST['id'];
        var_dump($id);

        if(!empty($image)){
            $sql = "UPDATE product
                SET item_name='$itemName', item_picture = '$image', item_ingridients='$itemIngridients', item_price='$itemPrice', item_categorie='$itemCategorie'
                WHERE id = '$id'";
        }else{
            $sql = "UPDATE product
                    SET item_name='$itemName', item_ingridients='$itemIngridients', item_price='$itemPrice', item_categorie='$itemCategorie'
                    WHERE id = '$id'";
        }

        $Execute = mysqli_query($conn, $sql);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
        if($Execute){
            $_SESSION["successMessage"] = $target."Product Updated Successfuly";
            
        }else{
            $_SESSION["errorMessage"] = "Something went wrong. Try again!";
        }
    }else if($page == 'delete'){
        $id=$_GET['id'] ;
        $sql = "DELETE FROM product WHERE id='$id'";
        if(mysqli_query($conn, $sql)){
            echo "Records were deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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
                    <form method="POST" id="editForm-<?php echo $row['id'] ?>"  enctype="multipart/form-data">
                        <th><input name="item_name" type="text" id="item_name-<?php echo $row['id']; ?>" name="view_product_edit_product_name" class="view_product_edit_component" value="<?php echo htmlentities($itemName) ?>" /></th>
                        <th>
                            <input name="image" class="transparent_file" id="image-<?php echo $row['id']; ?>" name="image" type="file"/> <img width="60"  src="products/uploads/<?php echo htmlentities($image) ?>" alt="item_picture" />
                        </th>
                        <th><input type="text" name="item_ingridients" id="item_ingridients-<?php echo $row['id']; ?>"  name="view_product_edit_product_ingridients" class="view_product_edit_component" value="<?php echo htmlentities($itemIngredients) ?>" /></th>
                        <th><input type="number" name="item_price" id="item_price-<?php echo $row['id']; ?>" step=".01" style="width: 80%;" name="view_product_edit_product_price" class="view_product_edit_component" value="<?php echo htmlentities($itemPrice) ?>" /> €</th>
                        <th>
                            <select name="item_categorie" id="item_categorie-<?php echo $row['id']; ?>" name="view_product_edit_product_categorie" class="view_product_edit_component">
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
                            <?php if(strlen($dateAdded) > 11){
                                            $changeDate = date("d-m-Y", strtotime($dateAdded));
                                            $dateAdded = substr($changeDate, 0,11);
                                        } ?>
                        <th><?php echo htmlentities($dateAdded)?></th>
                        <th>
                            <button  id="submit" onclick="updateData(<?php echo $row['id']; ?>)" name="submit"  class="edit_product">Edito</button>
                        </th>
                        
                        <th>
                            <button class="delete_product" onclick="deleteData(<?php echo $row['id']; ?>)">Fshij</button>
                        </th>
                        </form> 
                </tr>
                      
                    </> <!---display_products -->
                <?php
                }  ?>
            </table> <?php                      
        }else{
            echo "<table></table>";
        }
    }
?>
