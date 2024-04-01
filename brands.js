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
    $('.filterItem').on('click', function(e) {
        e.preventDefault();
        let gender = $(this).text();
    
        $.ajax({
            type: 'GET',
            url: 'filtershopgender.php',
            data: { gender: gender },   
            success: function(data) {
                $('.all-cards-container').empty().append(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('.main').on('click', '.togglefiltersubitem', function(e) {
        e.preventDefault();
        if($(this).hasClass('filtercategories')){
            let category = $(this).text();
            $.ajax({
                type: 'GET',
                url: 'filterbrandtoggle.php',
                data: { category: category }, 
                success: function(data) {
                    $('.all-cards-container').empty().append(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        else if ($(this).hasClass('ascdesc')){
            let price = $(this).text();
            if (price === "Ascending"){
                price = "ASC";
            }
            else{
                price = "DESC";
            }
            $.ajax({
                type: 'GET',
                url: 'filterbrandtoggle.php',
                data: { price: price },
                success: function(data) {
                    $('.all-cards-container').empty().append(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        else if($(this).hasClass('filtersizes')){
            let size = $(this).text();
            $.ajax({
                type: 'GET',
                url: 'filterbrandtoggle.php',
                data: { size: size },
                success: function(data) {
                    $('.all-cards-container').empty().append(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
})