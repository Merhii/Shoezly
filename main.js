$(document).ready(function() {
  // hamburgur menu
  $("#menu-trigger").click(function() {
    $("#navbarList").toggleClass("active");
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
