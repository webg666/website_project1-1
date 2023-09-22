function addToCart(productId) {
    $.ajax({
        type: 'POST',
        url: 'add_to_cart.php',
        data: { product_id: productId },
        success: function(response) {
            updateCartView(response);
        }
    });
}

function removeFromCart(productId) {
    $.ajax({
        type: 'POST',
        url: 'remove_from_cart.php',
        data: { product_id: productId },
        success: function(response) {
            updateCartView(response);
        }
    });
}

function updateCartView(cartData) {
    $('.cart').html(cartData);
}

// Load and display the cart when the page loads
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'get_cart.php',
        success: function(response) {
            updateCartView(response);
        }
    });
});

