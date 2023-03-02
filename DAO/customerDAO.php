<?php
	session_start();
	include ("connection.php");
?>

<?php

	//show cart body with data
	$status=$_GET['status'];
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT orders.order_id, orders.order_quentity, orders.order_total_price, orders.order_date, product.product_name, product.product_image, product.product_id FROM orders,product WHERE orders.order_user_id='$userid' AND orders.order_status='$status' AND orders.order_product_id=product.product_id";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$orderid=$row['order_id'];
		$image=$row['product_image'];
		$details="Product: ".$row['product_name']."<br>Quantity: ".$row['order_quentity']."<br>Total Price: LKR. ".$row['order_total_price']."<br>Order Date/Time: ".$row['order_date'];
		$proid=$row['product_id'];
		array_push($arr, [
		  'image'   => $image,
		  'orderid' => $orderid,
		  'details' => $details,
		  'proid' => $proid
		]);
	}
	
	echo json_encode($arr);
	
?>

<?php
	if(isset($_GET['orderid'])){
		$getorderid=$_GET['orderid'];
		$query5="SELECT * FROM orders WHERE order_id='$getorderid'";
		$result5=mysqli_query($sql_connection,$query5);
		while($row=mysqli_fetch_assoc($result5)){
			$name = $row['order_shipping_name'];
			$address = $row['order_shipping_address'];
			$contact = $row['order_shipping_contact'];
			$cart_product_id = $row['order_product_id'];
			$cart_product_size = $row['order_product_size'];
			$cart_quentity = $row['order_quentity'];
			$cart_total_price = $row['order_total_price'];
		}
	}

	if(isset($_GET['operation'])){
		if($_GET['operation']== "cancel"){
			$getorderid=$_GET['orderid'];
			
			$query2="UPDATE orders set order_status='canceled' WHERE order_id='$getorderid'";
			$run2=mysqli_query($sql_connection,$query2);


			$email = "drezmo@gmail.com";
			$subject = "Message From Website";

			$to= 'lakshanj1ace@gmail.com';
			$mail_subject= 'Order Canceled by User - Drezmo';
			$email_body= "<h1>Order Canceled</h1><br>";
			$email_body .= "_______________________________Shipping Details____________________________________<br>";
			$email_body .= "<b>User ID: </b> {$userid} <br>";
			$email_body .= "<b>Name: </b> {$name} <br>";
			$email_body .= "<b>Address: </b> {$address} <br>";
			$email_body .= "<b>Contact: </b> {$contact} <br><br>";
			$email_body .= "___________________________________Order_________________________________________<br>";
			$email_body .= "<b>Product ID: </b> {$cart_product_id} <br>";
			$email_body .= "<b>Size: </b> {$cart_product_size} <br>";
			$email_body .= "<b>Quentity: </b> {$cart_quentity} <br>";
			$email_body .= "<b>Total Price: </b>Rs. {$cart_total_price} <br><br>";

			$header="From: {$email}\r\nContent-Type: text/html;";

			$send_mail_result= mail($to, $mail_subject,  $email_body, $header);

		}
		
		if($_GET['operation']== "delete"){
			$getorderid=$_GET['orderid'];
			
			$query3="DELETE FROM orders WHERE order_id='$getorderid'";
			$run3=mysqli_query($sql_connection,$query3);
		}
		
		if($_GET['operation']== "received"){
			$getorderid=$_GET['orderid'];
			
			$query4="UPDATE orders set order_status='received' WHERE order_id='$getorderid'";
			$run4=mysqli_query($sql_connection,$query4);


			$email = "drezmo@gmail.com";
			$subject = "Message From Website";

			$to= 'lakshanj1ace@gmail.com';
			$mail_subject= 'Order Completed - Drezmo';
			$email_body= "<h1>Order Completed</h1><br>";
			$email_body .= "_______________________________Shipping Details____________________________________<br>";
			$email_body .= "<b>User ID: </b> {$userid} <br>";
			$email_body .= "<b>Name: </b> {$name} <br>";
			$email_body .= "<b>Address: </b> {$address} <br>";
			$email_body .= "<b>Contact: </b> {$contact} <br><br>";
			$email_body .= "___________________________________Order_________________________________________<br>";
			$email_body .= "<b>Product ID: </b> {$cart_product_id} <br>";
			$email_body .= "<b>Size: </b> {$cart_product_size} <br>";
			$email_body .= "<b>Quentity: </b> {$cart_quentity} <br>";
			$email_body .= "<b>Total Price: </b>Rs. {$cart_total_price} <br><br>";

			$header="From: {$email}\r\nContent-Type: text/html;";

			$send_mail_result= mail($to, $mail_subject,  $email_body, $header);

		}
	}
	


	
	
	
	
	
?>

