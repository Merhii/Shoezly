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

    <div class="main" style="padding-top: 2%;">
      <!-- filtering nav -->
      <div class="filtering">
          <ul>
              <li class="filterItem"><a href="">Men</a></li>
              <li class="filterItem"><a href="">Women</a></li>
              <li class="filterItem"><a href="">Kids</a></li>
          </ul>
          <p class="togglefilteringdrop" style="width: 30%; text-align:center; border-bottom: 1px solid gray; min-width: 500px">Filter according to your interest</p>
          <div class="filteringdrop">
            <ul>
              <li class="filterItem"><a href="">Category</a></li>
              <li class="filterItem"><a href="">Price</a></li>
              <li class="filterItem"><a href="">Size</a></li>
            </ul>
          </div>
        </div>
        
        <div class="category-popup">
          <div class="allcat"></div>
        </div>
        
        <div class="price-popup">
          <div class="pricefilter">
            <div class="ascdesc" id="ascending">Ascending</div>
            <div class="ascdesc" id="descending">Descending</div>
          </div>
        </div>

        <div class="size-popup">
          <div class="allsizes"></div>
        </div>

    <!-- cards -->
    <div class="all-cards-container"></div>
    </div>

    <div class="popup">
      <div class="shoe">
        <img src="imgs/image-removebg-preview.png" alt="" />
      </div>
      <div class="popup-container">
        <h2>KENZO ELEPHANT WHITE ESPADRILLES</h2>
        <div class="d-flex mb-1">
          <h5 class="me-5">Price:</h5>
          <h5>50$</h5>
        </div>
        <div class="d-flex size">
          <h5>Size:</h5>
          <div class="sizes">
            <div class="size-box">10</div>
            <div class="size-box">10</div>
            <div class="size-box">10</div>
            <div class="size-box">10</div>
          </div>
        </div>

        <div class="d-flex">
          <h5 class="mb-0 me-2">Quantity:</h5>

          <input type="number" name="quantity" value="1" />
        </div>
        <div class="add-to-cart-c text-center">
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <button class="close-popup-btn">&times;</button>
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