<?php
	session_start();
	include ("connection.php");
?>

<?php

	//show cart body with data
	
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT cart.cart_id,cart.cart_quentity,cart.cart_total_price,product.product_name,product.product_sale_price,product.product_image FROM cart,product WHERE cart.cart_product_id=product.product_id AND cart.cart_user_id='$userid'";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$totalprice=$row['cart_total_price'];
		$qty=$row['cart_quentity'];
		$productname=$row['product_name'];
		$saleprice='LKR. '.$row['product_sale_price'];
		$image=$row['product_image'];
		$cartid=$row['cart_id'];
		
		array_push($arr, [
		  'image'   => $image,
		  'productname' => $productname,
		  'saleprice' => $saleprice,
		  'qty' => $qty,
		  'totalprice' => $totalprice,
		  'cartid' => $cartid
		]);
	}
	echo json_encode($arr);
	
?>

<?php

	if(isset($_GET['item'])){
		$item=$_GET['item'];
		
		
		//get cart item details
		$query2="SELECT cart_product_id,cart_product_size,cart_quentity FROM cart WHERE cart_id='$item'";
		$result2=mysqli_query($sql_connection,$query2);
		if(mysqli_num_rows($result2) > 0){
			while($row=mysqli_fetch_assoc($result2)){
				$productid=$row['cart_product_id'];
				$productsize=$row['cart_product_size'];
				$productqty=$row['cart_quentity'];
			}
		
			//get stock qty
			$query3="SELECT stock_product_qty_$productsize FROM stock WHERE stock_product_id='$productid'";
			$result3=mysqli_query($sql_connection,$query3);
			if(mysqli_num_rows($result3) > 0){
				while($row=mysqli_fetch_assoc($result3)){
					$productstockqty=$row['stock_product_qty_'.$productsize];
				}
			
				//update cart item qty
				$newqty=$productstockqty+$productqty;
				$query4="UPDATE stock set stock_product_qty_$productsize='$newqty' WHERE stock_product_id='$productid'";
				if(mysqli_query($sql_connection,$query4)){
		
					//delete cart item
					$query5="DELETE FROM cart WHERE cart_id='$item'";
					$run5=mysqli_query($sql_connection,$query5);
				}
			}
		}
		
	}
	
	//echo "hello";

?>

