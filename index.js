$(document).ready(function(){
// nav bar background on scroll
$(function () {
  $(document).scroll(function () {
      $nav = $("nav");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$('#userloginbtn').click(function(e) {
  e.preventDefault();
  
  let email = $('#loginForm input[name="email"]').val();
  let password = $('#loginForm input[name="pswd"]').val();
  
  if (email.trim() === '' || password.trim() === '') {
    $('#responseMessage').html("Please fill in all the fields.");
    return;
  }

  $.ajax({
    type: 'POST',
    url: 'login.php',
    data: { email: email, password: password },
    success: function(response) {
      if (response.trim() === 'Login successful') {
        location.reload();
      } else {
        $('#responseMessage').html(response);
      }
    }
  });
  
});




});


// Our shoes link show quotation
function showSiblings(){
  document.querySelectorAll('.sibling').forEach(function(sibling){
      sibling.classList.add("fadein-sibling");
  sibling.classList.remove("fadeout-sibling");
  })
}
// Our shoes link hide quotation
function hideSiblings(){
  document.querySelectorAll('.sibling').forEach(function(sibling){
    sibling.classList.add("fadeout-sibling");
      sibling.classList.remove("fadein-sibling");
  })

}

// testimonials

var swiper = new Swiper(".swiper-container", {
  slidesPerView: 1, // Set a default value for smaller screen sizes
  spaceBetween: 5,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-nexts",
    prevEl: ".swiper-button-prevs",
  },
  mousewheel: false, // Disable mousewheel swiping
  keyboard: true,
  loop: true,
  breakpoints: {
    769: {
      slidesPerView: 2, // Adjust for larger screen sizes
      spaceBetween: 10,
    },
    1025: {
      slidesPerView: 3, // Adjust for even larger screen sizes
      spaceBetween: 10,
    },
  },
});



