<?php
	include ("../DAO/connection.php");
?>
<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>



	

<div style="margin-top: 50px">
	<div class="breacrumb-section">
		<div class="container">
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="addproduct()">Add Product</button>
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="products()">Products</button>
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="stockupdate()">Stock Update</button> 
		</div>
	</div>
</div>










<div id="addproduct">
	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Add Product</h4>
			</div>
		</div>
	
	
		<div class="register-login-section spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="register-form">
							
							<form method="POST" enctype='multipart/form-data'>
									<div class="group-input">
										<label for="productid">Product ID *</label>
										<input type="text" name="productid">
									</div>
									<div class="group-input">
										<label for="productname">Product Name *</label>
										<input type="text" name="productname">
									</div>
									<div class="group-input">
										<label for="brand">Brand *</label>
										<select name='brand' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:100%;height:30px'>
											<option value='jezza'>Jezza</option>
											<option value='avirate'>Avirate</option>
											<option value='buddhibatiks'>Buddhi Batiks</option>
											<option value='aditi'>Aditi</option>
											<option value='kellyfelder'>Kelly Felder</option>
										</select>
									</div>
									<div class="group-input">
										<label for="category">Category *</label>
										<select name='category' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:100%;height:30px'>
											<option value='kids'>Kids</option>
											<option value='teenagers'>Teenagers</option>
											<option value='ladies'>Ladies</option>
										</select>
									</div>
									<div class="group-input">
										<label for="color">Color*</label>
										<input type="text" name="color">
									</div>
									<div class="group-input">
										<label for="regprice">Regular Price *</label>
										<input type="text" name="regprice" placeholder="Rs.00">
									</div>
									<div class="group-input">
										<label for="saleprice">Sale Price *</label>
										<input type="text" name="saleprice" placeholder="Rs.00">
									</div>
									<div class="group-input">
										<label for="description">Description *</label>
										<textarea name='description' rows='5' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:100%;' required></textarea>
									</div>
									<div class="group-input">
										<label for="introduction">Introduction *</label>
										<textarea name='introduction' rows='5' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:100%;' required></textarea>
									</div>
									<div class="group-input">
										<label for="image">Product Image *</label>
										<input type='file' name="image"><br>
									</div>
								
									<button class="site-btn register-btn" name="additem" onclick="addproduct()">Add Item</button>
									<input type="reset" value="Clear" style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;width:100%;">
									
									<div class="group-input">
										<p id="itemaddstatus" style="color: red"></p>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<div id="stockupdate">
	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Stock Update</h4>
				<label for="pid">Product ID</label>
				<input type="text" id="pid" style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:10%;height:30px'>
				<button style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:10%;height:30px' onclick="stock()">Search</button>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 id="caption"></h4>
					<div class="cart-table">
						<table id="stock"></table>
						<p id="stockstatus" style="color: red"></p>
					</div>
				</div>
			</div>
		</div>
	</section>
		
</div>

<div id="products">
	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Products</h4>
				<label for="category">Category</label> 
				<select id='category' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:10%;height:30px'>
					<option value='all'>All</option>
					<option value='kids'>Kids</option>
					<option value='teenagers'>Teenagers</option>
					<option value='ladies'>Ladies</option>
				</select> |
				<label for="brand">Brand</label> 
				<select id='brand' style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:10%;height:30px'>
					<option value='all'>All</option>
					<option value='jezza'>jezza</option>
					<option value='avirate'>avirate</option>
					<option value='buddhibatiks'>buddhibatiks</option>
					<option value='aditi'>aditi</option>
					<option value='kellyfelder'>kellyfelder</option>
				</select>
				<button style='display: inline-block;border: 1px solid #ccc;box-sizing: border-box;width:10%;height:30px' onclick="filter()">Search</button>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 id="caption"></h4>
					<div class="cart-table">
						<table id="productlist"></table>
						<center><button onclick="readmore()">Load more</button></center>
					</div>
				</div>
			</div>
		</div>
	</section>
		
</div>

<?php
	if(isset($_POST['additem'])){
		$productid=$_POST['productid'];
		$productname=$_POST['productname'];
		$brand=$_POST['brand'];
		$category=$_POST['category'];
		$color=$_POST['color'];
		$regprice=$_POST['regprice'];
		$saleprice=$_POST['saleprice'];
		$description=$_POST['description'];
		$introduction=$_POST['introduction'];
		//$proimage=$_GET['proimage'];
		
		//image upload
		$target="../img/products/".basename($_FILES['image']['name']);

		$image=$_FILES['image']['name'];

		$query="insert into product (product_id,product_name,product_brand,product_category,product_color,product_regular_price	,product_sale_price,product_description,product_introduction,product_image) values ('$productid','$productname','$brand','$category','$color','$regprice','$saleprice','$description','$introduction','$image')";
		$result=mysqli_query($sql_connection,$query);
		
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		
		//create stock
		$query2="insert into stock (stock_product_id) values ('$productid')";
		$result2=mysqli_query($sql_connection,$query2);
		
	}
?>

<script>

	


	
	
	
	function viewuser(id) {
		$.ajax({
			url: "../DAO/userDAO.php",
			data: {
				id: id
			},
			dataType:"JSON",
			success:function(data){
				document.getElementById("username").value =(data.username);
				document.getElementById("nic").value =(data.nic);
				document.getElementById("user_country").value =(data.user_country);
				document.getElementById("email").value =(data.email);
				
				document.getElementById("name_first").value =(data.name_first);
				document.getElementById("name_last").value = (data.name_last);
				document.getElementById("address_no").value = (data.address_no);
				document.getElementById("address_street").value = (data.address_street);
				document.getElementById("address_town").value = (data.address_town);
				document.getElementById("tp").value = (data.tp);
			}
		})
		return false;
	}
	
	
	

	
	function deleteitem(itemid){
		
		var deleteitem=true;
		$.ajax({
			url: "../DAO/productmanageDAO.php",
			data: {
				deleteitem: deleteitem,
				itemid: itemid
			},
			success:function(data){
				$(document).ready(filter);
			}
		})
		return false;
		
	}
	
	
	
	
	var catagory=null;
	var catagoryname="";
	var brand=null;
	var brandname="";
	var minamount=0;
	var maxamount=100000;
	
	
	var limit=9;
	function readmore(){
		limit+=9;
		showshop();
	}
	
	
	function filter(){
		var catagory= document.getElementById("category").value;
		if (catagory=="all"){
			catagoryname = "'ladies','teenagers','kids'";
		}else{
			catagoryname="'" + catagory + "'";
		}
		var brand= document.getElementById("brand").value;
		if (brand=="all"){
			brandname = "'jezza','avirate','buddhibatiks','aditi','kellyfelder'";	
		}else{
			brandname="'" + brand + "'";
		}
		
		$(document).ready(showshop);
	}

	
	$(document).ready(filter);
	function showshop(){
		$.ajax({
			url: "../DAO/shopDAO.php",
			data: {
				catagoryname: catagoryname,
				brand: brandname,
				minamount: minamount,
				maxamount: maxamount,
				limit: limit
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Product</th>";
				show += "<th>Details</th>";
				show += "<th>Prices</th>";
				show += "<th>Description</th>";
				show += "<th>Introduction</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='cart-pic first-row'><img src='../img/products/" + obj[key]["product_image"]+"' width='100'></td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5 style='text-align:left;'>ID: "+ obj[key]["product_id"] +"</h5>";
								show += "<h5 style='text-align:left;'>Category: "+ obj[key]["product_category"] +"</h5>";
								show += "<h5 style='text-align:left;'>Brand: "+ obj[key]["product_brand"] +"</h5>";
								show += "<h5 style='text-align:left;'>"+ obj[key]["product_name"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5 style='text-align:left;'>Sale: Rs."+ obj[key]["product_sale_price"] +"</h5>";
								show += "<h5 style='text-align:left;'>Regular: Rs."+ obj[key]["product_regular_price"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<p style='text-align:left;'>"+ obj[key]["product_description"] +"</p>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<p style='text-align:left;'>"+ obj[key]["product_introduction"] +"</p>";
							show += "</td>";
							//show += "<td class='qua-col first-row'>" + "<button style='border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;' data-toggle='modal' data-target='#exampleModalCenter' onclick='viewuser("+ obj[key]["userid"] +")'>VIEW</button>"+"</td>";
							show += "<td class='qua-col first-row '>" + "<button style='border: none;color: white;padding: 15px 32px;text-align: center;background-color: red;' onclick='deleteitem(\""+ obj[key]["product_id"] + "\")'>DELETE</button>"+"</td>";
						show += "</tr>";
						
					}
					show += "<hr>";
				}
				show += "</tbody>";
				$("#productlist").html(show);
			}
		})
		return false;
	}

	
	
	
	
	function stock(){
		var id = document.getElementById("pid").value;
		$.ajax({
			url: "../DAO/productmanageDAO.php",
			data: {
				id:id
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Product</th>";
				show += "<th>ID</th>";
				show += "<th>Small</th>";
				show += "<th>Medium</th>";
				show += "<th>Large</th>";
				show += "<th>Extra Large</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='cart-pic first-row'><img src='../img/products/" + obj[key]["product_image"]+"' width='100'></td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["stock_product_id"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<input id='small' style='width:30%;padding:0;' type='text' value='"+ obj[key]["stock_product_qty_small"] +"'>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<input id='medium' style='width:30%;padding:0;' type='text' value='"+ obj[key]["stock_product_qty_medium"] +"'>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<input id='large' style='width:30%;padding:0;' type='text' value='"+ obj[key]["stock_product_qty_large"] +"'>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<input id='extralarge' style='width:30%;padding:0;' type='text' value='"+ obj[key]["stock_product_qty_extralarge"] +"'>";
							show += "</td>";
							
							show += "<td class='qua-col first-row '>" + "<button style='border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;' onclick='updatestock(\""+ obj[key]['stock_product_id'] +"\")'>Update</button>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				
				
				$("#stock").html(show);
			}
		})
		return false;
	}



	function updatestock(productid){
		var updatestock=true;
		var small= document.getElementById("small").value;
		var medium= document.getElementById("medium").value;
		var large= document.getElementById("large").value;
		var extralarge= document.getElementById("extralarge").value;
		
		$.ajax({
			url: "../DAO/productmanageDAO.php",
			data: {
				updatestock: updatestock,
				productid: productid,
				small: small,
				medium: medium,
				large: large,
				extralarge: extralarge
			},
			success:function(data){
				$("#stockstatus").html('Updated Successful!');
			}
		})
		return false;
		
	}
	
</script>

<script >
	$("#register").click(function(){
		var fname= $("#fname").val();
		var lname= $("#lname").val();
		var username= $("#username").val();
		var password= $("#password").val();
		var adno= $("#adno").val();
		var adstreet= $("#adstreet").val();
		var adtown= $("#adtown").val();
		var telephone= $("#telephone").val();
		var email= $("#email").val();
		var nic= $("#nic").val();
		var type= $("#type").val();
		console.log(fname); 
		$.ajax({
			url: "../DAO/registerDAO.php",
			data: {
				fname: fname,
				lname: lname,
				username: username,
				password: password,
				adno: adno,
				adstreet: adstreet,
				adtown: adtown,
				telephone: telephone,
				email: email,
				nic: nic,
				type: type
			},
			
			success:function(data){
				$("#status").html(data);
			}
		})
		return false;
	}) 
</script>




<script>
document.getElementById("products").style.display = "none";
document.getElementById("stockupdate").style.display = "none";
document.getElementById("addproduct").style.display = "block";

function products() {
	document.getElementById("products").style.display = "block";
	document.getElementById("stockupdate").style.display = "none";
	document.getElementById("addproduct").style.display = "none";
}
function stockupdate() {
  	document.getElementById("products").style.display = "none";
	document.getElementById("stockupdate").style.display = "block";
	document.getElementById("addproduct").style.display = "none";
}
function addproduct() {
  	document.getElementById("products").style.display = "none";
	document.getElementById("stockupdate").style.display = "none";
	document.getElementById("addproduct").style.display = "block";
}
</script>

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