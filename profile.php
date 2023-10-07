<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

    include("connection.php");
    include("functions.php");
    $user_data=check_login($con);
    if(!isset($_SESSION['user_id'])){
      header("location:index.html");
      exit;
    
    }

    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnMor</title>
    <link rel="icon" type="image/png" href="img/favicon.png" >
    <link rel="stylesheet" href="style/general.css">
    <link rel="stylesheet" href="style/profile.css" >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!---ICONS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-bag.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/close.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-right.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/chevron-up.css' rel='stylesheet'>

    <!-----Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Libre+Baskerville&family=Monoton&display=swap" rel="stylesheet">
    
</head>
<body>


  <!--Header-->
  <!--Header-->
  <header id="header">
    <a href="index.html" class="logo"><img src="img/logo.png" alt=""></a>
    <div>
    <ul class="navmenu">
     
      <li><a href="index.html">Home </a></li>
      <li><a href="Products.php">Products</a></li>
      <li><a href="about.html">About</a></li>
    </ul>
    </div>

    <div  class="nav-icon">
      <form id="search_text" class="search">
        <input type="text"  placeholder="Search">
      </form>
      <a><i onclick="search()" id="searchbtn" class="gg-search"></i></a>
      <a id="iconBag" class="icons" ><i class="gg-shopping-bag" id="bag-ickon"></i></a>
      <!--Cart-->
      <div class="cart">
      </div>
               <!--Cart-Close-->
               <i class="gg-close" id="close-cart"></i>
      <a id="iconProfile" class="icons"><i  onclick="poplogin()" class="gg-profile"></i></a>
      <div>
        <i id="menu-icon" class="gg-menu"></i>
      </div>

    
    </div>
  </header>
    <div onclick="scrollUp()" id="scroll-up">
    <a><i  class="gg-chevron-up"></i></a>
  </div> 
    <section id="profile">
      <div class="member_welcome">
        <h4>Hello <?php echo $user_data['user_name'];?>!</h4>
      
        <button onclick="order()" id="order"><i id="icon" class="fa-solid fa-cube "></i> My orders</button>
        <button onclick="settings()" id="setting"><i id="icon" class="fa-solid fa-gear"></i> Settings</button>
        <button id="sign_out" onclick="signout()"><i id="icon" class="fa-solid fa-right-from-bracket"></i> Sign out</button>
      </div>
      <div id="content">
          <h2>My Account</h2>
        <div id="username">
          <b>Username: </b> <a><?php echo $user_data['user_name'];?></a>
        </div>
        <div id="username">
          <b>Email: </b> <a><?php echo $user_data['email'];?></a>
        </div>
        <div id="username">
          <b>Phone number: </b> <a><?php echo $user_data['phone'];?></a>
        </div>
        <div id="username">
          <b>Date: </b>  <a><?php echo $user_data['date'];?></a>    
        </div>
      </div>
      <div id="orders">
          <h2>My purchases</h2>
          <div id="ord_content">
            <h3>We're sorry</h3>
            <span>When you have bought something online you´ll find it here.</span>
          </div>
          <div id="shop_now">
            <a href="Products.php">Continue shopping</a>
          </div>


      </div>
    <div id="settings">

      <div id="details">
        <h2>My Details</h2>
        
        <a id="edit_btn" onclick="edit()"><i class="fa-sharp fa-solid fa-pen-to-square"></i> Edit</a> 
      </div>
        <div id="username">
          <b>Username: </b> <a><?php echo $user_data['user_name'];?></a>
        </div>
        <div id="username">
          <b>Email: </b> <a><?php echo $user_data['email'];?></a>
        </div>
        <div id="username">
          <b>Phone number: </b> <a><?php echo $user_data['phone'];?></a>
        </div>
        <div id="username">
          <b>Date: </b>  <a><?php echo $user_data['date'];?></a>    
        </div>
        <div id="Privacy">
          <h2>Privacy</h2>
          <a id="pass_btn" onclick="change_passBTN()">Change Password</a>
        </div>
    </div>   


    <div id="edit">
      <h2>Edit My Details</h2>
      <form id="edit_form" action="profile.php" method="POST">
        <div id="username">
          <label>Username<a>*</a> </label> 
          <input type="text" name="username" id="username_edit" value="<?php echo $user_data['user_name'];?>" required/>

          <div id="name_errorEdit" class="error"></div>
          <input type="hidden" name="id" value="<?php echo $user_data["user_id"]?>">
        </div>
        <div id="username">
          <label>Email<a>*</a> </label> 
          <input type="email" name="email" id="email_edit" value="<?php echo $user_data['email'];?>"/>

          <div id="email_errorEdit" class="error"></div>
        </div>
        <div id="username">
          <label>Phone number<a>*</a> </label> 
          <input type="numbers" name="phoneNum" id="phone_edit" value="<?php echo $user_data['phone'];?>"/>

          <div id="phone_errorEdit" class="error"></div>
        </div>
        <div id="username">
          <label>Date<a>*</a> </label>  
          <input type="date" name="date" id="date_edit" value="<?php echo $user_data['date'];?>"/>  
          
          <div id="date_errorEdit" class="error"></div>
        </div>
        <div id="send">
        <a onclick="cancel()" id="cancel">CANCEL</a>
        <button id="save" onclick="loading_edit()"><i id="spinner" class=""></i>SAVE</button>
        </div>

      </form>
    </div> 
  <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phoneNum"];
        $date = $_POST["date"];
        $id = $_POST["id"];

        if (!empty($username)&&!empty($email)&&!empty($phone)&&!empty($date)){
          if(!(is_numeric($username))){
            $available="true";

            $query_email= "select * from users where email='$email'";
            $result=mysqli_query($con,$query_email);
            
            if ($result && mysqli_num_rows($result) >=0){
                $user_email = mysqli_fetch_assoc($result);
                
                

                if (($user_email["email"]==$email)&&($user_email["user_id"]!=$id)){
                 $available="false";
                 echo "<script> 

                  document.getElementById('content').style.display='none';
                  document.getElementById('orders').style.display='none';
                  document.getElementById('settings').style.display='none';
                  document.getElementById('edit').style.display='block';
                  
                  var email_errorEdit= document.getElementById('email_errorEdit');
                  var email_text = email_errorEdit.innerText || email_errorEdit.textContent;
                  email_errorEdit.innerHTML = email_text;  
                  email_errorEdit.innerHTML='This email adress already used';
                 
                 
                 </script>";
                 
                 

                }
            }
            $query_phone="select * from users where phone='$phone'";
            $result=mysqli_query($con,$query_phone);
            if ($result && mysqli_num_rows($result) >=0){
                 $user_phone = mysqli_fetch_assoc($result);                   
                 
                 if (($user_phone["phone"]==$phone)&&($user_phone["user_id"]!=$id)){
                      $available="false";

                      echo "<script> 
                      document.getElementById('content').style.display='none';
                      document.getElementById('orders').style.display='none';
                      document.getElementById('settings').style.display='none';
                      document.getElementById('edit').style.display='block';

                      var phone_errorEdit= document.getElementById('phone_errorEdit');
                      var phone_text = phone_errorEdit.innerText || phone_errorEdit.textContent;
                      phone_errorEdit.innerHTML = phone_text;  
                      phone_errorEdit.innerHTML = 'This phone number already used';
                     
                     
                     </script>";
                      



                      
                           
                      }

                 }
            





            if($available=="true"){
              $query_id= "select * from users where user_id ='$user_id' limit 1";
              $result=mysqli_query($con,$query_id);

              if ($result && mysqli_num_rows($result) >= 0){
                $user_id = mysqli_fetch_assoc($result);
                $query = "UPDATE  users SET user_name='$username',  email = '$email' , phone = '$phone' , date = '$date' where user_id = '$id'";
                $query_run= mysqli_query($con,$query);
                echo "<script>window.location ='profile.php';</script>";
                exit;
               
                  
                  
           }


          }

          }
        }

    }

    ?>




    <div id="change_pass">
      <h2>Change Password</h2>

      <form id="pass_form" action="profile.php" method="POST">
        <div id="text">
          <label>Current password<a>*</a> </label>
          
          <input type="password" name="current_pass" id="password_1"><b id="show1" onclick="show_pass1()">SHOW</b>
          <div id="pass1_errorEdit" class="pass_error"></div>

          <input type="hidden" name="id" value="<?php echo $user_data["user_id"]?>">
        </div>
        <div id="text">
          <label>New password<a>*</a> </label>
          <input type="password" name="pass1" id="password_2"><b id="show2" onclick="show_pass2()">SHOW</b>
          <div id="pass2_errorEdit" class="pass_error"></div>

        </div>
        <div id="text">
          <label>Confirm new password<a>*</a> </label>
          <input type="password" name="pass2" id="password_3"><b id="show3" onclick="show_pass3()">SHOW</b>
          <div id="pass3_errorEdit" class="pass_error"></div>
        </div>
        <div id="change_passbts">
          <h2 onclick="cancel()" id="cancel">CANCEL</h2>
          <button disabled  id="save_pass">SAVE</button>
        </div>

      </form>
    </div>
<?php

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $current_pass = $_POST["current_pass"];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        $id = $_POST["id"];

        if(!empty($current_pass)&&!empty($pass1)&&!empty($pass2)){
            $change="true";

          $query_id="select * from users where user_id='$id'";
          $result=mysqli_query($con,$query_id);
          if ($result && mysqli_num_rows($result) >=0){
               $user_id = mysqli_fetch_assoc($result);                   
               
               if (!password_verify($current_pass , $user_data['password'])){ 
                    $change =  "false";
                    echo "
                    <script>
                      document.getElementById('content').style.display='none';
                      document.getElementById('orders').style.display='none';
                      document.getElementById('edit').style.display='none';
                      document.getElementById('settings').style.display='none';
                      document.getElementById('pass_form').reset();
                      document.getElementById('change_pass').style.display='block';


                      var pass1_errorEdit= document.getElementById('pass1_errorEdit');
                      var pass1_text = pass1_errorEdit.innerText || pass1_errorEdit.textContent;
                      pass1_errorEdit.innerHTML = pass1_text;  
                      pass1_errorEdit.innerHTML = 'Wrong current password.';

                    
                    
                    </script>
                    ";
                    
                         
                    }

               }

          if(!($pass1==$pass2)){
            $change =  "false";

            echo "
            <script>
              document.getElementById('content').style.display='none';
              document.getElementById('orders').style.display='none';
              document.getElementById('edit').style.display='none';
              document.getElementById('settings').style.display='none';
              document.getElementById('pass_form').reset();
              document.getElementById('change_pass').style.display='block';


              var pass2_errorEdit= document.getElementById('pass2_errorEdit');
              var pass2_text = pass2_errorEdit.innerText || pass2_errorEdit.textContent;
              pass2_errorEdit.innerHTML = pass2_text;  
              pass2_errorEdit.innerHTML = 'Those passwords didnt match';

            
            
            </script>
            ";


          }    
          
          if($change=="true"){
            $query_id= "select * from users where users_id ='$user_id' limit 1";
            $result=mysqli_query($con,$query_id);

            if ($result && mysqli_num_rows($result) >= 0){
              $user_id = mysqli_fetch_assoc($result);
              $pass_change=password_hash($pass2, PASSWORD_DEFAULT);
              $query = "UPDATE  users SET password='$pass_change' where user_id = '$id'";
              $query_run= mysqli_query($con,$query);
              echo "<script>window.location ='profile.php';</script>";
              exit;
             
                
                
         }


        }


        }
      
      
      
      }

?>
    </section>
    
    <script src="script.js"></script>
    <script src="cart.js"></script>

</body>
</html>
