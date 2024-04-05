$(document).ready(function(){
    // Show product popup
    $('.main').on('click', '.view-product-btn', function(e) {
        e.preventDefault();
        let product_id = $(this).closest('.ca').attr('class').split(' ')[1];

        $.ajax({
            url: 'product-popup.php',
            type: 'GET',
            data: { product_id: product_id },
            success: function(response) {
                $(".product-popup").html(response).addClass("show");
                $("body").addClass("modal-open").css("overflow", "hidden");
            }
        });
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
        console.log("hello");
        e.preventDefault();
        e.preventDefault();
        let product_id = $(this).closest('.product-popup').find('.shoe').attr('class').split(' ')[1];
        let quantity = $(this).closest('.product-popup').find('#quantity-input').val();

        console.log(product_id, quantity);
        $.ajax({
            url: 'addToCart.php',
            type: 'POST',
            data: { product_id: product_id, quantity: quantity },
            success: function(cartHtml) {
                $('.CartItems').html(cartHtml);
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
})