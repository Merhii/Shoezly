$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getBrandsforCarousel.php',
        success: function(data) {
            $('.logos-slide').append(data); 
    }
    });
})