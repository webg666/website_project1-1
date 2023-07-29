<?php

session_start();
    include("connection.php");
    include("functions.php");
    $user_data=check_login($con);


    if ($_SERVER["REQUEST_METHOD"]="POST")
    {
        $code = $_POST["code"];
        $email = $_SESSION['user_email'];

        if(!empty($code)&&!empty($email)){

            $query= "select * from users where email ='$email' limit 1";
            $result=mysqli_query($con,$query);


            if ($result && mysqli_num_rows($result) >= 0){
                $user_data = mysqli_fetch_assoc($result);

                if ($code==$user_data["verification_code"]){

                    $query = "UPDATE  users SET email_verified_at=NOW() where email = '$email' ";
                    $query_run= mysqli_query($con,$query);
                    $_SESSION['user_id']=$user_data['user_id'];
                    unset($_SESSION['user_email']);
                    echo "login";
                }else
                    echo "false";
            }

       

    }







    }