<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
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

        if(empty($itemName) || empty($itemIngridients) || empty($itemPrice) || empty($itemCategorie)){
            $_SESSION["errorMessage"] = "Title can't be empty";
            header("location: ../index.php");
        }else{
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
        }
    }
?>