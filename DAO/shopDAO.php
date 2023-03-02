<?php
//if(isset($_GET['category'])){
	//$category=$_GET["category"];
//}	


include ("connection.php");


?>


<?php

	if(isset($_GET['minamount'])){
		$min=$_GET['minamount'];
		$max=$_GET['maxamount'];
		$brand=$_GET['brand'];
		$category=$_GET['catagoryname'];
		$limit=$_GET['limit'];
		//$minamount=0;
		//$maxamount=20000;
		
		//$category="'kids','teenagers','ladies'";
		
		$arr=[];
		
		$query="SELECT * FROM product WHERE product_category in($category) AND product_brand in($brand) AND product_sale_price BETWEEN $min AND $max LIMIT $limit";
		$result=mysqli_query($sql_connection,$query);
		while($row=mysqli_fetch_assoc($result)){
			$product_name=$row['product_name'];
			$product_brand=$row['product_brand'];
			$product_id=$row['product_id'];
			$product_category=$row['product_category'];
			$product_sale_price=$row['product_sale_price'];
			$product_regular_price=$row['product_regular_price'];
			$product_image=$row['product_image'];
			$product_description=$row['product_description'];
			$product_introduction=$row['product_introduction'];
			$product_color=$row['product_color'];
			array_push($arr, [
			  'product_name' => $product_name,
			  'product_brand' => $product_brand,
			  'product_id' => $product_id,
			  'product_category' => $product_category,
			  'product_sale_price' => $product_sale_price,
			  'product_regular_price' => $product_regular_price,
			  'product_image' => $product_image,
			  'product_description' => $product_description,
			  'product_introduction' => $product_introduction,
			  'product_color' => $product_color
			]);
		}
		
		echo json_encode($arr);
	}
?>


