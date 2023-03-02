
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        
                        <h4>Shipping Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" id="user_first_name" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" id="user_last_name" value="">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country<span>*</span></label>
                                <input type="text" id="user_country" value="">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="user_address_no" class="street-first" value="">
                                <input type="text" id="user_address_street" value="">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input type="text" id="zip" value="">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" id="user_address_town" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="user_email" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="user_tp" value="">
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table" id='show'>
                                    
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
									<a href='#' class='site-btn place-btn' onclick='placeorder()'>CHECK OUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


<div id='alrt'></div>

<script>
	$(document).ready(showorder);
		
	function showorder(){
		var total=0;
		$.ajax({
			url: "DAO/check-outDAO.php",
			
			dataType:"JSON",
			success:function(obj){
				var show="";
				
				
				show += "<li>Product <span>Total</span></li>";
				
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<li class='fw-normal'>"+ obj[key]["productname"] + " x " + obj[key]["qty"] + "<span>"+ obj[key]["totalprice"] +"</span></li>";
						total +=parseInt(obj[key]["totalprice"]);
					}
				}
				show += "<li class='total-price'>Total <span>LKR "+total+"</span></li>";
				
				$("#show").html(show);
				
			}
		})
		return false;
	}



	$(document).ready(showuser);
	
	function showuser(){
		$.ajax({
			url: "DAO/orderDAO.php",
			dataType:"JSON",
			success:function(data){
				document.getElementById("user_first_name").value =(data.user_first_name);
				document.getElementById("user_last_name").value =(data.user_last_name);
				document.getElementById("user_country").value =(data.user_country);
				document.getElementById("user_address_no").value =(data.user_address_no);
				document.getElementById("user_address_street").value =(data.user_address_street);
				document.getElementById("user_address_town").value =(data.user_address_town);
				document.getElementById("user_tp").value =(data.user_tp);
				document.getElementById("user_email").value =(data.user_email);
			}
		})
		return false;
	}
		
		
		
	function placeorder() {
		var name=document.getElementById("user_first_name").value+" "+document.getElementById("user_last_name").value;
		var address=document.getElementById("user_address_no").value+", "+document.getElementById("user_address_street").value+", "+document.getElementById("user_address_town").value+", "+document.getElementById("zip").value+", "+document.getElementById("user_country").value;
		var contact=document.getElementById("user_email").value+", "+document.getElementById("user_tp").value;
		
		$.ajax({
			url: "DAO/orderDAO.php",
			data: {
				name: name,
				address: address,
				contact: contact,
			},
			//dataType:"JSON",
			success:function(da){
				$(document).ready(showorder);
			}
		})
		return false;
	}

</script>