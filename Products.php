<?php
  include("connection.php");
  $sql = "SELECT * FROM  products";
  $all_products = $con->query($sql);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnMor</title>
    <link rel="icon" type="image/png" href="img/favicon.png" >
    <link rel="stylesheet" href="style/Products.css">
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
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/shopping-cart.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/remove-r.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
        <li><a href="about.html">About us</a></li>
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


    <!---HEADER BANNER--->
    <div onclick="scrollUp()"  id="scroll-up">
      <a><i class="gg-chevron-up"></i></a>
    </div> 

      <section id="shop-banner">
          <h1>UP TO 70% OFF</h1>
      </section>

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
          Not a member? <a onclick="popsign()">Sign up</a>
          
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
          <input type="date" name="date" id="day" required > <span></span> <label>Date of birth</label>
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






 <!----Products----->
 <div class="small-container">
    <div class="row">
      <?php
      
        while($row = mysqli_fetch_assoc($all_products)){
      ?>

            <div class="colum">
              <form action="sproduct.php" method="GET">
                <button id="product_btn" name="id" value="<?php echo $row["product_id"]?>">
                  <div class="box">
                    <a><img src="<?php echo $row["product_image"]?>" alt=""></a>
                  </div>
                </button>
                  <div class="text_pr">
                    <h4><?php echo $row["product_name"]?></h4>
                    <i class="fa-regular fa-heart"></i>
                  </div>
                    <p>$<?php echo $row["price"]?></p>
              </form>
            </div>
        <?php } ?>
    </div>
 </div>


<!--Footer-->
<footer class="section-p1">
          <div class="col">
            <h2>Contact</h2>
            <div class="contact">
              <h4><span>Address:</span> 563 Wellington Road</h4>
              <h4><span>Phone:</span> +01 2222 365</h4>
              <h4><span>Hours:</span> 10:00 - 18:00, Mon - Sat</h4>
            </div>

            <div class="follow">
              <p>Follow us</p>
              <div class="icon">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-brands fa-tiktok"></a>                
                <a href="#" class="fa fa-youtube"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <h2>About</h2>
            <div class="space">
              <a href="about.html">About us</a>
              <a href="#">Privacy Policy</a>
              <a href="#">Terms & Conditions</a>
              <a href="#">Contact us</a>
            </div>
          </div>
          <div class="col">
            <h2>My acount</h2>
            <div class="space">
            <a onclick="poplogin()" style="cursor: pointer;">Sign in</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
            </div>
          </div>
          <div class="col">
            <p>Secured Payment Gatewayes</p>
            <img src="img/pay/pay.png" alt="">
          </div>
  </footer>
    <p id="copurights">&copy; 2023 EnMor. All rights reserved.</p>

  </div>
  </div>
  
    <script src="script.js"></script>
    <script src="cart.js"></script>


</body>

</html>