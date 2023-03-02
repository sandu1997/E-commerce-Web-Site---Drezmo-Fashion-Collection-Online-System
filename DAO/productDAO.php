<?php
	session_start();
	

?>


<?php
include ("connection.php");


if(isset($_GET['proid'])){
	 $proid=$_GET["proid"];
	






	$query="SELECT product_name,product_brand,product_id,product_sale_price,product_regular_price,product_image,product_category,product_description,product_introduction,product_color FROM product WHERE product_id='$proid'";
	$result=mysqli_query($sql_connection,$query);
		while($row=mysqli_fetch_assoc($result)){
			$data["product_brand"]=$row['product_brand'];
			$data["product_name"]=$row['product_name'];
			$data["product_description"]=$row['product_description'];
			$data["product_introduction"]=$row['product_introduction'];
			$data["price"]="LKR ".$row['product_sale_price']."<span>LKR ".$row['product_regular_price']."</span>";
			$data["product_sale_price"]="LKR ".$row['product_sale_price'];
			$data["product_category"]=$row['product_category'];
			$data["product_image"]="<img class='product-big-img' src='img/products/".$row['product_image']."' >";
			$data["product_image2"]="<img class='product-big-img' src='img/products/".$row['product_image']."' >";
			$data["product_color"]=$row['product_color'];
		}	
		
	$query2="SELECT stock_product_qty_small,stock_product_qty_medium,stock_product_qty_large,stock_product_qty_extralarge FROM stock WHERE stock_product_id='$proid'";
	$result2=mysqli_query($sql_connection,$query2);
		while($row=mysqli_fetch_assoc($result2)){
			$data["availability"]="s - ".$row['stock_product_qty_small']." | m - ".$row['stock_product_qty_medium']." | l - ".$row['stock_product_qty_large']." | xl - ".$row['stock_product_qty_extralarge'];
		}		
			
			
			
	
	echo json_encode($data);
	
	
	
}

?>

<?php
		$max='';
	if(isset($_GET['size'])){
		$size = $_GET["size"];
		$pid = $_GET["pid"];
		
		
		$query3="SELECT stock_product_qty_$size FROM stock WHERE stock_product_id='$pid'";
		$result3=mysqli_query($sql_connection,$query3);
			while($row=mysqli_fetch_assoc($result3)){
				$max=$row['stock_product_qty_'.$size];
			}
		if($max !=0){
			echo "
			
				<div >
					<input type='number' value='1' id='number' class='number' min='1' max='$max'>
				</div>
				<a href='#' class='primary-btn pd-cart' onclick='addtocart()'>Add To Cart</a>
			
			";	
		}
	}
	
	
	
	if(isset($_GET['qty'])){
		$qty= $_GET["qty"];
		$siz = $_GET["siz"];
		$proidcart=$_GET["proidcart"];
		if(isset($_SESSION['id'])){
			$userid=$_SESSION['id'];
			$qty;
			$siz;
			$proidcart;
			
			
			$query4="SELECT product_sale_price FROM product WHERE product_id='$proidcart'";
			$result4=mysqli_query($sql_connection,$query4);
			while($row=mysqli_fetch_assoc($result4)){
				$total=$row['product_sale_price']*$qty;
			}
			
			$query5="INSERT INTO cart (cart_user_id,cart_product_id,cart_product_size,cart_quentity,cart_total_price) VALUES('$userid','$proidcart','$siz','$qty','$total')";
			$run5=mysqli_query($sql_connection,$query5);
			
			
			$query6="SELECT stock_product_qty_$siz FROM stock WHERE stock_product_id='$proidcart'";
			$result6=mysqli_query($sql_connection,$query6);
			while($row=mysqli_fetch_assoc($result6)){
				$stockqty=$row['stock_product_qty_'.$siz];
			}
			
			$newqty=$stockqty-$qty;
			$query7="UPDATE stock set stock_product_qty_$siz='$newqty' WHERE stock_product_id='$proidcart'";
			$run7=mysqli_query($sql_connection,$query7);
			
			echo "<font color='red'>Item added successful!</font>";
			
		}else{
			echo '<script>alert("Please Loging to your account!!!"); window.location = "index.php?login";</script>';
		}
	}


?>