<?php
	session_start();
	include ("connection.php");
?>


<?php
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT cart.cart_quentity,cart.cart_total_price,product.product_name FROM cart,product WHERE cart.cart_product_id=product.product_id AND cart.cart_user_id='$userid'";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$totalprice=$row['cart_total_price'];
		$qty=$row['cart_quentity'];
		$productname=$row['product_name'];
		
		array_push($arr, [
		  'productname' => $productname,
		  'qty' => $qty,
		  'totalprice' => $totalprice
		]);
	}
	echo json_encode($arr);
	
	
	
	
	
?>