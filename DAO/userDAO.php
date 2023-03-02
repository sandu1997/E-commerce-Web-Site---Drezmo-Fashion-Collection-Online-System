<?php
	session_start();
	include ("connection.php");
?>


<?php

		if(isset($_GET['view_user_admin'])){
			$userid=$_GET['view_user_admin'];
		}else{
			$userid=$_SESSION['id'];
		}
	
		//$userid=$_SESSION['id'];
		
		
		$query6="SELECT * FROM user WHERE user_id='$userid'";
		$result6=mysqli_query($sql_connection,$query6);
			while($row=mysqli_fetch_assoc($result6)){
				$data["username"]=$row['user_name'];
				$data["name_first"]=$row['user_first_name'];
				$data["name_last"]=$row['user_last_name'];
				$data["nic"]=$row['user_nic'];
				$data["user_country"]=$row['user_country'];
				$data["address_no"]=$row['user_address_no'];
				$data["address_street"]=$row['user_address_street'];
				$data["address_town"]=$row['user_address_town'];
				$data["tp"]=$row['user_tp'];
				$data["email"]=$row['user_email'];
				
				
			}
		echo json_encode($data);
	



	if(isset($_GET['fname'])){
		$fname=$_GET['fname'];
		$lname=$_GET['lname'];
		$tpno=$_GET['tpno'];
		$adrno=$_GET['adrno'];
		$adrstreet=$_GET['adrstreet'];
		$adrtown=$_GET['adrtown'];
		
		$query2="UPDATE user set user_first_name='$fname',user_last_name='$lname',user_tp='$tpno',user_address_no='$adrno',user_address_street='$adrstreet',user_address_town='$adrtown' WHERE user_id='$userid'";
		$run2=mysqli_query($sql_connection,$query2);
		

	}


	if(isset($_GET['deleteuser'])){
		$query3="DELETE FROM user WHERE user_id='$userid'";
		$run3=mysqli_query($sql_connection,$query3);
		
		session_unset();
		//header("Location: /index.php");
	} 





?>