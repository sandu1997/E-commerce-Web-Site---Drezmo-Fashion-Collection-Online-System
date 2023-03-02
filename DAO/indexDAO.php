<?php
	session_start();
	include ("connection.php");
?>
<?php
	//get cart details to index page
	
	if(isset($_SESSION['id'])){
		$userid=$_SESSION['id'];
			$total='0';
			$itemcount=0;
		$query6="SELECT sum(cart_total_price) as total,count(cart_id) as itemcount FROM cart WHERE cart_user_id='$userid'";
		$result6=mysqli_query($sql_connection,$query6);
		if(mysqli_num_rows($result6) >0){
			while($row=mysqli_fetch_assoc($result6)){
				$total=$row['total'];
				$itemcount=$row['itemcount'];
			}	
		}
		
			echo"<li class='cart-icon'>
				<a href='index.php?cart'>
					<i class='icon_bag_alt'></i>
					<span>$itemcount</span>
				</a>
				<div class='cart-hover'>
					
					<div class='select-button'>
						<a href='index.php?cart' class='primary-btn view-card'>VIEW CART</a>
						<a href='index.php?checkout' class='primary-btn checkout-btn'>CHECK OUT</a>
					</div>
				</div>
			</li>
			<li class='cart-price'>LKR. $total</li>";
	
	}
	

?>