<?php


function  random_num($lenght){

    $text="";
    if ($lenght<5){
        $lenght=5;
    }
    $len = rand(4,$lenght);
    for($i=0; $i<$len ; $i++){
        $text.=rand(0,9);

    }
    return $text;
}
function check_login($con){
    if(isset($_SESSION['user_id'])){
        
        $id = $_SESSION["user_id"];
        $query="select * from users where user_id = '$id' limit 1";
        $result=mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
                
            }
}

}





function delete_product($con){
    $id = $_POST["id"];
        if(!empty($id)){
              
            $select= "select * from products where product_id ='$id' limit 1";
            $result=mysqli_query($con,$select);
            if ($result && mysqli_num_rows($result) >= 0){
                $products_data = mysqli_fetch_assoc($result);
                $query = "delete from products where product_id = '$id' ";
                $query_run= mysqli_query($con,$query);
                if (!empty($products_data["product_image"])){
                  $filename = $products_data["product_image"];
                  unlink($filename);
                  echo "<script>location.reload();</script>";
                  die;
                }
                
            }
        }
    
    }
    
    function delete_image($con){
        $id = $_POST["id"];
        if(!empty($id)){
              
            $select= "select * from products where product_id ='$id' ";
            $result=mysqli_query($con,$select);
            if ($result && mysqli_num_rows($result) >= 0){
                $products_data = mysqli_fetch_assoc($result);
                if (!empty($products_data["product_image"])){
                  $filename = $products_data["product_image"];
                  unlink($filename);
                
                }
                
            }
        }
        
    }



  
?>