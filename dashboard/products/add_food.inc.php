<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php 
    $_SESSION["trackingURL"] = $_SERVER["PHP_SELF"];
    confirmLogin();
?>
<?php 
  if(isset($_POST["submit"])){
    $itemName = $_POST["item_name"];
    $itemIngridients = $_POST["item_ingridients"];
    $image = $_FILES["image"]["name"];
    $target = "uploads/".basename($_FILES["image"]["name"]);
    $itemPrice = $_POST["item_price"];
    $itemCategorie = $_POST["item_categorie"];

    if(empty($itemName) ){
      echo "Field can't be empty";
    }
    $sql = "INSERT INTO product (business_id, item_name, item_picture, item_ingridients, item_price, item_categorie)";
    $sql .= "VALUES (?, ?, ?, ?, ?,? )";
    if($stmt = mysqli_prepare($conn, $sql)){
      $stmt->bind_param("isssis", $business_id, $item_Name, $item_Picture, $item_Ingridients, $item_Price, $item_Categorie);
      
      $business_id = 1;
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
    }
  }
?>