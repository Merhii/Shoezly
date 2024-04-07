let cartItemsArr=[] ;
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

    // add to cart
    $('.product-popup').on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        let clickedElement = this;
    
        $.ajax({
            type: 'POST',
            url: 'checklogged.php',
            success: function(response) {
                if (response.trim() === 'logged') {
                    let product_id = $(clickedElement).closest('.product-popup').find('.shoe').attr('class').split(' ')[1];
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
                        success: function(response) {
                            let parts = response.split('|');
                            let cartHtml = parts[0];
                            let priceIncrement = parseFloat(parts[1]);
                            let currentTotal = parseFloat($("#totalPriceValue").text().replace("$", ""));
                            let newTotal = (currentTotal + priceIncrement).toFixed(2);
                            $(".CartItems").append(cartHtml);
                            $("#totalPriceValue").text(newTotal + "$");
                        
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
                } else {
                    $(".logsign").show();
                    $(".modallogsign").show();
                    $("body").addClass("modal-open").css("overflow", "hidden");
                }
            }
        });
    });    

    // Cart
    let shopping_cart = $('.shopping-cart');

    shopping_cart.click(function() {
        $.ajax({
            type: 'POST',
            url: 'checklogged.php',
            success: function(response) {
                if (response.trim() === 'logged') {
                    let cartPopup = $('.cartPOPUP');
                    if ($(".product-popup").hasClass("show")) {
                        $(".product-popup").removeClass("show");
                        $("body").removeClass("modal-open").css("overflow", "");
                    }
                    cartPopup.toggleClass('open');
                    if($('.cartPOPUP').hasClass('open')) {
                        $("body").addClass("modal-open").css("overflow", "");
                    }
                    else{
                        $("body").removeClass("modal-open").css("overflow", "");
                    }
                    cartItemsArr=[];
                    $('.CartItems .item').each(function() {
                        let itemId = $(this).attr('class').split(' ')[1];
                        let existingItem = cartItemsArr.find(item => item.productId === itemId);
                        if(!existingItem){
                            let quantity = 0;
                            $('.CartItems .item').each(function() {
                                let currentItemId=  $(this).attr('class').split(' ')[1];
                                if (currentItemId === itemId) {
                                    quantity++;
                                };
                            });
                            let item = {
                                productId: itemId,
                                quantity: quantity
                            };
                            cartItemsArr.push(item);
                        }
                    });
                } else {
                    $(".logsign").show();
                    $(".modallogsign").show();
                    $("body").addClass("modal-open").css("overflow", "hidden");
                }
            }
        });
    });
    $(".checkOut").click(function(){
        let cartItemsJson = JSON.stringify(cartItemsArr);

        $("#cartItemsInput").val(cartItemsJson);


        $("#checkOut").submit();
    });

    // Close cart popup
    $('.close').click(function() {
        let cartPopup = $('.cartPOPUP');
        cartPopup.removeClass('open');
        $("body").removeClass("modal-open").css("overflow", "");
    console.log(cartItemsArr);
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