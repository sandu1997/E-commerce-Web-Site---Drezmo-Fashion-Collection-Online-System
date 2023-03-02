<?php
	include ("connection.php");
?>
<?php
	
		$productid=$_GET['productid'];
		$productname=$_GET['productname'];
		$brand=$_GET['brand'];
		$category=$_GET['category'];
		$color=$_GET['color'];
		$regprice=$_GET['regprice'];
		$saleprice=$_GET['saleprice'];
		$description=$_GET['description'];
		$introduction=$_GET['introduction'];
		//$proimage=$_GET['proimage'];
		
		//image upload
		$target="product_images/".basename($_FILES['image']['name']);

		$image=$_FILES['image']['name'];

		$query="insert into product (product_id,product_name,product_brand,product_category,product_color,product_regular_price	,product_sale_price,product_description,product_introduction,product_image) values ('$productid','$productname','$brand','$category','$color','$regprice','$saleprice','$description','$introduction','$image')";
		$result=mysqli_query($sql_connection,$query);
		
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		
		//create stock
		$query2="insert into stock (stock_product_id) values ('$productid')";
		$result2=mysqli_query($sql_connection,$query2);
		
		
	
?>