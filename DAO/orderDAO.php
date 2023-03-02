<?php
	session_start();
	

?>


<?php
	include ("connection.php");
	
	if(isset($_SESSION['id'])){
		$userid=$_SESSION['id'];
		
		$query="SELECT user_first_name,	user_last_name,user_country,user_address_no,user_address_street,user_address_town,user_tp,user_email FROM user WHERE user_id='$userid'";
		$result=mysqli_query($sql_connection,$query);
		while($row=mysqli_fetch_assoc($result)){
			$data["user_first_name"]=$row['user_first_name'];
			$data["user_last_name"]=$row['user_last_name'];
			$data["user_country"]=$row['user_country'];
			$data["user_address_no"]=$row['user_address_no'];
			$data["user_address_street"]=$row['user_address_street'];
			$data["user_address_town"]=$row['user_address_town'];
			$data["user_tp"]=$row['user_tp'];
			$data["user_email"]=$row['user_email'];
			
		}	
		echo json_encode($data);
	}	
	
	
	
	if(isset($_GET["name"])){
		
		$name= $_GET["name"];
		$address = $_GET["address"];
		$contact = $_GET["contact"];
		
		
		$query2="SELECT cart_product_id,cart_product_size,cart_quentity,cart_total_price FROM cart WHERE cart_user_id='$userid'";
		$result2=mysqli_query($sql_connection,$query2);
		if(mysqli_num_rows($result2) > 0){
			while($row=mysqli_fetch_assoc($result2)){
				$cart_product_id=$row['cart_product_id'];
				$cart_product_size=$row['cart_product_size'];
				$cart_quentity=$row['cart_quentity'];
				$cart_total_price=$row['cart_total_price'];
				
				
				$query3="INSERT INTO orders (order_user_id,order_shipping_name,order_shipping_address,order_shipping_contact,order_product_id,order_product_size,order_quentity,order_total_price) 
				VALUES('$userid','$name','$address','$contact','$cart_product_id','$cart_product_size','$cart_quentity','$cart_total_price')";
				$run3=mysqli_query($sql_connection,$query3);
				
				if($run3){
					$query4="DELETE FROM cart WHERE cart_user_id='$userid'";
					$run4=mysqli_query($sql_connection,$query4);
					
					$query5="INSERT INTO notification (notifi_cust_id) VALUES ('$userid')";
					$run5=mysqli_query($sql_connection,$query5);



					
					$email = "drezmo@gmail.com";
					$subject = "Message From Website";


					$to= 'lakshanj1ace@gmail.com';
					$mail_subject= 'New Order From Drezmo';
					$email_body= "<h1>New Order</h1><br>";
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
					$email_body .= "Visit <a href='http://www.drezmo.dazkon.com'>drezmo</a> and complete your order";

					$header="From: {$email}\r\nContent-Type: text/html;";

					$send_mail_result= mail($to, $mail_subject,  $email_body, $header);




				}
				
				
			}	
		}
	}
?>