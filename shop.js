$(document).ready(function(){
 
    $.ajax({
        type: 'GET',
        url: 'getShopCards.php',
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
        else if ($(this).hasClass('filtersizes')){
            let size = $(this).text();
            selectedFilters.size = size;
    
            applyFilters(selectedFilters);
        }
    });

    function applyFilters(filters) {
        $.ajax({
            type: 'GET',
            url: 'shopfilterData.php',
            data: filters,
            success: function(data) {
                $('.all-cards-container').empty().append(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});

