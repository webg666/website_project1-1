    <?php
session_start();
include('connection.php');

$sql = "SELECT * FROM  products";
$all_products = $con->query($sql);

echo "<script>
if (localStorage.getItem('cart_not') === 'true') {
    document.getElementById('dot').style.display='block';
  }
</script>";


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(empty($_SESSION['cart'])){
    echo 
    "<script> 
    
    localStorage.setItem('cart_not', 'false');
    document.getElementById('dot').style.display='none';
    
    </script>";
    }

// Return the current cart view
echo getCartHtml($all_products);
?>

<?php
function getCartHtml($all_products) {
    $cartHtml = '<h2 class="cart-title">Your Cart</h2>';

    $cartHtml .= '<div class="cart-content">';
    $total_p=0;
    if(!empty($_SESSION['cart'])){
        while($row = mysqli_fetch_assoc($all_products)){

    


                
                foreach($_SESSION['cart'] as $price){
                    if($price==$row["product_id"]){
                        $total_p=$total_p+$row['price'];
                    }

                }
                $uniqueValues = array_unique($_SESSION['cart']);
                foreach ($uniqueValues as $productId) {

                    if($productId==$row["product_id"]){
                        
                        
                        $counts = array_count_values($_SESSION['cart']);
                        

                        $cartHtml .='<div class="cart-box">';

                        $cartHtml .='<img src='.$row['product_image'].' alt="" class="cart-img">';

                        $cartHtml .='<div class="detail-box">';

                        $cartHtml .='<div class="cart-product-title">'.$row['product_name'].'</div>';
                        $cartHtml .='<div class="cart-price">'.$counts[$productId]*$row['price'].'</div>';
                        $cartHtml .='<input type="number" value='.$counts[$productId].' min="1" max="10" class="cart-quantity">';


                        $cartHtml .='</div>';

                        $cartHtml .='<i class="gg-trash-empty"  onclick="removeFromCart(' . $productId . ')" id="cart-remove"></i>';

                        $cartHtml .='</div>';
                        
                        
                        
                        

                        
                    }
                }
                
        
    }
}else{

        $cartHtml .='<p id="empty_bag" style="text-align:center; padding-top:10px; padding-bottom:10px;">Your shopping bag is empty!</p>';
    
    }
    
    $cartHtml .= '</div>';

    $cartHtml .='<div class="total">';
    $cartHtml .='<div class="total-title">Total</div>';
    $cartHtml .='<div class="total-price">'.$total_p.'€</div>';
    $cartHtml .= '</div>';

    $cartHtml .='<button type="button" class="btn-buy">Buy Now</button>';
    return $cartHtml;


}
?>


    