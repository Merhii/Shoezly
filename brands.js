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
    
    $('.logos').on('click', '.brandlogo', function(e) {
        e.preventDefault();
        let brand = $(this).attr("id");
        selectedFilters.brand = brand;

        applyFilters(selectedFilters);
    });


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
        else if ($(this).hasClass('filtersizes')){
            let size = $(this).text();
            selectedFilters.size = size;
    
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
})