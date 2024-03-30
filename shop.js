$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
        success: function(data) {
            $('.main').html(data); 
    }
});

});