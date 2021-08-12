<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php confirmLogin(); ?>
<?php 
    $idFromURL = $_SESSION["userid"];
?>
<?php 
    if(isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["companyName"]) && isset($_POST["companyCity"]) && isset($_POST["phoneNumber"])){
        $username = $_POST["username"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $company_name = $_POST["companyName"];
        $company_city = $_POST["companyCity"];
        $image = $_FILES["image"]["name"];
        $target = "company_logo/".basename($_FILES["image"]["name"]);
        $phone_number = $_POST["phoneNumber"];
        if(empty($name) || empty($email) || empty($company_name) || empty($company_city) || empty($phone_number)){
            echo "<h1 class='errorMessageChangePassword'>All fileds should be filled! </h1>";
            //header("location: ../index.php");
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<h1 class='errorMessageChangePassword'>Invalid email format </h1>";
        }else if(!preg_match ("/^[0-9]*$/", $phone_number)){
            echo "<h1 class='errorMessageChangePassword'>Only numeric value is allowed! </h1>";
        }else{
            if(!empty($_FILES["image"]["name"])){
                $sql = "UPDATE business
                    SET name='$name', email='$email', company_name='$company_name', company_city='$company_city', company_logo='$image', phone_number='$phone_number'
                    WHERE id = '$idFromURL'";
                }else{
                    $sql = "UPDATE `business`
                    SET username='$username', name='$name', email='$email', company_name='$company_name', company_city='$company_city', phone_number='$phone_number'
                    WHERE id = '$idFromURL'";
                }
            $Execute = mysqli_query($conn, $sql);
            
            if($Execute){
                move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                echo "<h1 class='errorMessageChangePassword'>Profile Updated Successfuly </h1>";
                //header("location: ../index.php");
            }else{
                echo  "<h1 class='errorMessageChangePassword'>Something went wrong. Try again! </h1>";
                //header("location: ../index.php");
            }
        }
    }
?>