<?php

session_start();

if($_SESSION['admin']==false){
    header("location:admin_login.php");

}

  include("connection.php");
  include("functions.php");
  $sql = "SELECT * FROM  products";
  $all_products = $con->query($sql);
  



include("connection.php");
if(isset($_POST["submit"])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['price'];
    $upload_dir = "uploads/";
    $product_img = $upload_dir.$_FILES["product_image"]["name"];
    $upload_dir.$_FILES['product_image']['name'];
    $upload_file = $upload_dir.basename($_FILES["product_image"]["name"]);
    $imageType = strtolower((pathinfo($upload_file,PATHINFO_EXTENSION)));
    $check = $_FILES["product_image"]["size"];
    $upload_ok=0;

    if (file_exists($upload_file)){
        echo "<script>alert('the file already exist')</script>";
        $upload_ok=0;
    }else{
        $upload_ok=1;
        if($check !==false){
            $upload_ok=1;
            if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
                $upload_ok=1;
            }else{
                echo "<script>alert('please change the image format')</script>";
            }
        }
        else{
            echo "<script>alert('the photo size is 0 please change the photo')</script>";
            $upload_ok=0;
        }
    }

    if($upload_ok==0){
        echo "<script>alert('sorry your file is doesnt uploaded try again')</script>";

    }elseif(!empty($product_name)&&!empty($product_price)){
        move_uploaded_file($_FILES["product_image"]["tmp_name"],$upload_file);
        $query= "insert into products (product_name,price,product_image) values ('$product_name','$product_price','$product_img')";
        mysqli_query($con,$query);
        header("Refresh:0");
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
    <link rel="stylesheet" href="style/admin_page.css">
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
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/trash.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/math-plus.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/image.css' rel='stylesheet'>
</head>
<body>
    
  
    <!----------HEADER----->
    <header id="header">
        <a href="admin_page.php" class="logo">ADMIN</a>
     
      <ul class="navmenu">
        <li><a class="active" href="admin_page.php">Products</a></li>
        <li><a href=""></a></li>
      </ul>

      <div  class="nav-icon">
        <a id="iconProfile" class="icons"><i class="gg-log-out"></i></a>
        <div  id="menu-icon">
          <i  class="gg-menu"></i>
        </div>
      
      </div>
    </header>
  <div id="blur">
    <div id="filter">
    <!---HEADER BANNER--->
    <div onclick="scrollUp()"  id="scroll-up">
      <a><i class="gg-chevron-up"></i></a>
    </div> 



  


  <div id="filter2">
 <!----Products----->

 <section id="product1" class="section-p1">
<?php
if(isset($_POST['edit'])){
  echo "<h2>Edit Product</h2>";

  
}
else{
  echo"<h2>Products List</h2>";
}
  
  ?>

  <div class="pro-container">
<?php
  while($row = mysqli_fetch_assoc($all_products)){
?>
  

<?php
  
  if(isset($_POST['edit'])){ 
    $id = $_POST["id"];
    if(!empty($id)){
      if($id==$row["product_id"]){
?>

      <form  action="admin_page.php" method="Post" runat id="edit_form" class="pro" enctype="multipart/form-data">
      
        <img src="<?php echo $row["product_image"]?>"  id="blah" src="#" alt="" onclick="upload_product()" /> 
        <input type="file" name="product_image"  id="product_image" hidden >
        <div class="des">
          <span><h3>Adidas</h3></span>
          <input type="hidden" name="id" value="<?php echo $row["product_id"]?>">
          <input type="text" name="product_name" id="product_name" value="<?php echo $row["product_name"]?>">
          <input type="number" step="0.01" name="price" id="price"  value="<?php echo $row["price"]?>" >
          <button type="submit" name="save" id="save" >Save</button>
        </div>
      </form>
<?php
    }
  }
}else{
  ?>
      <div class="pro">
        <img src="<?php echo $row["product_image"]?>" alt="">
        <div class="des">
          <span>Adidas</span>
          <h5><?php echo $row["product_name"]?></h5>
          <h4>$<?php echo $row["price"]?></h4>
        </div>
        <form action="admin_page.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $row["product_id"]?>">
          <button type="submit" name="edit" id="edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
          <button type="submit" name="delete" id="delete" ><i class="gg-trash"></i></button>
        </form>
        
      </div>

<?php
    }
  }
  if(!isset($_POST['edit'])){ 

?>          
          
          
          
          
          <div class="pro_add">

            <form action="admin_page.php" method="POST" id="edit_form" enctype="multipart/form-data">
              <img src="img/add_img.jpg" id="blah" src="#" alt="" onclick="upload_product()" />     
              <input type="file" name="product_image" id="product_image" placeholder="Product Image" required hidden>
              <input type="text" name="product_name" id="product_name" placeholder="Product Name" required>
              <input type="number" step="0.01" name="price" id="price" placeholder="Product Price" required>
              <input type="submit" value="Upload" name="submit">
            </form>
              
              
<?php
 
  }

?>         

              
          </div>
        </div>
    </div>

</section> 

<?php

    if(isset($_POST['delete'])){ 
        $id = $_POST["id"];
        delete_product($con);
        
    }

    if(isset($_POST["save"])){ 
      
        $product_name = $_POST['product_name'];
        $product_price = $_POST['price'];
        $upload_dir = "uploads/";
        $product_img = $upload_dir.$_FILES["product_image"]["name"];
        $upload_dir.$_FILES['product_image']['name'];
        $upload_file = $upload_dir.basename($_FILES["product_image"]["name"]);
        $imageType = strtolower((pathinfo($upload_file,PATHINFO_EXTENSION)));
        $check = $_FILES["product_image"]["size"];
        $upload_ok=0;
        $id = $_POST["id"];
        delete_image($con);
        
    
        if (file_exists($upload_file)){
            
            $upload_ok=0;
        }else{
            $upload_ok=1;
            if($check !==false){
                $upload_ok=1;
                if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
                    $upload_ok=1;
                }else{
                    echo "kot";
                }
            }
            else{
                
                $upload_ok=0;
            }
        }
    
        if($upload_ok==0){
            
    
        }else{
            move_uploaded_file($_FILES["product_image"]["tmp_name"],$upload_file);
            echo "<script>window.location ='admin_page.php';</script>";

            
            
            
        }
        
        if(!empty($id)){
          $select= "select * from products where product_id ='$id' limit 1";
          $result=mysqli_query($con,$select);
          if ($result && mysqli_num_rows($result) >= 0){
              $products_data = mysqli_fetch_assoc($result);
              $query = "UPDATE  products SET product_name='$product_name',  price = '$product_price' , product_image = '$product_img' where product_id = '$id' ";
              $query_run= mysqli_query($con,$query);
              
              
              

                
              }
              
          }
          
      }
      
  

?>


<script>
        var product_img=document.getElementById("product_image");
        function upload_product(){
            product_img.click();
        }

        product_image.onchange = evt =>{
          const [file] = product_image.files
          if (file){
            blah.src = URL.createObjectURL(file)
          }
        }

</script>



    

</body>

</html>
<?php
$_SESSION['previous']=basename($_SERVER['PHP_SELF']);
?>