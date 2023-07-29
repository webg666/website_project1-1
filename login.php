<body>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
    include("connection.php");
    include("functions.php");

    $user_data=check_login($con);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

    

    if ($_SERVER["REQUEST_METHOD"]="POST")
    {

       $email = $_POST["email"];
       $password = $_POST["login_password"];
       

       
       if(!empty($email) && !empty($password)){
        
            
            
                $query= "select * from users where email ='$email' limit 1";
                $result=mysqli_query($con,$query);

               

                if ($result && mysqli_num_rows($result) >= 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if (password_verify($_POST["login_password"] , $user_data['password'])){
                        if($user_data['email_verified_at']==null){
                            echo "email";
                            $mail = new PHPMailer(true);

                            $mail->isSMTP();
                    
                       
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->Username = "webg333@gmail.com";
                            $mail->Password = "uftkhnqvpwefohcz";
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port = 465;
                       
                    
                       
                            $mail->set('webg333@gmail.com');
                            $mail->addAddress($email);
                       
                            $mail->isHTML(true); 
                       
                            $mail->Subject = "Verification Code";
                            $code = random_num($lenght);
                            $mail->Body = "The verification code is ".$code;
                            $mail->send();
                            $query = "UPDATE  users SET verification_code='$code' where email = '$email' ";
                            $query_run= mysqli_query($con,$query);
                            $_SESSION['user_email']=$user_data['email'];
                        }
                        else{
                        $_SESSION['user_id']=$user_data['user_id'];
                            echo "login";
                        }
                      
                    
                    }
                }
            }
                }

       

        
   
       
    
     
     
     
?>
</body>