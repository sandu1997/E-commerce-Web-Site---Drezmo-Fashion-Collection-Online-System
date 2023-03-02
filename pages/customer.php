<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>My Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>

	

<div style="margin-top: 50px">
	<div class="breacrumb-section">
		<div class="container">
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="orderdetails()">ORDER DETAILS</button>
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;"onclick="profiledetails()">PROFILE DETAILS</button> 
		</div>
	</div>
</div>

<div >

<?php include "profile.php"; ?>
</div>







<div id="orders">
	
<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
	<div class='modal-dialog modal-dialog-centered' role='document'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLongTitle'>Customer Feedback</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<textarea id='comment' rows='4' cols='50'>My opinion about this product</textarea><br>
				I give <input type='number' id='rate' min='1' max='5' value='1' style='width: 2em;'> &nbsp;&nbsp;/5 rate for this product.
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button type='button' class='btn btn-primary' onclick="feedback()" data-dismiss='modal'>Publish</button>
			</div>
		</div>
	</div>
</div>


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
					<a class="active" data-toggle="tab" href="#tab-1" role="tab" onclick="pending()">PENDING</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-2" role="tab" onclick="shipped()">SHIPPED</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-3" role="tab" onclick="received()">RECEIVED</a>
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
	$(document).ready(pending);
	var status='';
	function pending(){
		status="pending";
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Pending Orders");
			}
		})
		return false;
	}


	function shipped(){
		status="shipped";
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='receiveorder("+ obj[key]["orderid"] +")'>RECEIVED</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Shipped Orders");
			}
		})
		return false;
	}


	function received(){
		status="received";
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' data-toggle='modal' data-target='#exampleModalCenter' onclick='proid(\""+ obj[key]["proid"] + "\")'>Feedback</button>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Received Orders");
			}
		})
		return false;
	}
	
	
	function canceled(){
		status="canceled";
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Canceled Orders");
			}
		})
		return false;
	}
	
	
	
	
	function cancelorder(orderid) {
		var operation="cancel";
		var orderid = orderid;
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(pending);
				
			}
		})
		return false;
	}
	
	
	function receiveorder(orderid) {
		var operation="received";
		var orderid = orderid;
		$.ajax({
			url: "DAO/customerDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(shipped);
				
			}
		})
		return false;
	}
	
	
	var productid=0;
	function proid(proid){
		productid = proid;
	}	
		
	function feedback(){	
		var comment= document.getElementById("comment").value;
		var rate= document.getElementById("rate").value;
		
		
		$.ajax({
			url: "DAO/feedbackDAO.php",
			data: {
				comment: comment,
				rate: rate,
				productid:productid
			},
			success:function(data){
				$(document).ready(received);
				
			}
		})
		return false;
	}
	
	
	
</script>

<script>
document.getElementById("orders").style.display = "block";
document.getElementById("profile").style.display = "none";


function orderdetails() {
	document.getElementById("profile").style.display = "none";
 	document.getElementById("orders").style.display = "block";
}
function profiledetails() {
  	document.getElementById("profile").style.display = "block";
 	document.getElementById("orders").style.display = "none";
}
</script>