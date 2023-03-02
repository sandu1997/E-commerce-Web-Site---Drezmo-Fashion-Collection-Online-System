<?php
    //session_start();
?>


<!DOCTYPE html>
<html lang="zxx">

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Fashi Template">
		<meta name="keywords" content="Fashi, unica, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		

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
	</head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>


	<!-- Breadcrumb Section Begin -->
	<div class="breacrumb-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-text">
						<a href="#"><i class="fa fa-home"></i> Home</a>
						<span>Shop</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Section Begin -->

	<!-- Product Shop Section Begin -->
	<section class="product-shop spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
					<div class="filter-widget">
						<h4 class="fw-title">Categories</h4>
						<ul class="filter-catagories">
							<li><a href="index.php?shop&catagory=kids">Kids</a></li>
							<li><a href="index.php?shop&catagory=teenagers">Teenagers</a></li>
							<li><a href="index.php?shop&catagory=ladies">Ladies</a></li>
						</ul>
					</div>
					<form>
						<div class="filter-widget">
							<h4 class="fw-title">Brand</h4>
							
								<div class="bc-item">
									<label for="jezza">
										<input type="checkbox" name="brand" value="jezza">
										<span class="checkmark"></span>
										Jezza
									</label>
								</div>
								<div class="bc-item">
									<label for="avirate">
										<input type="checkbox" name="brand" value="avirate">
										<span class="checkmark"></span>
										Avirate
									</label>
								</div>
								<div class="bc-item">
									<label for="buddhibatiks">
										<input type="checkbox" name="brand" value="buddhibatiks">
										<span class="checkmark"></span>
										Buddhi Batiks
									</label>
								</div>
								<div class="bc-item">
									<label for="aditi">
										<input type="checkbox" name="brand" value="aditi">
										<span class="checkmark"></span>
										Aditi
									</label>
								</div>
								<div class="bc-item">
									<label for="kellyfelder">
										<input type="checkbox" name="brand" value="kellyfelder">
										<span class="checkmark"></span>
										Kelly Felder
									</label>
								</div>
							
						</div>
						<div class="filter-widget">
							<h4 class="fw-title">Price</h4>
							<div class="filter-range-wrap">
								<div class="range-slider">
									<div class="price-input">
										<input type="text" id="minamount">
										<input type="text" id="maxamount">
									</div>
								</div>
								<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
									data-min="100" data-max="20000">
									<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
								</div>
							</div>
							<a href="#" class="filter-btn" id="filter" onclick="filter()">Filter</a>
							
						</div>
					</form>
					
					<div class="filter-widget">
						<h4 class="fw-title">Tags</h4>
						<div class="fw-tags">
							<a href="#">Towel</a>
							<a href="#">Shoes</a>
							<a href="#">Coat</a>
							<a href="#">Dresses</a>
							<a href="#">Trousers</a>
							<a href="#">Men's hats</a>
							<a href="#">Backpack</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9 order-1 order-lg-2">
					<div class="product-show-option">
						<div class="row">
							<div class="col-lg-7 col-md-7">
								
							</div>
							<div class="col-lg-5 col-md-5 text-right">
								
							</div>
						</div>
					</div>


					<div class="product-list">
						<div class="row" id="showshop">


							

						</div>
					</div>


					<div class="loading-more">
						<i class="icon_loading"></i>
						<button style="border:none" onclick="readmore()">Load more</button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Shop Section End -->






	<script>
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		const catagory = urlParams.get('catagory');
	
	
		
		
		//var catagoryname = "'ladies','teenagers','kids'";
		//var brand = "'jezza','avirate','buddhibatiks','aditi','kellyfelder'";	
		//var minamount = 0;
		//var maxamount = 100000;
		
		
		var catagoryname="";
		var brand="";
		var minamount=0;
		var maxamount=0;
		
		if(catagory==null){
			catagoryname = "'ladies','teenagers','kids'";
			brand = "'jezza','avirate','buddhibatiks','aditi','kellyfelder'";	
			minamount = 0;
			maxamount = 100000;
		}else{
			catagoryname = "'" + catagory + "'";
			brand = "'jezza','avirate','buddhibatiks','aditi','kellyfelder'";	
			minamount = 0;
			maxamount = 100000;
		}
		
		
		var limit=9;
		function readmore(){
			limit+=9;
			showshop();
		}
		
		
		function filter(){
			//catagoryname = "'" + catagory + "'";
			var lst = document.forms[0];
			brand = "";
			var i;
			for (i = 0; i < lst.length; i++) {
				if (lst[i].checked) {
					brand = brand + "'" +lst[i].value + "'" +",";
				}
			}
			brand = brand + "''";
			
			minamount=document.getElementById("minamount").value.replace(/\D/g, "");
			maxamount=document.getElementById("maxamount").value.replace(/\D/g, "");
			
			$(document).ready(showshop);
		}
		
		
		
		$(document).ready(showshop);
		function showshop(){
			
			
			$.ajax({
				url: "DAO/shopDAO.php",
				data: {
					catagoryname: catagoryname,
					brand: brand,
					minamount: minamount,
					maxamount: maxamount,
					limit: limit
				},
				dataType:"JSON",
				success:function(obj){
					var show="";
					for (var key in obj) {
						if (obj.hasOwnProperty(key)) {
							show+= "<div class='col-lg-4 col-sm-6'>";
								show+= "<div class='product-item'>";
									show+= "<div class='pi-pic'>";
										show+= "<img src='img/products/" + obj[key]["product_image"] + "'>";
										show+= "<div class='sale pp-sale'>Sale</div>";
										show+= "<ul>";
											show+= "<li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>";
											show+= "<li class='quick-view'><a href='./index.php?productID="+ obj[key]["product_id"] +"'>+ Quick View</a></li>";
											show+= "<li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>";
										show+= "</ul>";
									show+= "</div>";
									show+= "<div class='pi-text'>";
										show+= "<div class='catagory-name'>"+ obj[key]["product_category"] +"</div>";
										show+= "<a href='#'>";
											show+= "<h5>"+ obj[key]["product_name"] +"</h5>";
										show+= "</a>";
										show+= "<div class='product-price'>";
										show+=	"LKR " + obj[key]["product_sale_price"];
											show+= " <span> LKR "+ obj[key]["product_regular_price"] +"</span>";
										show+= "</div>";
									show+= "</div>";
								show+= "</div>";
							show+= "</div>";
						}
					}
					$("#showshop").html(show);
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
	

</html>