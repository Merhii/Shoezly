$(document).ready(function() {
  // hamburgur menu
  $("#menu-trigger").click(function() {
    $("#navbarList").toggleClass("active");
  });

  $(".logsign").hide();
  $(".modallogsign").hide();

  $("#loginbtn").click(function(){
    console.log("clicked")
    $(".logsign").toggle();
    $(".modallogsign").toggle();
  });
  

  $(".dropdown > a").click(function(event) {
    event.preventDefault();
    $(this).parent().toggleClass("active");
  });

  // Rate Us modal functionality
  $("#rateUsModal").hide();
  $(".rate-us-content").hide();
  $("#rate-us-link").click(function(event) {
 

      event.preventDefault(); 
      $("#rateUsModal").toggle();
      $(".rate-us-content").toggle();
  });

 

  // Close Rate Us modal if clicked outside of it
  $(window).click(function(event) {
      if (event.target == $("#rateUsModal")[0]) {
          $("#rateUsModal").hide();
      }
  });
  // rate us stars
  let stars = document.querySelectorAll(".ratings span");
  let products = document.querySelectorAll(".ratings");
  let ratings = [];
   
  for(let star of stars){
     star.addEventListener("click", function(){
        
        let children = 	star.parentElement.children;
        for(let child of children){
           if(child.getAttribute("data-clicked")){
              return false;	
           }
        }
        
        this.setAttribute("data-clicked","true");
        let rating = this.dataset.rating;
        let productId = this.parentElement.dataset.productid;
        let data = {
           "rating": rating,
           "product-id": productId,
        }
        ratings.push(data);
        localStorage.setItem("rating", JSON.stringify(ratings));
     });
  }
   
  if(localStorage.getItem("rating")){
     ratings = JSON.parse(localStorage.getItem("rating"));
     for(let rating of ratings){
        for(let product of products){
           if(product.dataset.productid == rating["product-id"]){
              let reverse = Array.from(product.children).reverse();
              let index = parseInt(rating["rating"]) - 1;
              reverse[index].setAttribute("data-clicked", "true");
           }
        }
     }
  }

  $("#rateUsForm").submit(function(event) {
   event.preventDefault(); 
   var btn = document.querySelector(".submit-btn");
   var btnText = document.getElementById("btnText");
   btnText.innerHTML = "Thanks";
   btn.classList.add("active");
});

});


