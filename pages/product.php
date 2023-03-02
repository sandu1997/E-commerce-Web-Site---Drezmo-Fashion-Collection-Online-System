<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>



<body>
    <!-- Page Preloder -->
    

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- left pannel -->
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom" >
                                <div id="product_image"></div>
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                           
                        </div>
						
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span id="product_brand"></span>
                                    <h3 id="product_name"></h3>
                                    
                                </div>
                                <div class="pd-rating" id="rate">
                                </div>
                                <div class="pd-desc">
                                    <p id="product_description"></p>
                                    <h4 id="price"></h4>
                                </div>
                                
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" value="s">
                                        <label for="sm-size" onclick="getSize('small')">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio">
                                        <label for="md-size" onclick="getSize('medium')">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" >
                                        <label for="lg-size" onclick="getSize('large')">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" >
                                        <label for="xl-size" onclick="getSize('extralarge')">xl</label>
                                    </div>
                                </div>
								
                                <div class="quantity" id="size">
									<!--<div >
                                        <input type="number" value="1"  class="number">
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">Add To Cart</a>-->
                                </div>
								
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES : </span><a id="product_category"></a></li>
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab" >Customer Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p id="product_introduction"></p>
                                                
                                            </div>
                                            <div class="col-lg-5" id="product_image2">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory" >Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating" id="rate2">
                                                        
                                                        
                                                        <!--<span>(5)</span>-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price" id="product_sale_price"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size & Availability</td>
                                                <td>
                                                    <div class="p-size" id="availability"> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span id="product_color"></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option" id='feedback'>
                                       
                                    </div>
									<div class="loading-more">
										<i class="icon_loading"></i>
										<button style="border:none" onclick="readmore()">Read more</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->



    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
	
	


<div ></div>



<script>

		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		const id = urlParams.get('productID');
		
		var size;
		
        function getSize(val) {
			var pid = id;
			size = val;
			$.ajax({
				url: "DAO/productDAO.php",
				data: {
					pid: pid,
					size: size
				},
				//dataType:"JSON",
				success:function(data){
					//$('#rad').html(report.size);
					$('#size').html(data);
				}
			})
		}


		$(document).ready(showitemdetails);
		
		function showitemdetails(){
			var proid = id;
			$.ajax({
				url: "DAO/productDAO.php",
				data: {
					proid: proid,
				},
				dataType:"JSON",
				success:function(data){
					$('#product_brand').html(data.product_brand);
					$('#product_name').html(data.product_name);
					$('#product_description').text(data.product_description);
					$('#product_introduction').text(data.product_introduction);
					$('#price').html(data.price);
					$('#product_sale_price').html(data.product_sale_price);
					$('#product_category').html(data.product_category);
					$('#product_image').html(data.product_image);
					$('#product_image2').html(data.product_image2);
					$('#product_color').html(data.product_color);
					$('#availability').html(data.availability);
				}
			})
			return false;
		}
		
		
		function addtocart() {
			var qty = document.getElementById("number").value;
			siz = size;
			var proidcart = id;
			$.ajax({
				url: "DAO/productDAO.php",
				data: {
					qty: qty,
					siz: siz,
					proidcart: proidcart
				},
				//dataType:"JSON",
				success:function(da){
					//$('#rad').html(report.size);
					$(document).ready(showitemdetails);
					$('#size').html(da);
				}
			})
			return false;
		}
		
		

		var limit=2;
		function readmore(){
			limit+=2;
			$(document).ready(showfeedback);
		}
		
		/* --------------------------------------------- feedback start  ---------------------------------------------*/
		$(document).ready(showfeedback);
		function showfeedback(){
			var proid = id;
			
			$.ajax({
				url: "DAO/feedbackDAO.php",
				data: {
					proid: proid,
					limit: limit
				},
				dataType:"JSON",
				success:function(obj){
					var show="";
					show +="<h4>Comments</h4>";
					var totalrate=0;
					var count=0;
					for (var key in obj) {
						if (obj.hasOwnProperty(key)) {
						  
							show += "<div class='comment-option'>";
                                show += "<div class='co-item'>";
                                    show += "<div class='avatar-text'>";
                                        show += "<div class='at-rating'>";
											var i=1;
											var j=5 - obj[key]["rating"];
											for(i;i<=obj[key]["rating"];i++){
												show += "<i class='fa fa-star'></i>";
												show += " ";
											}
											for(var i=1;i<=j;i++){
												show += "<i class='fa fa-star-o'></i>";
												show += " ";
											}
											
										show += "</div>";
										show += "<h5>"+ obj[key]["username"] +" <span>"+ obj[key]["date"] +"</span></h5>";
										show += "<div class='at-reply'>"+ obj[key]["comment"] +"</div>";
									show += "</div>";
								show += "</div>";
							show += "</div>";
							
							count+=1;
							totalrate+=parseInt(obj[key]["rating"]);
						}
					}
					var rate="";
					var rateavg=Math.round( totalrate/count );
					var i=1;
					var j=5 - rateavg;
					for(i;i<=rateavg;i++){
						rate += "<i class='fa fa-star'></i>";
						rate += " ";
					}
					for(var i=1;i<=j;i++){
						rate += "<i class='fa fa-star-o'></i>";
						rate += " ";
					}
					
					
					$("#rate").html(rate);
					$("#rate2").html(rate);
					$("#feedback").html(show);
					
				}
			})
			return false;
		}
		
		
	/* --------------------------------------------- feedback end  ---------------------------------------------*/	
		
		
		
		
		
</script>
    






    
</body>

</html>