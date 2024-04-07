$(document).ready(function() {
   // hamburgur menu
   $("#menu-trigger").click(function() {
       $("#navbarList").toggleClass("active");
   });
   // log and sign functionality
   $(".logsign").hide();
   $(".modallogsign").hide();

   $("#loginbtn").click(function() {
       $(".logsign").toggle();
       $(".modallogsign").toggle();
       $("body").addClass("modal-open").css("overflow", "hidden");
   });
   $(window).click(function(event) {
       if (event.target == $(".modallogsign")[0]) {
           $(".logsign").toggle();
           $(".modallogsign").toggle();
           $("body").removeClass("modal-open").css("overflow", "");
       }
   });
   $("#X-btn2").click(function() {
       $(".logsign").hide();
       $(".modallogsign").hide();
       $("body").removeClass("modal-open").css("overflow", "");
   })

   // Rate Us functionality
   $("#rateUsModal").hide();
   $(".rate-us-content").hide();
   $("#rate-us-link").click(function(event) {
       event.preventDefault();
       $.ajax({
        type: 'POST',
        url: 'checklogged.php',
        success: function(response) {
            if (response.trim() === 'logged') {
                $("#rateUsModal").toggle();
                $(".rate-us-content").toggle();
                resetSubmitButton();
                $("body").addClass("modal-open").css("overflow", "hidden");
            } else {
                $(".logsign").show();
                $(".modallogsign").show();
                $("body").addClass("modal-open").css("overflow", "hidden");
            }
        }
    });
       
   });
   // Close Rate Us modal if clicked outside of it
   $(window).click(function(event) {
       if (event.target == $("#rateUsModal")[0]) {
           $("#rateUsModal").toggle();
           $(".rate-us-content").toggle();
           resetSubmitButton();
       $("body").removeClass("modal-open").css("overflow", "");
       }
   });

   $("#X-btn1").click(function() {
       $("#rateUsModal").toggle();
       $(".rate-us-content").toggle();
       resetSubmitButton();
       $("body").removeClass("modal-open").css("overflow", "");

   })
   $("#X-btn3").click(function() {
    $("#deliveryModal").hide();
    $(".delivery-content").hide();
    
    $("body").removeClass("modal-open").css("overflow", "");

})


   // rate us stars
   $(".ratings span").click(function() {
       let clicked = $(this).attr("data-clicked");
       if (!clicked) {
           let rating = $(this).attr("data-rating");
           let productId = $(this).parent().attr("data-productid");

           $(this).siblings().removeAttr("data-clicked");
           $(this).attr("data-clicked", "true");

           let data = {
               "rating": rating,
               "product-id": productId,
           };
           localStorage.setItem("rating", JSON.stringify(data));
       }
   });

   // Load saved rating from local storage
   if (localStorage.getItem("rating")) {
       let rating = JSON.parse(localStorage.getItem("rating"))["rating"];
       let productId = JSON.parse(localStorage.getItem("rating"))["product-id"];
       $(`.ratings[data-productid="${productId}"] span[data-rating="${rating}"]`).attr("data-clicked", "true");
   }

   // Rate Us submit
   $("#rateUsForm").submit(function(event) {
       event.preventDefault();

       let testimonial = $('#testimonialDescription').val();
       let rating = $('.ratings span[data-clicked="true"]').attr("data-rating");

       if (testimonial.trim() === '' || !rating) {
           $('#responseMessage').html("Please rate and enter a testimonial description.");
           return;
       }

       var btn = document.querySelector(".submit-btn");
       var btnText = document.getElementById("btnText");
       $.ajax({
           type: 'POST',
           url: 'addTestimonial.php',
           data: { testimonial: testimonial, rating: rating },
           success: function(response) {
               if (response.trim() === 'Success') {
                   $('#responseMessage').html("Testimonial submitted successfully.");
                   btnText.innerHTML = "Thanks";
                   btn.classList.add("active");
                   $('.ratings span').removeAttr("data-clicked");
                   $('#testimonialDescription').val('');
                   localStorage.removeItem("rating");
               } else {
                   $('#responseMessage').html(response);
               }
           }
       });
   });

   function resetSubmitButton() {
       var btn = document.querySelector(".submit-btn");
       var btnText = document.getElementById("btnText");
       btnText.innerHTML = "Submit";
       btn.classList.remove("active");
   }

});
