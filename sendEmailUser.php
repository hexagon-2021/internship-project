<?php 
    require_once("includes/dbh.inc.php");
    require_once('includes/session.php');
    if(isset($_SESSION['userid'])){
		header('location: dashboard');
	}
    if(isset($_POST['email']) && (!empty($_POST['email']))){
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $error = "";
        if(!$email){
            $_SESSION["errorMessage"] = "Invalid email address please type a valid email address!";
            header("location: sendEmailUser.php");
        }else{
            $query = "SELECT * FROM `users` WHERE email='".$email."'";
            $results = mysqli_query($conn, $query);
            $row = mysqli_num_rows($results);
            if ($row==0){
                $_SESSION["errorMessage"] = "No user is registered with this email address!";
                header("location: sendEmailUser.php");
            }else{
                $expFormat = mktime(
                date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                );
                $expDate = date("Y-m-d H:i:s",$expFormat);
                $key = md5(2418*2);
                
                $addKey = substr(md5(uniqid(rand(),1)),3,10);
                $key = $key . $addKey;

                mysqli_query($conn, "INSERT INTO `password_reset` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");

                $output='<p>Dear user,</p>';
                $output.='<p>Please click on the following link to reset your password.</p>';
                $output.='<p>-------------------------------------------------------------</p>';
                $output.='<p><a href="https://localhost/internship-project/resetUsersPassword.php?
                key='.$key.'&email='.$email.'&action=reset" target="_blank">
                https://localhost/internship-project/resetUsersPassword.php
                ?key='.$key.'&email='.$email.'&action=reset</a></p>';		
                $output.='<p>-------------------------------------------------------------</p>';
                $output.='<p>Please be sure to copy the entire link into your browser.
                The link will expire after 1 day for security reason.</p>';
                $output.='<p>If you did not request this forgotten password email, no action 
                is needed, your password will not be reset. However, you may want to log into 
                your account and change your security password as someone may have guessed it.</p>';   	
                $output.='<p>Thanks,</p>';

                $body = $output; 
                $subject = "Password Recovery - EaglEats.com";

                $email_to = $email;
                $fromserver = "noreply@eagleats.com"; 
                require_once("PHPMailer/PHPMailerAutoload.php");
                
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '0c76f71bb7ec12';
                $mail->Password = 'b77249c93b94ca';
                $mail->IsHTML(true);
                $mail->From = "noreply@eagleats.com";
                $mail->FromName = "EaglEats";
                $mail->Sender = $fromserver; // indicates ReturnPath header
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($email_to);

                if(!$mail->Send()){
                    $_SESSION["errorMessage"] = "Mailer Error: " . $mail->ErrorInfo;
                    header("location: sendEmailUser.php");
                }else{
                    $_SESSION["successMessage"] =  "An email has been sent to you with instructions on how to reset your password";
                    header("location: sendEmailUser.php");
                }
            }
        }
    }else{?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Send Email</title>
                <link rel="stylesheet" type="text/css" href="css/style.css">
            </head>
            <body>
                <?php $active= "Log In"; include 'includes/nav.inc.php'; ?>	
                <form method="POST" action="" name="reset"><br /><br />
                    <div class="resetPasswordItems">
                        <h1 class="resetPassword">Enter Your Email Address:</h1></strong><br /><br />
                        <input class="sendEmailInput" type="email" name="email" placeholder="example@email.com" />
                        <br /><br />
                        <button type="submit" class="resetPasswordButton">Reset Password</button>
                        <?php 
                            echo errorMessage();
                            echo successMessage();
                        ?>
                    </div>
                </form>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p> 
            </body>
            <script src="https://kit.fontawesome.com/7071bdd24d.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="js/main.js"></script>
        </html>

            <?php
    }
?>
