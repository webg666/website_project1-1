<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

    include("connection.php");
    include("functions.php");
    $_SESSION['admin'];
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {

       $admin_email = $_POST["admin_email"];
       $admin_password = $_POST["admin_password"];
       
       if (!empty($admin_email)&&!empty($admin_password)){
            if($admin_email=="webg333@gmail.com" && $admin_password=="123pontikos"){
                $_SESSION['admin']=true;
                header("location:admin_page.php");


            }else{
                $_SESSION['admin']=false;
            }

       }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<section id="login">
    <h1>Admin Login</h1>
    <form action="admin_login.php" method="post" id="login_form">
        <div class="text_field">
            <input type="text" name="admin_email" placeholder="Email" required >  
        </div>
        <div class="text_field">
            <input type="password" name ="admin_password" id ="login_password" placeholder="Password" required> 
            <a><i onclick="login_pass()" class="fa-solid fa-eye" id="login_pass"></i></a>
        </div>
        <a id="error"><?php if($_SESSION['admin']==false){
                       if (!empty($admin_email)&&!empty($admin_password)){
                        echo "*wrong email or pass*";
                       }
                    }?>
        </a>
        <div id="status_login"></div>
        <input type="submit" id="submit_login" value="Login">

    </form>
</section>
<script src="script.js"></script>
</body>
</html>
<?php
if(isset($_SESSION['previous'])){
    if(basename($_SERVER['PHP_SELF']) != $_SESSION['previous']){
        session_destroy();
    }
}
?>
