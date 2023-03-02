

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody id="show">
							 
                        </tbody>
						<tbody id="show">
							
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <a href="#" class="primary-btn up-cart">Update cart</a>
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="cart-total"><H4>Total <span id='total'></span></H4></li></H3>
                            </ul>
                            <a href="index.php?checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->


<div id="result1"></div>
<div id="result2"></div>

<script>
	$(document).ready(showcart);
		
	function showcart(){
		$.ajax({
			url: "DAO/shopping-cartDAO.php",
			
			dataType:"JSON",
			success:function(obj){
				var show="";
				var total=0;
				
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='cart-pic first-row'><img src='img/products/"+ obj[key]["image"] +"' width='100'></td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productname"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row'>"+ obj[key]["saleprice"] +"</td>";
							show += "<td class='qua-col first-row'>";
								show += "<div class='quantity'>";
									show += "<div >"+ obj[key]["qty"] +"</div>";
								show += "</div>";
							show += "</td>";
							show += "<td class='total-price first-row'>"+ obj[key]["totalprice"] +"</td>";
							show += "<td class='close-td first-row'><i class='ti-close' onclick='removecartitem("+ obj[key]["cartid"] +")'></i></td>";
						show += "</tr>";
						
						
						total +=parseInt(obj[key]["totalprice"]);
					}
				}
				$("#show").html(show);
				$("#total").html('LKR '+total);
			}
		})
		return false;
	}


	
	function removecartitem(itemid) {
		var item = itemid;
		$.ajax({
			url: "DAO/shopping-cartDAO.php",
			data: {
				item: item
			},
			success:function(data){
				$(document).ready(showcart);
				
			}
		})
		return false;
	}
	
</script>