$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
        success: function(data) {
            $('.cards-container').append(data); 
    }
});

});