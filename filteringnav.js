$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: 'getCatForFiltering.php',
        success: function(data) {
            $('.allcat').append(data); 
    }
    });
    $.ajax({
        type: 'GET',
        url: 'getSizesforFiltering.php',
        success: function(data) {
            $('.allsizes').append(data); 
    }
    });
    
    $('.togglefilteringdrop').hover(function() {
        $('.filteringdrop').addClass('showfilterdrop');
    }, function() {
        $('.filteringdrop').removeClass('showfilterdrop');
    });
      
    $('.filteringdrop').hover(function() {
        $(this).addClass('showfilterdrop');
    }, function() {
        $(this).removeClass('showfilterdrop');
    });
      
    $('.filteringdrop .togglefilterItem:nth-child(1)').hover(function() {
        $('.category-popup').addClass('catshowdropdown');
        $(this).addClass('category-hover');
    }, function() {
        $('.category-popup').removeClass('catshowdropdown');
        $(this).removeClass('category-hover');
    });
      
    $('.category-popup').hover(function() {
        $('.filteringdrop').addClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(1)').addClass('category-hover');
    }, function() {
        $('.filteringdrop').removeClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(1)').removeClass('category-hover');
    });
      
    $('.filteringdrop .togglefilterItem:nth-child(2)').hover(function() {
        $('.price-popup').addClass('priceshowdropdown');
        $(this).addClass('price-hover');
    }, function() {
        $('.price-popup').removeClass('priceshowdropdown');
        $(this).removeClass('price-hover');
    });
      
    $('.price-popup').hover(function() {
        $('.filteringdrop').addClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(2)').addClass('price-hover');
    }, function() {
        $('.filteringdrop').removeClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(2)').removeClass('price-hover');
    });
      
    $('.filteringdrop .togglefilterItem:nth-child(3)').hover(function() {
        $('.size-popup').addClass('sizeshowdropdown');
        $(this).addClass('size-hover');
    }, function() {
        $('.size-popup').removeClass('sizeshowdropdown');
        $(this).removeClass('size-hover');
    });
      
    $('.size-popup').hover(function() {
        $('.filteringdrop').addClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(3)').addClass('size-hover');
    }, function() {
        $('.filteringdrop').removeClass('showfilterdrop');
        $('.filteringdrop .togglefilterItem:nth-child(3)').removeClass('size-hover');
    });
})