<?php require_once("../../includes/dbh.inc.php");  ?>
<?php require_once("../../includes/functions.inc.php");  ?>
<?php require_once("../../includes/session.php"); ?>
<?php 
    
if(isset($_SESSION['username'])){

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
        $username = $_SESSION['username'];
        $query = "select * from business where username = '$username'";
        $run = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($run);
        $user_password = $row[2];
        $user_id = $row[0];
        // echo $user_password;
        


        $current_password = $_POST['op'];
        $new_password = $_POST['np'];
        $confirm_password = $_POST['c_np'];
        $hashOldPassword = password_hash($current_password, PASSWORD_DEFAULT);
        $hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
        $pwdOldHashed = $user_password;
        $checkPwd = password_verify($current_password, $pwdOldHashed);
        // $pwdverify =  password_verify($hashOldPassword , $user_password);

        // if ($current_password == password_verify($current_password, $user_password)) {
           
        // }

        if($new_password != $confirm_password){
            echo "<h1 class='errorMessageChangePassword'>New Password And Confirm Password must be identical !</h1>";
         }else

        if ($current_password == password_verify($current_password, $user_password)) {
            
            $query = "update business set password = '$hashedPwd' where id = '$user_id'";
            $run = mysqli_query($conn,$query);
            if ($run) {
                    echo "<h1 class='errorMessageChangePassword'>Password has been changed Successfully !</h1>";
                }
               else{
                echo "<h1 class='errorMessageChangePassword'>Change Password Failed !</h1>";
               }
        }else{
             echo "<h1 class='errorMessageChangePassword'>Current Password is invalid !";
        } 
        
        
    }


}else{
    echo "gabim";
}

