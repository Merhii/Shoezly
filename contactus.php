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
<nav style="background-color: rgb(124, 110, 91);" class="fadein">
    <div id="logo">Shoezly</div>
    <button class="navbar-mobile " type="button" id="menu-trigger">
      <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-list" id="navbarList">
      <li><a href="index.php" >Home </a></li>
      <!-- <li class="dropdown">
        <a href="shop.php">Shop </a>
        <div class="dd">
          <div id="up_arrow"></div>
          <ul>
            <li><a href="shop.php">Men</a></li>
            <li><a href="#">Women</a></li>
            <li><a href="#">Children</a></li>
          </ul>
        </div>
      </li> -->
      <li><a href="Shop.php">Shop</a></li>
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
  echo '  <li  class="text-center dropdown">
  <a href="#" id="logintxt"></a>
  <div class="dd">
  <div id="up_arrow"></div>
  <ul>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
  </li>';
    $userName = $_SESSION['User'];
    echo '<script>
            $(document).ready(function() {
                $.get("welcome.php", function(data) {
                    $("#logintxt").text("Welcome ' . $userName . '");
                    console.log("hello");
                $("#loginbtn").hide();
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
              <p>Feel free to send us a message in the contact form or contact us through &darr;</p>
              <p>Email: Shoezly@gmail.com</p>
              <p>Phone number: 71345731</p>
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
<div class="faq">
		<h3 class="faq-title">
    What payment methods do you accept?
		</h3>
		<p class="faq-text">
			For delivery our only payment method is through cash on delivery arrival
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	<div class="faq">
		<h3 class="faq-title">
    What is your return policy?
		</h3>
		<p class="faq-text">
    Our return policy allows you to return unworn shoes within 30 days of purchase for a full refund or exchange. Please refer to our Returns & Exchanges page for more details.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
    How can I track my order?
		</h3>
		<p class="faq-text">
    Once your order has been shipped, you will receive a tracking number via email. You can use this tracking number to monitor the status of your delivery.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
    Do you offer discounts for bulk orders?
		</h3>
		<p class="faq-text">
    Yes, we offer discounts for bulk orders. Please contact our sales team for more information on bulk pricing.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
	
	<div class="faq">
		<h3 class="faq-title">
    Can I cancel my order after it has been placed?
		</h3>
		<p class="faq-text">
    Orders can typically be canceled within 24 hours of placement. Please contact our customer service team as soon as possible if you need to cancel your order.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
  <div class="faq">
		<h3 class="faq-title">
    Are your shoes suitable for [specific activity/sport]?
		</h3>
		<p class="faq-text">
    We offer a range of shoes designed for various activities and sports. Please check the product descriptions for information on specific features and suitability.
		</p>
		<button class="faq-toggle">
			<i class="fas fa-chevron-down"></i>
			<i class="fas fa-times"></i>
		</button>
	</div>
  <div class="faq">
		<h3 class="faq-title">
    Do you offer shoe customization or personalization services?
		</h3>
		<p class="faq-text">
    At this time, we do not offer customization or personalization services for our shoes.

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
    <h5 class="text-center fs-3" style="color: #4b4237;">Shipping Policy: </h5><br>
   - We offer standard and expedited shipping options to cater to your needs. <br>
- Estimated delivery times: Standard shipping (3-7 business days), expedited shipping (1-3 business days). <br>
- Shipping is free for orders over $50; otherwise, standard shipping fee is $5 and expedited shipping fee is $15. <br>
- We currently only ship within the United States. <br>
- Tracking information will be provided once your order is processed.  <br>
    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Privacy Policy: </h5><br>
   - We respect the privacy of our customers and are committed to protecting their personal information. <br>
 - Customer information, including name, address, and payment details, is securely stored and used solely for order processing and communication purposes. <br>
- We do not sell or share customer information with third parties without consent. <br>
    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Quality Guarantee: </h5><br>
    - We stand behind the quality of our products and offer a guarantee against manufacturing defects. <br> 
- If a customer receives a defective product, they can contact customer service for a replacement or refund. <br>
- The quality guarantee is valid for a specified period from the date of purchase, ranging from 6 months to 1 year. <br>
    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Terms and Conditions: </h5><br>
   - By making a purchase on our website, customers agree to abide by our terms and conditions, including those related to returns, shipping, and privacy. <br>
 -We reserve the right to update or modify our policies at any time, with any changes being effective immediately upon posting on our website. <br>
    </div>
    <div class="col-6">
    <h5 class="text-center fs-3" style="color: #4b4237;">Customer Service Policy: </h5><br>
   - Our customer service team is available via email or phone during business hours to assist with any inquiries or issues. <br>
- We strive to respond to all customer inquiries within 24 hours. <br>
- Customer feedback is valued and helps us improve our products and services. <br>
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