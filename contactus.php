<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Support</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="nav&footer.css">
  <link rel="stylesheet" href="contactus.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<nav class="fadein">
    <div id="logo">Shoezly</div>
    <button class="navbar-mobile " type="button" id="menu-trigger">
      <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-list" id="navbarList">
      <li><a href="index.php">Home</a></li>
      <li class="dropdown">
        <a href="shop.php">Shop </a>
        <div class="dd">
          <div id="up_arrow"></div>
          <ul>
            <li><a href="#">Men</a></li>
            <li><a href="#">Women</a></li>
            <li><a href="#">Children</a></li>
          </ul>
        </div>
      </li>
      <li><a href="brands.php">Brands</a></li>
     
      
      <li class="dropdown" id="loginbtn" >
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" style="
            padding-bottom: 5px; margin-bottom:5px;" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="-3 -3 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg> 
        </a>
        <!-- <div class="dd">
          <div id="u_a_c"><div id="up_arrow"></div></div>
          <ul>
            <li><a href="#">Log In</a></li>
            <li><a href="#">Sign Up</a></li>
          </ul>
        </div> -->
      </li>
    

   
    <?php


if(isset($_SESSION['User'])) {
  echo '  <li id="logintxt" class="text-center d-flex justify-content-center"></li>';
    $userName = $_SESSION['User'];
    echo '<script>
            $(document).ready(function() {
                $.get("welcome.php", function(data) {
                    $("#logintxt").text("Welcome Back ' . $userName . '");
                    console.log("hello");
                });
            });
          </script>';
}
?>
 </ul>
  </nav>
  <div id="background-img">
    <div class="overlay"></div>
    <div id="container" class="fadein">
        <div class="form-container">
          <div class="left-container">
            <div class="left-inner-container">
            <h2>Let's Chat</h2>
            <p>Whether you have a question, want to start a project or simply want to connect.</p>
              <br>
              <p>Feel free to send me a message in the contact form</p>
          </div>
            </div>
          <div class="right-container">
            <div class="right-inner-container">
              <form action="#">
                  <h2 class="lg-view">Contact Us</h2>
            <h2 class="sm-view">Let's Chat</h2>
               
                <input type="text" id="name" placeholder="Name" required  />
            <input type="email" id="email" placeholder="Email" required />
                  <input type="phone" placeholder="Phone" required />
                <textarea rows="4" id="message" placeholder="Message" required></textarea>
                  <button>Submit</button>
                  <p id="output"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script src="nav&signin.js"></script>
  <script src="contactus.js"></script>
</body>
</html>