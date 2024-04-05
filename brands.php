<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="brands.css">
    <link rel="stylesheet" href="Card&Cart.css">
    <link rel="stylesheet" href="filteringnav.css">
    <link rel="stylesheet" href="nav&footer.css">
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
      <li><a href="Shop.php">Shop</a></li>
      <li><a href="brands.php">Brands</a></li>
     
      
      <li class="dropdown" id="loginbtn" >
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" style="
            padding-bottom: 5px; margin-bottom:5px;" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="-3 -3 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg> 
        </a>
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
<!-- log and sign in pop up -->
<div class="modallogsign">
  <button type="button" id="X-btn2"  class="btn-close X-btn" aria-label="Close"></button>
    <div class="logsign">  	
      <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
        <form method="post" action="signup.php">
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="fnsignup" placeholder="First name">
            <input type="text" name="lnsignup" placeholder="Last name">
            <input type="email" name="emailsignup" placeholder="Email">
            <input type="tel" name="phonesignup" placeholder="Phone number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
          <input type="password" name="pswdsignup" placeholder="Password">
            <button id="signupbtn" name="signupbtn">Sign up</button>
          </form>
          <?php
          if(@$_GET['SignupEmpty']==true){
            ?>
            <!-- todo : add ajax -->
            <div class="alert-light text-danger text-center"><?php echo $_GET['SignupEmpty']?></div>
          <?php
          }
          ?>
        </div>
  
        <div class="login">
          <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pswd" placeholder="Password">
            <button id="userloginbtn" name="loginbtn">Login</button>
          </form>
          <div id="responseMessage" class="alert-light text-danger text-center"></div>
        </div>
    </div>
    </div>

    <!-- rate us pop up -->
    <div id="rateUsModal" class="rate-us">
    <button type="button" id="X-btn1"  class="btn-close X-btn" aria-label="Close"></button>
  <div class="rate-us-content">
    <h2 class="text-center">Rate Us</h2>
    <form id="rateUsForm" action="">
    <div class="ratings-wrapper">
   <div data-productid="39" class="ratings">
      <span data-rating="5">★</span>
      <span data-rating="4">★</span>
      <span data-rating="3">★</span>
      <span data-rating="2">★</span>
      <span data-rating="1">★</span>
   </div>
</div>
<div class="pt-2" id="testimonial">
<h5 style="color: white;" class="text-center">&darr; Write Us a Testimonial &darr;</h5>
<textarea class="m-4" name="" id="" cols="10" rows="7" placeholder="Share Your Thoughts!"></textarea>
<div class="d-flex justify-content-center">
  <button type="submit"  class="submit-btn">
    <p id="btnText">Submit</p>
    <div class="checked">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
        <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
      </svg>
    </div>
  </button>
  </div>

</div>
</form>
  </div>
</div>

<div class="coverContainer">
        <img src="imgs/coverBrand.png" alt="">
        <div style="display: flex; justify-content: center;">
            <div class="quote-container">
                <p class="quote-text">"Style is a way to say who you are without having to speak."</p>
                <p class="quote-author">- Rachel Zoe</p>
            </div>
        </div>
    </div>

    <div class="brands">
        <div class="brands-list">
            <div class="logos">
                <div class="logos-slide">
                </div>
                <div class="logos-slide">
                </div>
              </div>
        </div>
    </div>

    <div class="main" style="padding-top: 7%;">
      <!-- filtering nav -->
      <div class="filtering">
          <ul>
              <li class="filterItem">Men</li>
              <li class="filterItem">Women</li>
              <li class="filterItem">Kids</li>
          </ul>
          <p class="togglefilteringdrop" style="width: 30%; text-align:center; border-bottom: 1px solid gray; min-width: 300px">Filter according to your interest</p>
          <div class="filteringdrop">
            <ul>
              <li class="togglefilterItem">Category</li>
              <li class="togglefilterItem">Price</li>
              <li class="togglefilterItem">Size</li>
            </ul>
          </div>
        </div>
        
        <div class="category-popup">
          <div class="allcat"></div>
        </div>
        
        <div class="price-popup">
          <div class="pricefilter">
            <div class="ascdesc togglefiltersubitem" id="ascending">Ascending</div>
            <div class="ascdesc togglefiltersubitem" id="descending">Descending</div>
          </div>
        </div>

        <div class="size-popup">
          <div class="allsizes"></div>
        </div>

    <!-- cards -->
    <div class="all-cards-container"></div>
    </div>
    <!-- cart -->
    <div class="cartPOPUP">
        <h1>Shopping Cart</h1>
        <div class="CartItems">
            <div class="item">
                <div class="image">
                    <img src="image.png">
                </div>
                <div class="name">NAME
                </div>
                <div class="totalPrice">50$</div>
                <div class="remove">
                    <button>&times;</button>
                </div>
            </div>

        </div>
        <div class="btn">
            <button class="close">Close</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>

    <div class="shopping-cart" data-product-count="0">
        <span class="cart-icon" onclick="toggleCart()">&#128722;</span>
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
</body>
<script src="brands.js"></script>
<script src="filteringnav.js"></script>
<script src="nav&signin.js"></script>
</html>