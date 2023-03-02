<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>








<div id="orders">
	



	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Order Details</h4>
			</div>
		</div>
	
		<div style="display: flex; justify-content: center; align-items: center">
			<div class="product-tab">
				<div class="tab-item">
					<ul class="nav" role="tablist">
						<li>
							<a class="active" data-toggle="tab" href="#tab-1" role="tab" onclick="neworders()">New</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-2" role="tab" onclick="shipped()">SHIPPED</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-3" role="tab" onclick="received()">Complete</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab-4" role="tab" onclick="canceled()">CANCELED</a>
						</li>
					</ul>
				</div>
			</div>	
		</div>		
	
		<section class="shopping-cart spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4 id="caption"></h4>
						<div class="cart-table">
							<table id="show">
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		
</div>

<script>
	$(document).ready(neworders);
	var status='';
	
	function neworders(){
		status="pending";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='shiporder("+ obj[key]["orderid"] +")'>SHIP</a>"+"</td>";
                            show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}

 
	function shipped(){
		status="shipped";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							
                            show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}


	function received(){
		status="received";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}
	
	
	function canceled(){
		status="canceled";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}
	
	
	
	
	function cancelorder(orderid) {
		var operation="cancel";
		var orderid = orderid;
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(neworders);
				
			}
		})
		return false;
	}
	
    

	
	function shiporder(orderid) {
		var operation="ship";
		var orderid = orderid;
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(neworders);
				
			}
		})
		return false;
	}
	 
</script>

