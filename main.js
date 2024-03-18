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
  })

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
