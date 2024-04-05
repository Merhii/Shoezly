$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getBrandsforCarousel.php',
        success: function(data) {
            $('.logos-slide').append(data); 
    }
    });
    $.ajax({
        type: 'GET',
        url: 'getBrandCards.php',
        success: function(data) {
            $('.all-cards-container').append(data); 
    }
    });

    let selectedFilters = {};
    
    $('.filterItem').on('click', function(e) {
        e.preventDefault();
        let gender = $(this).text();
        selectedFilters.gender = gender;
    
        applyFilters(selectedFilters);
    });

    $('.main').on('click', '.togglefiltersubitem', function(e) {
        e.preventDefault();
        if($(this).hasClass('filtercategories')){
            let category = $(this).text();
            selectedFilters.category = category;
    
            applyFilters(selectedFilters);
        }
        else if ($(this).hasClass('ascdesc')){
            let price = $(this).text();
            if (price === "Ascending"){
                price = "ASC";
            }
            else{
                price = "DESC";
            }
            selectedFilters.price = price;
    
            applyFilters(selectedFilters);
        }
    });

    function applyFilters(filters) {
        $.ajax({
            type: 'GET',
            url: 'brandfilterData.php',
            data: filters,
            success: function(data) {
                $('.all-cards-container').empty().append(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    };

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
    $('.main').on('click', '.close-popup-btn', function(e) {
        e.preventDefault();
        $(".product-popup").removeClass("show");
        $("body").removeClass("modal-open").css("overflow", "");
    });


    // Cart
    let shopping_cart = $('.shopping-cart');
    let cart_btns = $('.addToCart');

    cart_btns.click(function(e) {
        let product_count = parseInt(shopping_cart.attr('data-product-count')) || 0;
        let qtyInput = $(this).closest('.product').find('.quantity-input');
        let quantity = parseInt(qtyInput.val());
        shopping_cart.attr('data-product-count', product_count + quantity);
        shopping_cart.addClass('active');
        setTimeout(() => {
        shopping_cart.removeClass('active');
        }, 1000);
    });

    // Toggle cart popup
    function toggleCart() {
        var cartPopup = $('.cartPOPUP');
        cartPopup.toggleClass('open');
    }

    // Close cart popup
    $('.close').click(function() {
        var cartPopup = $('.cartPOPUP');
        cartPopup.removeClass('open');
    });
})