$(document).ready(function(){
    // Show product popup
    $('.main').on('click', '.view-product-btn', function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.ca').attr('class').split(' ')[1];
        let itemCount = 0;
        $('.CartItems .item').each(function() {
            let itemId = $(this).attr('class').split(' ')[1];
            if (itemId === product_id) {
                itemCount++;
            }
        });
        console.log(itemCount)
        $.ajax({
            url: 'product-popup.php',
            type: 'GET',
            data: { product_id: product_id , itemCount: itemCount},
            success: function(response) {
                $(".product-popup").html(response).addClass("show");
                $("body").addClass("modal-open").css("overflow", "hidden");
            }
        });
        if ($(".cartPOPUP").hasClass("open")) {
            $('.cartPOPUP').removeClass('open');
            $("body").removeClass("modal-open").css("overflow", "");
        }
    });

    // Close product popup
    $('.product-popup').on('click', '.close-popup-btn', function(e) {
        e.preventDefault();
        $(".product-popup").removeClass("show");
        $("body").removeClass("modal-open").css("overflow", "");
    });

    // Cart
    let shopping_cart = $('.shopping-cart');
    let cart_btns = $('.addToCart');

    cart_btns.click(function() {
        let product_count = parseInt(shopping_cart.attr('data-product-count')) || 0;
        let qtyInput = $(this).closest('.product').find('.quantity-input');
        let quantity = parseInt(qtyInput.val());
        shopping_cart.attr('data-product-count', product_count + quantity);
        shopping_cart.addClass('active');
        setTimeout(() => {
            shopping_cart.removeClass('active');
        }, 1000);
    });

    shopping_cart.click(function() {
        toggleCart();
    })

    // Toggle cart popup
    function toggleCart() {
        let cartPopup = $('.cartPOPUP');
        // Check if product popup is open, if yes, close it
        if ($(".product-popup").hasClass("show")) {
            $(".product-popup").removeClass("show");
            $("body").removeClass("modal-open").css("overflow", "");
        }
        cartPopup.toggleClass('open');
    }

    // add to cart
    $('.product-popup').on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.product-popup').find('.shoe').attr('class').split(' ')[1];
        let itemCount = 0;
        $('.CartItems .item').each(function() {
            let itemId = $(this).attr('class').split(' ')[1];
            if (itemId === product_id) {
                itemCount++;
            }
        });
        $.ajax({
            url: 'checkCartitems.php',
            type: 'POST',
            data: { product_id: product_id , itemCount: itemCount},
            success: function(response) {
                if(response == '<h4 class="added-to-cart">Added to Cart</h4><h4 class="out-of-stock">Product out of Stock</h4>'){
                    $('.product-popup .add-to-cart-c .add-to-cart').hide();
                }
                $('.product-popup .add-to-cart-c').append(response);

                setTimeout(() => {
                    $('.product-popup .add-to-cart-c .added-to-cart').hide();
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $.ajax({
            url: 'addToCart.php',
            type: 'POST',
            data: { product_id: product_id },
            success: function(cartHtml) {
                $('.CartItems').append(cartHtml);
                let product_count = parseInt(shopping_cart.attr('data-product-count')) || 0;
                shopping_cart.attr('data-product-count', product_count + 1);
                shopping_cart.addClass('active');
                setTimeout(() => {
                    shopping_cart.removeClass('active');
                }, 1000);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    // Close cart popup
    $('.close').click(function() {
        let cartPopup = $('.cartPOPUP');
        cartPopup.removeClass('open');
    });
    
    $('.CartItems').on('click', '.remove button', function() {
        $(this).closest('.item').remove();
        // Update the data-product-count attribute
        updateProductCount();
    });

    function updateProductCount() {
        let shopping_cart = $('.shopping-cart');
        let product_count = $('.CartItems .item').length;
        shopping_cart.attr('data-product-count', product_count);
    }
});