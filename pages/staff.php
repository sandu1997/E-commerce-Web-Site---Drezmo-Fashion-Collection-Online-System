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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

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
							echo "<a href='#' class='login-panel'>Hi! ".$username."</a><a href='../index.php?signout' class='login-panel'><i class='fa fa-sign-out'></i>Sign out </a>";
							
						}else{
							echo "<a href='index.php?login' class='login-panel'><i class='fa fa-user'></i>Login</a>";
							
						}
						
						if(isset($_GET['signout'])){
							session_unset();
							header('location:../index.php');
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
                            
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <center><img src="../img/logo.png">
						<font style="font-size:30px"><b>Staff Dashboard</b></font></center>
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
                    
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="staff.php?orders">Orders</a></li>
                        <li><a href="staff.php?products" >Products</a></li>
                        <li><a href="staff.php?profile" >profile</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>


	<div id="body"><!-- ---------------load body------------------ -->
	<?php
		
		if(isset($_GET['orders'])){
			include "ordersmanage.php";
		}elseif(isset($_GET['products'])){
			include ('productmanage.php');
		}
        elseif(isset($_GET['profile'])){
			include ('profile.php');
		}else{
			include ('ordersmanage.php');
		}
	
	?>
	
	
  
    </div><!-- ---------------load body------------------ -->




    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row" >
                <div class="footer-logo  offset-lg-2">
                    <a href="#"><img src="../img/footer-logo.png" alt=""></a>
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
                            <img src="../img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


<script>
	
</script>


<!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.zoom.min.js"></script>
    <script src="../js/jquery.dd.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>