$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
        success: function(data) {
            $('.all-cards-container').append(data); 
    }
    });
    $('.filterItem').on('click', function(e) {
        e.preventDefault();
        let gender = $(this).text();
    
        $.ajax({
            type: 'GET',
            url: 'filtershopgender.php',
            data: { gender: gender },   
            success: function(data) {
                $('.all-cards-container').empty().append(data);
                console.log(category)
                console.log(data)
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});