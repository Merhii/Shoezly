
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
  mousewheel: true,
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

