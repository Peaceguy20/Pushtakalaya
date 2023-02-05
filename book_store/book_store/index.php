<?php
ini_set("display_errors","OFF");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pustakalaya</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav flex">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo"> <em>Pustakalaya</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                              
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="products.html" >Fictional</a>
                                    <a class="dropdown-item" href="products.html" >Non-Fictional</a>
                                    <a class="dropdown-item" href="products.html">Spiritual</a>
                                    <a class="dropdown-item" href="products.html">Food Recipe</a>
                                </div>
                            </li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li> 
							
							<?php if($_SESSION['name']==$_SESSION['user_name']){
						?>
							<li><a href="logout_book.php">Logout</a></li>
							<li><a href="account.php">Account</a></li>
						<?php }else{ ?>
							<li><a href="login_book.php">Login</a></li>
						<?php } ?>
					</ul>        
					
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>                               
        
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/the-four-vedas.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>BEST<em> Book Store </em> on internet</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Books</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="row">
		
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/boook.jpg" alt="" height="400" width="80">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>₹</sup>155.00</del> <sup>₹</sup>109.00
                            </span>

                            <h4>Ecogothic Gardens In The Long Nineteenth Century</h4>

                            <p>EcoGothic gardens in the long nineteenth century provides fresh approaches to contemporary ecocritical and environmental debates, providing new, compelling insights into material relationships between vegetal and human beings. Through eleven exciting essays, the collection demonstrates how unseen but vital relationships among plants and their life systems can reflect and inform human behaviours and actions.</p>

                            <div class="main-button text-center">
                                <a href="product-details.html">Order</a>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/p.jpeg" alt="" height="400" width="80">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>₹</sup>150.00</del> <sup>₹</sup>100.00
                            </span>

                            <h4>Ikigai: The Japanese secret to a long and happy life</h4>

                            <p>The people of Japan believe that everyone has an ikigai – a reason to jump out of bed each morning. And according to the residents of the Japanese island of Okinawa – the world’s longest-living people – finding it is the key to a longer and more fulfilled life. Inspiring and comforting, this book will give you the life-changing tools to uncover your personal ikigai. It will show you how to leave urgency behind.
                            </p>

                            <div class="main-button text-center">
                                <a href="product-details.html">Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/book7.jpg" alt="" height="400" width="80">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>₹</sup>150.00</del> <sup>₹</sup>100.00
                            </span>

                            <h4>Harry Potter And The Philosopher Stone</h4>

                            <p>Harry Potter and the Philosopher's Stone is a 1997 fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling's debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry.</p>

                           
                          <div class="main-button text-center">
                          <a href="product-details.html">Order</a>
                         </div>
                    </div>
                </div>
            </div>

            <br>

            
        </div>
    </section>
    <div class="main-button text-center">
                <a href="products.html">View our products</a>
            </div>
            <h1>&nbsp;</h1>
    <!-- ***** Cars Ends ***** -->
    
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2023 <a href="#">PUSTAKALAYA</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>