<?php

session_start();
  include("connection.php");
  include("functions.php");



  $sql = "SELECT * FROM  products";
  $all_products = $con->query($sql);
  $all_products2 = $con->query($sql);
  if ($_SERVER["REQUEST_METHOD"]=="GET")
  {
        $id = $_GET["id"];



      
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
    <link rel="stylesheet" href="style/sproduct.css">
    <link rel="stylesheet" href="style/general.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
  <!---ICONS-->
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-bag.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/close.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/arrow-right.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/chevron-up.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/remove-r.css' rel='stylesheet'>

    <!-----Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Libre+Baskerville&family=Monoton&display=swap" rel="stylesheet">
</head>
<body>


    <!----------HEADER----->
    <header id="header">
        <a href="index.html" class="logo"><img src="img/logo.png" alt=""></a>
     
      <ul class="navmenu">
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="Products.php">Products</a></li>
        <li><a href="about.html">About</a></li>
      </ul>

      <div  class="nav-icon">
        <div id="search_text" class="search">
          <input type="text"  placeholder="Search">
        </div>
        <a><i onclick="search()" id="searchbtn" class="gg-search"></i></a>
        <a id="iconBag" class="icons" > <i id="dot" class="fa-solid fa-circle"></i> <i class="gg-shopping-bag" id="bag-ickon"></i></a>
        <!--Cart-->
        <div class="cart">
        </div>
        <i class="gg-close" id="close-cart"></i>

        <a id="iconProfile" class="icons"><i  onclick="poplogin()" class="gg-profile"></i></a>
        <div  id="menu-icon">
          <i  class="gg-menu"></i>
        </div>
      
      </div>
    </header>



<!--LOGIN----->
<div class="fullscreen-container">
<section id="login">
  <h1>Login</h1>
  <form action="login.php" method="post" id="login_form">
      <div class="text_field">
          <input type="text" name="email" id="login_email" required > <span></span> <label>Email</label>
      </div>
      <div class="text_field">
          <input type="password" name ="login_password" id ="login_password" required><span></span> <label>Password</label>
          <a><i onclick="login_pass()" class="fa-solid fa-eye" id="login_pass"></i></a>
      </div>
      <div id="status_login"></div>
      <button type="submit" id="submit_login" onclick="loading_login()" value="Login" disabled><i id="spinner" class=""></i>Login</button>
      <div class="signup_link">
          Not a member? <a id="signclick" onclick="popsign()">Sign up</a>
          
      </div>
  </form>
  <script>

    $("#submit_login").click( function() {
    
      $.post( $("#login_form").attr("action"),
              $("#login_form :input").serializeArray(),
          function (info) {
    
           
            $("#response").empty();
            $("#response").html(info);
            check_av1();  
           
          });
    
      $("#login_form").submit( function() {
        return false;  
      });
    });
   
   function check_av1(){
    var element = document.getElementById('response');
    var status = document.getElementById('status_login');
    var text = element.innerText || element.textContent;
    element.innerHTML = text;
    var status_text = status.innerText || status.textContent;
    status.innerHTML = status_text;
    let submit_login=document.getElementById("submit_login");

    
    if (text=="login"){
      localStorage.setItem("text",text);
      location.reload();

    }
    else if (text=="email"){
      document.getElementById('login').style.display = 'none';
      document.getElementById('email_verify').style.display='block';
      submit_login.innerHTML ="Login";
    }
    else{
      status.innerHTML="*email or password wrong*";
      localStorage.removeItem("text",text);
      submit_login.innerHTML ="Login";
    }

   } 


    </script>
    
</section> 
<!--SIGNUP------->

<section id="signup">
  <h1>Sign up</h1>
  <form  action="signup.php" method="post" id="signup_form"  >
      <div class="text_field" id="name" >
          <input type="text" name="username" id ="username"  required > <span></span> <label>Username</label>
      </div>
      <div class="text_field" id="pass" >
          <input type="password" name="password" id ="signup_password" required><span></span> <label>Password</label>
          <a><i onclick="signup_pass()" class="fa-solid fa-eye" id="signup_pass"></i></a>
      </div>
      
      <div class="text_field" id="mail">
          <input type="text" name="email" id="email" required > <span></span> <label>Email</label>
      </div>
      <div id="email_error"></div>
      
      <div class="text_field" id="phone">
          
          <input type="numbers" name="number" id ="phone_number" required  > <span></span> <label>Phone number </label>
      </div>
      <div id="phone_error"></div>
      <div class="text_field1" id="date">
          <input type="date" value="" name="date" id="day" required > <span></span> <label>Date of birth</label>
      </div>
      <div id="date_error">Please enter a valid date</div>
      <div class="text_field">
      <select name="sex" >
          <option selected disabled>Select a gender</option>
          <option  value="male" >Male</option>
          <option value="famele" >Famale</option>
      </select>
 
      </div>
      <button type="submit" id="submit_signup" onclick="loading_signup()" value="sign up" disabled><i id="spinner" class=""></i>Sign up</button>
      <div class="signup_link">
          You are a member? <a onclick="poplogin()">Login</a>
      </div>
      
  </form>
 

  
<script>

        $("#submit_signup").click( function() {
        
          $.post( $("#signup_form").attr("action"),
                  $("#signup_form :input").serializeArray(),
              function (info) {
        
               
                $("#response").empty();
                $("#response").html(info);
                check_av2()
               
              });
        
          $("#signup_form").submit( function() {
            return false;  
          });
        });
        


function check_av2(){
/*email infos*/
let email = document.getElementById("email");
var email_error= document.getElementById("email_error");
var mail1= document.head.appendChild(document.createElement("style"));
var mail2= document.head.appendChild(document.createElement("style"));  
var element = document.getElementById('response');
var text = element.innerText || element.textContent;
element.innerHTML = text;
var email_text = email_error.innerText || email_error.textContent;
email_error.innerHTML = email_text;
/*phone infos*/
let phone_number = document.getElementById("phone_number");
var phone_error= document.getElementById("phone_error");
var phone1= document.head.appendChild(document.createElement("style"));
var phone2= document.head.appendChild(document.createElement("style"));
var phone_text = phone_error.innerText || phone_error.textContent;
phone_error.innerHTML = phone_text; 
let submit_signup=document.getElementById("submit_signup");


if (text=="email"){
  email_error.style.display="block";
  mail1.innerHTML="#mail span::before {background: brown;}";
  mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
  email_error.innerHTML="This email address has been used already";
}
if (text=="phone"){
  phone_error.innerHTML="This phone number has been used already";
  phone1.innerHTML="#phone span::before {background: brown;}";
  phone2.innerHTML="#phone input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
  phone_error.style.display="block";
  submit_signup.innerHTML ="Sign up";

}
else if(text=="emailphone"){
  /*email*/
  email_error.style.display="block";
  mail1.innerHTML="#mail span::before {background: brown;}";
  mail2.innerHTML="#mail input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
  email_error.innerHTML="This email address has been used already";
  /*phone*/
  phone_error.innerHTML="This phone number has been used already";
  phone1.innerHTML="#phone span::before {background: brown;}";
  phone2.innerHTML="#phone input:valid ~ label, #mail input:focus ~ label  {color: brown;}";
  phone_error.style.display="block";
  submit_signup.innerHTML ="Sign up";

}
else if(text=="true"){  
  submit_signup.innerHTML ="Sign up";
  document.getElementById('signup').style.display = 'none';
  poplogin();
}
  
}

</script>



</section>

<!--EMAIL----->

<section id="email_verify">
  <h1>Email Verification</h1>
  <form action="verify_email.php" method="post" id="email_form">
      <div class="text_field">
          <input type="number" name="code" id="code"  required ><span></span> <label>Code</label>
      </div>
      <div id="status_email"></div>
      <button type="submit" id="submit_email" onclick="loading_verify()" value="verify email" disabled><i id="spinner" class=""></i>Verify</button>

  </form>
  <script>

    $("#submit_email").click( function() {
    
      $.post( $("#email_form").attr("action"),
              $("#email_form :input").serializeArray(),
          function (info) {
    
           
            $("#response").empty();
            $("#response").html(info);
            check_av3();
           
          });
    
      $("#email_form").submit( function() {
        return false;  
      });
    });

    function check_av3(){
      var element = document.getElementById('response');
      var status = document.getElementById('status_email');
      var text = element.innerText || element.textContent;
      element.innerHTML = text;
      var status_text = status.innerText || status.textContent;
      status.innerHTML = status_text;
      let submit_email=document.getElementById("submit_email");
      
      if (text=="login"){
        location.reload();
        localStorage.setItem("text",text);
        submit_email.innerHTML="Verify";

      }
      else{
        submit_email.innerHTML="Verify";
        status.innerHTML="*wrong varification code*";
        localStorage.removeItem("text",text);
      }

     } 
  </script>
</section> 
</div>
<div id=response></div>

<?php  
if(!empty($id)){
              while($row = mysqli_fetch_assoc($all_products)){
                  if($id==$row["product_id"]){
            ?> 
<div id="filter2">
  <nav class="breadcrumb">
    <ol class="breadcrumb-content">
     <li class="breadcrumb-item"><a href="index.html">Home</a></li>
     <li class="breadcrumb-item"><a href="">Mens</a></li>
     <li class="breadcrumb-item-active"><a href=""><?php echo $row["product_name"] ?></a></li>
    </ol>
  </nav>


  
    


      <div class="container">
        
   
        
        
        
        <div class="gridproduct">

          <div class="images">
            <div class="front-image">
               <img src="<?php echo $row["product_image"] ?>" width="100%" id="main-img" >
            </div>
            <div class="group">
               <div class="image-col">
                   <img src="img/2.png" width="100%"  class="small-img">
                </div>
                <div class="image-col">
                   <img src="img/3.png" width="100%"   class="small-img">
                </div>
            </div>
           </div>
           </div>

          <div class="info">
            <h1><?php echo $row["product_name"] ?></h1>
            <h2>$<?php echo $row["price"] ?></h2>
            <div class="description">
              <p>The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of effort and ingenuity for the grower.</p>
            </div>
              <button onclick="addToCart(<?php echo $id ?>)" class="add-to-cart">Add To Cart</button>
          </div>


      </div>
      <?php 
                  }
                  }
                  
                  
          }else{
            echo "<h2 id='error'>No items found</h2>";
          }
        
          ?>

</div>



      
      
      <div class="small-container">
        <h2 class="title">You may also like</h2>
        <div class="row">
        <?php  
            if(!empty($id)){
              $count=0;
              while(($row2 = mysqli_fetch_assoc($all_products2))&&($count<4)){
                  
            ?> 
          <div class="colum">
          <form action="sproduct.php" method="GET">
          <button id="product_btn" name="id" value="<?php echo $row2["product_id"]?>">
            <a><img src="<?php echo $row2["product_image"] ?>" alt=""></a>
            <h4><?php echo $row2["product_name"] ?></h4>
            <p>$<?php echo $row2["price"] ?></p>
          </button>
          </form>

          </div>
          <?php
          $count++;
                  }
                }
              
            ?>
        </div>
      </div>
  


  

    <!--Footer-->
    <!--Footer-->
 <footer class="section-p1">
  <div class="col">
  <h2>PAGES</h4>
   <a href=""><h4>Home</h4></a> 
   <a href=""><h4>Shop</h4></a> 
   <a href=""><h4>About us</h4></a> 
   
  </div>
  <div class="col">
      <h2>CONTACT</h4>
          <a href=""><h4>Address</h4></a> 
          <a href=""><h4>Phone</h4></a> 
          <a href=""><h4>Email</h4></a> 
  </div>
  <div class="col">
      <h2>MY ACOUNT</h4>
          <a href=""><h4>Sign in</h4></a> 
          <a href=""><h4>My wishlist</h4></a> 
          <a href=""><h4>Help</h4></a> 
  </div>

  <div class="wrapper">
      <div class="wrapper__links">

      <a class="social-link social-link--tiktok" id="tiktok">
        <svg class="social-svg"  viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
          <title>
            Tiktok
          </title>
          <g class="social-group" fill="none" fill-rule="evenodd">
            <circle class="social-group__outline" stroke="#000" stroke-width="20" cx="300" cy="300" r="262.5" />
            <circle class="social-group__inner-circle" fill="#2D76B0" cx="300" cy="300" r="252.5" />
            <path class="social-group__icon" d="M224 68a44.05 44.05 0 0 1-44-44a12 12 0 0 0-12-12h-40a12 12 0 0 0-12 12v132a16 16 0 1 1-22.85-14.47a12 12 0 0 0 6.85-10.84V88a12 12 0 0 0-14.1-11.81a79.35 79.35 0 0 0-47.08 27.74A81.84 81.84 0 0 0 20 156a80 80 0 0 0 160 0v-33.33a107.47 107.47 0 0 0 44 9.33a12 12 0 0 0 12-12V80a12 12 0 0 0-12-12Zm-12 39.15a83.05 83.05 0 0 1-37-14.91a12 12 0 0 0-19 9.76v54a56 56 0 0 1-112 0a57.86 57.86 0 0 1 32-51.56V124a40 40 0 1 0 64 32V36h17.06A68.21 68.21 0 0 0 212 90.94Z"
              fill="#000" fill-rule="nonzero"  />
          </g>
        </svg>
      </a>
      <a class="social-link social-link--instagram" id="instagram">
        <svg class="social-svg" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
          <title>
            instagram
          </title>
          <defs>
            <linearGradient x1="0%" y1="100%" y2="0%" id="simpleInsta">
              <stop stop-color="#D72F3F" offset="0%" />
              <stop stop-color="#4221B9" offset="100%" />
            </linearGradient>
          </defs>
          <g class="social-group" fill="none" fill-rule="evenodd">
            <circle class="social-group__outline" stroke="#000" stroke-width="20" cx="300" cy="300" r="262.5" />
            <circle class="social-group__inner-circle social-group__inner-circle--instagram" fill="url(#simpleInsta)" cx="300" cy="300"
              r="252.5" />
            <path class="social-group__icon" d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z"
              fill="#FFF" fill-rule="nonzero" />
          </g>
        </svg>
      </a>
      </div>
    </div>
 
</footer>
   </div>
  </div>
    <script src="script.js">

    </script>
        <script src="cart.js">

</script>


    

    


</body>
</html>