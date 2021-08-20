<?php
    require_once('includes/dbh.inc.php');
    require_once('includes/session.php');
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($conn, "SELECT * FROM `password_reset` WHERE `key`='".$key."' and `email`='".$email."';");
        $row = mysqli_num_rows($query);
        
        if ($row==0){
            $_SESSION["errorMessage"] = "Invalid Link
            The link is invalid/expired. Either you did not copy the correct link
            from the email, or you have already used the key in which case it is 
            deactivated.";
            header('location: sendEmail.php');
	    }else{
            $row = mysqli_fetch_assoc($query);
            $expDate = $row['expDate'];
            if ($expDate >= $curDate){ ?>
                
                <?php include 'includes/resetPassword.inc.php'; ?>
                <form method="post" action="" name="update">
                    <div class="resetPasswordItems">

                        <h1 class="resetPassword">Reset Password</h1></strong>
                        <input type="hidden" name="action" value="update" />
                        <br /><br />

                        <input type="password" name="pass1" class="passwordField" placeholder="Enter New Password:"  required />
                        <br /><br />

                        <input type="password" name="pass2" class="passwordField" placeholder="Re-Enter New Password:" required/>
                        <br /><br />

                        <input type="hidden" name="email" value="<?php echo $email;?>"/>
                        <button class="resetPasswordButton" type="submit" >Reset Password</button></br>

                        <?php 
                            echo errorMessage();
                            echo successMessage();
                        ?>
                    </div>
                </form>
            <?php
            }else{
                $_SESSION["errorMessage"] =  "Link Expired
                The link is expired. You are trying to use the expired link which 
                as valid only 24 hours (1 days after request).";
                header('location: sendEmail.php');
            }
        }		
    } // isset email key validate end


    if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
        $error="";
        $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
        $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
        $email = $_POST["email"];
        $curDate = date("Y-m-d H:i:s");
        if ($pass1!=$pass2){
            $_SESSION["errorMessage"]= "Password do not match, both password should be same.";
            header('location: '.$_SERVER['REQUEST_URI']);
        }else{
            $pass1 = password_hash($pass1, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE `business` SET `password`='".$pass1."'  WHERE `email`='".$email."';");

            mysqli_query($conn,"DELETE FROM `password_reset` WHERE `email`='".$email."';");
                
            $_SESSION["errorMessage"] = 'Congratulations! Your password has been updated successfully.';
            header('location: sendEmail.php');
        }		
    }
?>