<?php
	session_start();
	include ("connection.php");
?>

<?php

	//show cart body with data
	$id=$_GET['id'];
	
	
	$arr=[];
	
	$query="SELECT stock.*,product.product_image FROM stock,product WHERE stock_product_id='$id' AND stock_product_id=product_id";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$stock_product_id=$row['stock_product_id'];
		$stock_product_qty_small=$row['stock_product_qty_small'];
		$stock_product_qty_medium=$row['stock_product_qty_medium'];
		$stock_product_qty_large=$row['stock_product_qty_large'];
		$stock_product_qty_extralarge=$row['stock_product_qty_extralarge'];
		$product_image=$row['product_image'];
		array_push($arr, [
		  'stock_product_id'   => $stock_product_id,
		  'stock_product_qty_small' => $stock_product_qty_small,
		  'stock_product_qty_medium' => $stock_product_qty_medium,
		  'stock_product_qty_large' => $stock_product_qty_large,
		  'stock_product_qty_extralarge' => $stock_product_qty_extralarge,
		  'product_image' => $product_image
		]);
	}
	
	echo json_encode($arr);
	

	if(isset($_GET['updatestock'])){
		$productid=$_GET['productid'];
		$small=$_GET['small'];
		$medium=$_GET['medium'];
		$large=$_GET['large'];
		$extralarge=$_GET['extralarge'];
		
		$query2="UPDATE stock set stock_product_qty_small='$small',stock_product_qty_medium='$medium',stock_product_qty_large='$large',stock_product_qty_extralarge='$extralarge' WHERE stock_product_id='$productid'";
		$run2=mysqli_query($sql_connection,$query2);
		

	}
	
	
	if(isset($_GET['deleteitem'])){
		$itemid=$_GET['itemid'];
		
		$query3="DELETE FROM product WHERE product_id ='$itemid'";
		$run3=mysqli_query($sql_connection,$query3);
		

	}
	
	
?>

