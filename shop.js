$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
        success: function(data) {
            $('.cards-container').append(data); 
    }
});
    $.ajax({
        type: 'GET',
        url: 'getCatForFiltering.php',
        success: function(data) {
            $('.allcat').append(data); 
    }
    });
});