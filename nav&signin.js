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
    $(".dropdown > a").click(function(event) {
      event.preventDefault();
      $(this).parent().toggleClass("active");
    });
  });