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
})