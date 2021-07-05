<?php require_once("dbh.php") ?>
<?php require_once("functions.inc.php") ?>
<?php require_once("sessions.php") ?>
<?php confirmLogin(); ?>
<?php 
    $idFromURL = $_GET["id"];
?>
<?php 
    if(isset($_POST["submit"])){
        $itemName = $_POST["item_name"];
        $itemIngridients = $_POST["item_ingridients"];
        $image = $_FILES["image"]["name"];
        $target = "uploads/".basename($_FILES["image"]["name"]);
        $itemPrice = $_POST["item_price"];
        $itemCategorie = $_POST["item_categorie"];
        $businessId = $_SESSION["userid"];

        if(empty($itemName) || empty($itemIngridients) || empty($itemPrice) || empty($itemName) || empty($itemCategorie)){
            $_SESSION["errorMessage"] = "Fields can't be empty";
            header("location: ../editProduct.php");
        }else{
            global $conn;
            if(!empty($_FILES["image"]["name"])){
                $sql = "UPDATE product
                    SET item_name='$itemName', image = '$image', item_ingridients='$itemIngridients', item_price='$itemPrice', item_categorie = '$itemCategorie'
                    WHERE id = '$idFromURL'";
                }else{
                    $sql = "UPDATE product
                            SET item_name='$itemName', item_ingridients='$itemIngridients', item_price='$itemPrice', item_categorie = '$itemCategorie'
                            WHERE id = '$idFromURL'";
                }
            $Execute = $conn->query($sql);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
            if($Execute){
                $_SESSION["successMessage"] = "Post Updated Successfuly";
                header("location: posts.php");
            }else{
                $_SESSION["errorMessage"] = "Something went wrong. Try again!";
                header("location: editPost.php?id=<?php echo $idFromURL ?>");
            }
        }
    }//Ending of Submit button If-Condition
?>