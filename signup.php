
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
    include("connection.php");
    include("functions.php");
    
    
    

    
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
       $user_name = $_POST["username"];
       $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
       $email = $_POST["email"];
       $number = $_POST["number"]; 
       $date = $_POST["date"];
       $gender = $_POST["sex"];
       
       
       
    
       
          if(!empty($user_name)&&!empty($password)&&!empty($email)&&!empty($number)&&!empty($date)&&!empty($gender)){
               if(!(is_numeric($user_name))){
                   $available="true";
                  
                    
                    
                    $query_email= "select * from users where email='$email'";
                    $result=mysqli_query($con,$query_email);
                    
                    if ($result && mysqli_num_rows($result) >=0){
                        $user_email = mysqli_fetch_assoc($result);
                        
                        

                        if ($user_email["email"]==$email){
                         echo  "email";
                         $available="false";
                        
                         
                        }
                    }
                    
                    $query_phone="select * from users where phone='$number'";
                    $result=mysqli_query($con,$query_phone);
                    if ($result && mysqli_num_rows($result) >=0){
                         $user_phone = mysqli_fetch_assoc($result);                   
                         
                         if ($user_phone["phone"]==$number){
                              echo "phone"; 
                              $available="false";
                              
                                   
                              }

                         }    
                         
                         
                         
                         if($available=="true"){
                              
                              echo "true";
                              $user_id = random_num(20);
                              $query= "insert into users (user_id,user_name,password,email,phone,date,gender) values ('$user_id','$user_name','$password','$email','$number','$date','$gender')";
                              mysqli_query($con,$query);
                              die;
                              
                              
                       }
                      
                 
        }
       else{
            $fail="Invalid Parameter";
       }
       
    }
     
     }
     
     
?>
