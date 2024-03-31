$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
        success: function(data) {
            $('.all-cards-container').append(data); 
    }
    });
});