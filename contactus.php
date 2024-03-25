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
            <p>Whether you have a question, want to report something or simply want to connect.</p>
              <br>
              <p>Feel free to send us a message in the contact form</p>
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
<div class="white-bg">
<h1 class="text-center pt-3 fadein " id="faq" style="color: #4b4237;">Frequently Asked Questions</h1>

<div class="faqs-container fadein">
	<div class="faq active">
		<h3 class="faq-title">
			Why shouldn't we trust atoms?
		</h3>
		<p class="faq-text">
			They make up everything.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
			What do you call someone with no body and no nose?
		</h3>
		<p class="faq-text">
			Nobody knows.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
			What's the object-oriented way to become wealthy?
		</h3>
		<p class="faq-text">
			Inheritance.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
			How many tickles does it take to tickle an octopus?
		</h3>
		<p class="faq-text">
			Ten-tickles!
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
			What is: 1 + 1?
		</h3>
		<p class="faq-text">
			Depends on who are you asking.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
</div>
<h2 class="text-center pt-5 pb-2 fs-1 fadein" style="color: #4b4237;" id="our-policies">Our Policies</h2>
<div id="policies" class="d-flex justify-content-center fadein">

  <div class="row" style="--bs-gutter-x:0;">
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Return and Exchange Policy: </h5><br>
   - Customers may return or exchange shoes within 30 days of purchase with original receipt. <br>
   - Shoes must be unworn, in original packaging, and accompanied by tags. <br>
   - Returns and exchanges can be made in-store or online. <br>
   - A 10% restocking fee applies to all returns made after 30 days. <br>

    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Return and Exchange Policy: </h5><br>
   - Customers may return or exchange shoes within 30 days of purchase with original receipt. <br>
   - Shoes must be unworn, in original packaging, and accompanied by tags. <br>
   - Returns and exchanges can be made in-store or online. <br>
   - A 10% restocking fee applies to all returns made after 30 days. <br>

    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Return and Exchange Policy: </h5><br>
   - Customers may return or exchange shoes within 30 days of purchase with original receipt. <br>
   - Shoes must be unworn, in original packaging, and accompanied by tags. <br>
   - Returns and exchanges can be made in-store or online. <br>
   - A 10% restocking fee applies to all returns made after 30 days. <br>
    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Return and Exchange Policy: </h5><br>
   - Customers may return or exchange shoes within 30 days of purchase with original receipt. <br>
   - Shoes must be unworn, in original packaging, and accompanied by tags. <br>
   - Returns and exchanges can be made in-store or online. <br>
   - A 10% restocking fee applies to all returns made after 30 days. <br>
    </div>
  </div>
  
</div>
</div>
   <!-- Site footer -->
   <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">
Welcome to Shoezly, your premier destination for footwear! With multiple convenient locations and an easy-to-navigate website, we're dedicated to providing top-quality shoes for every occasion. At Shoezly, we believe that everyone deserves to step out in confidence, and we're here to make that happen. Experience the difference in quality, service, and selection when you shop with us.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Locations</h6>
            <ul class="footer-links">
              <li>Saida-Nejme Square</li>
              <li>Beirut-Verdun</li>
              <li>Tyre-Bourj El Chmali</li>
            
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Support Center</h6>
            <ul class="footer-links">
              <li><a href="contactus.php">Contact Us</a></li>
              <li><a href="contactus.php#faq">FAQs</a></li>
              <li><a href="contactus.php#our-policies">Our Policies</a></li>
              <li><a href="" id="rate-us-link">Rate Us</a></li>
             
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; Shoezly
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li> <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #3b5998"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
              ></a></li>
              <li> <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #55acee"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
              ></a></li>
              <li><a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #ac2bac"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
              ></a></li>
    
            </ul>
          </div>
        </div>
      </div>
</footer>
  <script src="nav&signin.js"></script>
  <script src="contactus.js"></script>
</body>
</html>