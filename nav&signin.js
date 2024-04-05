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
   });
   // Close Rate Us modal if clicked outside of it
   $(window).click(function(event) {
       if (event.target == $(".modallogsign")[0]) {
           $(".logsign").toggle();
           $(".modallogsign").toggle();
       }
   });
   $("#X-btn2").click(function() {
       $(".logsign").toggle();
       $(".modallogsign").toggle();
   })

   // Rate Us functionality
   $("#rateUsModal").hide();
   $(".rate-us-content").hide();
   $("#rate-us-link").click(function(event) {
       event.preventDefault();
       $("#rateUsModal").toggle();
       $(".rate-us-content").toggle();
       resetSubmitButton();
   });
   // Close Rate Us modal if clicked outside of it
   $(window).click(function(event) {
       if (event.target == $("#rateUsModal")[0]) {
           $("#rateUsModal").toggle();
           $(".rate-us-content").toggle();
           resetSubmitButton();
       }
   });

   $("#X-btn1").click(function() {
       $("#rateUsModal").toggle();
       $(".rate-us-content").toggle();
       resetSubmitButton();
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
