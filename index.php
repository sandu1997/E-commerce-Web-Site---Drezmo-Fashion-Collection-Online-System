<?php
	session_start();
	if(isset($_SESSION['username'])){
		$username=$_SESSION['username'];
	}
	
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>drezmo</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    
</head>

<body>
    <!-- Page Preloder -->
   <!--  <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        teamdrezmo@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +94 779 034 678
                    </div>
                </div>
                <div class="ht-right">
					<?php
						if (isset($_SESSION['username']) && $_SESSION["loggedin"] = true){
							echo "<a href='index.php?customerProfile' class='login-panel'>Hi! ".$username."</a><a href='index.php?signout' class='login-panel'><i class='fa fa-sign-out'></i>Sign out </a>";
							
						}else{
							echo "<a href='index.php?login' class='login-panel'><i class='fa fa-user'></i>Login</a>";
							
						}
						
						if(isset($_GET['signout'])){
							session_unset();
							header('location:index.php');
						}
					?>
                    <!--<a href="index.php?login" class="login-panel"><i class="fa fa-user"></i>Login</a>-->
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 text-right col-md-3">
						<ul class='nav-right' id='cartbag'></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            <li><a href="index.php?shop&catagory=ladies">Ladies Clothing</a></li>
                            <li><a href="index.php?shop&catagory=teenagers">Teenagers Clothing</a></li>
                            <li><a href="index.php?shop&catagory=kids">Kids Clothing</a></li>
                            <li><a href="index.php?shop&catagory=sports">Sports Wears</a></li>
                            <li><a href="index.php?shop&catagory=bags">Hand Bags</a></li>
                            <li><a href="index.php?shop&catagory=jewellaries">Jewellaries/Accessories</a></li>
                            <li><a href="index.php?shop&catagory=shoes">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="index.php?shop" >Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="index.php?shop&catagory=ladies">Ladies</a></li>
                                <li><a href="index.php?shop&catagory=teenagers">Teenagers</a></li>
                                <li><a href="index.php?shop&catagory=kids">Kids</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?contact">Contact</a></li>
                        <li><a href="index.php?faq">Faq</a></li>
                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->



    <div id="body"><!-- ---------------load body------------------ -->
	<?php
		
		if(isset($_GET['productID'])){
			include "pages/product.php";
		}elseif(isset($_GET['register'])){
			include ('pages/register.php');
		}elseif(isset($_GET['customerProfile'])){
			include ('pages/customer.php');
		}elseif(isset($_GET['login'])){
			include ('pages/login.php');
		}elseif(isset($_GET['cart'])){
			include ('pages/shopping-cart.php');
		}elseif(isset($_GET['checkout'])){
			include ('pages/check-out.php');
		}elseif(isset($_GET['shop'])){
			include ('pages/shop.php');
		}elseif(isset($_GET['contact'])){
			include ('pages/contact.php');
		}elseif(isset($_GET['faq'])){
			include ('pages/faq.php');
		}else{
			include ('pages/home.php');
		}
	
	?>
	
	
  
    </div><!-- ---------------load body------------------ -->
    
	


   

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
    


    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row" >
                <div class="footer-logo  offset-lg-1">
                    <a href="#"><img src="img/footer-logo.png" alt=""></a>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        
                        <ul><font color="white">
                            <li>Address: Thalangama, koswaththa, Colombo, Sri Lanka</li>
                            <li>Phone: +94 779 034 678</li>
                            <li>Email: teamdrezmo@gmail.com</li></font>>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Shop</h5>
                        <ul>
                            <li><a href="index.php?shop&catagory=ladies">Ladies</a></li>
							<li><a href="index.php?shop&catagory=teenagers">Teenagers</a></li>
							<li><a href="index.php?shop&catagory=kids">Kids</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                           
							Drezmo &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

 

    <script>
	
		$(document).ready(showcartdetails);
		
		function showcartdetails(){
			$.ajax({
				url: "DAO/indexDAO.php",
				success:function(data){
					$('#cartbag').html(data);
				}
			})
			return false;
		}

		
		
		
    </script>


 

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>



</html>



