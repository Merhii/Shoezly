<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="nav&footer.css">
  <link rel="stylesheet" href="index.css">
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

  <div class="modallogsign">
    <div class="logsign">  	
      <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
          <form>
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="txt" placeholder="User name" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button id="signupbtn">Sign up</button>
          </form>
        </div>
  
        <div class="login">
          <form action="login.php" method="post">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pswd" placeholder="Password">
            <button id="loginbtn" name="loginbtn">Login</button>
          </form>
          <?php
          if(@$_GET['Empty']==true){
            ?>
            //todo : add ajax
            <div class="alert-light text-danger text-center"><?php echo $_GET['Empty']?></div>
          <?php
          }
          ?>

          <?php
          if(@$_GET['Invalid']==true){
            ?>
            //todo : add ajax
            <div class="alert-light text-danger text-center"><?php echo $_GET['Invalid']?></div>
          <?php
          }
          ?>
        </div>
    </div>
    </div>

  <div id="img-container">
    <div class="overlay"></div>
    <div id="quotation">
      <h2 class="quotes slide-container pb-5 pt-5">
        <div id="landing-title" class="fadein">SHOEZLY</div>
        <div class="fadein showdown" style="font-size:28px">
          WHERE EVERY STEP TELLS A STORY
        </div>
      </h2>
   
      <h2 class="quotes-2  pt-5 fadein">
       <span class="sibling" style="opacity:0">Let</span> <a onmouseenter="showSiblings()" onmouseleave="hideSiblings()" style="opacity:1" class="link p-2">Our Shoes &#8599;</a> <span class="sibling" style="opacity:0">Be Your Canvas</span>
      </h2>
  </div>
  </div>

  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id necessitatibus, sint libero molestiae error animi nostrum, laudantium facere, perferendis repellat at porro magnam? Architecto asperiores nihil iste aspernatur quam minus!
  Ipsum dolorem est nesciunt magni porro fugiat, expedita quam ratione inventore delectus quo asperiores culpa, exercitationem quae iste at quod labore libero nostrum corporis reprehenderit sequi quia. Laboriosam, magni fuga?
  Architecto, maiores voluptates mollitia, necessitatibus laborum quasi doloremque amet ad beatae voluptatum soluta dicta nam iusto eligendi harum corrupti quaerat culpa alias rem dolorem quam. Sapiente quas voluptas mollitia vero?
  Pariatur mollitia nisi voluptate exercitationem dolorum, fugiat a repellendus architecto deleniti enim quidem doloribus consequatur ipsum? Id veniam explicabo vel, ab magnam eligendi dicta, a repudiandae voluptas placeat minima et?
  Labore accusamus blanditiis repellendus ut quidem, hic explicabo ea, reprehenderit, corporis corrupti ullam doloribus qui? Exercitationem voluptatibus, dignissimos commodi, quos inventore nisi quasi, natus dolores corrupti asperiores a vitae sit!
  Unde asperiores sunt excepturi ducimus explicabo laboriosam, temporibus dicta at tempora doloremque necessitatibus nihil expedita fugiat iste nulla aliquid deleniti exercitationem error totam sapiente ex beatae. Aliquid tenetur facilis magnam!</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, aperiam tempora quasi libero ducimus, et tenetur eveniet possimus sed debitis earum magni unde similique quas. Eligendi iste quia laborum. Quod.
Asperiores accusantium, totam maxime perferendis eos sit harum odit praesentium voluptas voluptates molestias doloremque delectus nihil tempora dolore id voluptatibus quam deserunt nemo. Inventore, hic? Tempore natus velit voluptatibus rerum.
Sapiente facilis iusto quos ad, ut ipsa tempore aut laborum autem. Deleniti voluptatibus quia, et, quod quisquam porro quis voluptate accusantium temporibus aliquid eaque consequuntur similique ut, in molestiae iste.
Omnis enim iusto placeat possimus voluptatum, minima est veniam amet quas? Maxime aspernatur culpa quisquam et, quos perferendis fugiat iste animi consectetur nemo placeat omnis, sed vero minima quam minus.
Veniam, sint ad tempore excepturi non qui. Neque accusantium facilis voluptatem, cum doloremque amet ullam explicabo eius nobis quibusdam, dolores consectetur ipsam at nam deleniti vero alias sit? Architecto, pariatur?
Voluptate rem iste deleniti possimus dicta asperiores necessitatibus eos, animi laborum saepe labore tenetur totam facere quia? Iusto incidunt velit cupiditate officiis voluptatem eius delectus eos magnam! Facere, iste illo!
Exercitationem ea ad doloribus tempore eveniet quisquam, tenetur accusantium odit a veniam vel pariatur eligendi, aperiam commodi totam praesentium aliquid rem incidunt animi. Quas excepturi odit corrupti dicta eius. Autem.
Sed facilis a inventore dicta maxime aliquam minus mollitia accusantium ipsum cum iure tempora commodi rerum dignissimos, vitae sequi cupiditate optio incidunt eligendi doloremque pariatur nesciunt ducimus atque illo? Voluptatibus.</p>


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
              <li><a href="">FAQs</a></li>
              <li><a href="">Our Policies</a></li>
             
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
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  <script src="nav&signin.js"></script>
</body>
</html>