$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: 'getBrands.php',
        success: function(data) {
            $('#Brand').html(data);
        }
    });
            $.ajax({
                type: 'GET',
                url: 'getCat.php',
                success: function(data) {
                    $('#Cat').html(data);
                }
            });
            
            $.ajax({
                type: 'GET',
                url: 'getGenders.php',
                success: function(data) {
                    $('#genders').html(data);
                }
            });

      
});