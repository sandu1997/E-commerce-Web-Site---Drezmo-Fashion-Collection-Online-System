<?php
	session_start();
	include ("connection.php");
?>

<?php


	$status=$_GET['status'];
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT * FROM orders WHERE order_status='$status'";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
        $orderid=$row['order_id'];
		$productdetails="Product: ".$row['order_product_id']."<br>Size: ".$row['order_product_size']."<br>Quentity: ".$row['order_quentity']."<br>Total Price: LKR.".$row['order_total_price']."<br>Date: ".$row['order_date'];
		$shippingdetails="Customer ID: ".$row['order_user_id']."<br>Name: ".$row['order_shipping_name']."<br>Address:".$row['order_shipping_address']."<br>Contact: ".$row['order_shipping_contact'];
		array_push($arr, [
		  'orderid' => $orderid,
		  'productdetails' => $productdetails,
		  'shippingdetails' => $shippingdetails
		]);
	}
	
	echo json_encode($arr);
	
?>

<?php

	if(isset($_GET['operation'])){
		$query3="SELECT user_email  FROM user WHERE user_id='$userid'";
		$result3=mysqli_query($sql_connection,$query3);
		while($row=mysqli_fetch_assoc($result3)){
        	$useremail=$row['user_email'];
		}

		if($_GET['operation']== "cancel"){
			$getorderid=$_GET['orderid'];
			
			$query2="UPDATE orders set order_status='canceled' WHERE order_id='$getorderid'";
			$run2=mysqli_query($sql_connection,$query2);


			$email = "drezmo@gmail.com";
			$subject = "Message From Website";

			$to= "'".$useremail."'";
			$mail_subject= 'Your order canceled by Drezmo';
			$email_body= "<h1>Canceled Order</h1><br>";
			$email_body .= "_______________________________Shipping Details____________________________________<br>";
			$email_body .= "<b>User ID: </b> {$shippingdetails} <br>";
			$email_body .= "___________________________________Order_________________________________________<br>";
			$email_body .= "<b>Product ID: </b> {$orderid} <br>";
			$email_body .= "<b>Size: </b> {$productdetails} <br>";
			$email_body .= "Visit <a href='http://www.drezmo.dazkon.com'>drezmo</a>";

			$header="From: {$email}\r\nContent-Type: text/html;";

			$send_mail_result= mail($to, $mail_subject,  $email_body, $header);


		}

        if($_GET['operation']== "ship"){
			$getorderid=$_GET['orderid'];
			
			$query2="UPDATE orders set order_status='shipped' WHERE order_id='$getorderid'";
			$run2=mysqli_query($sql_connection,$query2);

			$email = "drezmo@gmail.com";
			$subject = "Message From Website";

			$to= "'".$useremail."'";
			$mail_subject= 'Your order Shipped by Drezmo';
			$email_body= "<h1>Your Order is on the way</h1><br>";
			$email_body .= "_______________________________Shipping Details____________________________________<br>";
			$email_body .= "<b>User ID: </b> {$shippingdetails} <br>";
			$email_body .= "___________________________________Order_________________________________________<br>";
			$email_body .= "<b>Product ID: </b> {$orderid} <br>";
			$email_body .= "<b>Size: </b> {$productdetails} <br>";
			$email_body .= "Visit <a href='http://www.drezmo.dazkon.com'>drezmo</a>";

			$header="From: {$email}\r\nContent-Type: text/html;";

			$send_mail_result= mail($to, $mail_subject,  $email_body, $header);
		}
		
	}
	


	
	
	
	
	
?>

