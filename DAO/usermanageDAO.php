<?php
	session_start();
	include ("connection.php");
?>

<?php

	//show cart body with data
	$type=$_GET['type'];
	$userid=$_SESSION['id'];
	
	$arr=[];
	
	$query="SELECT * FROM user WHERE user_type='$type'";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$userid=$row['user_id'];
		$name=$row['user_first_name']." ".$row['user_last_name'];
		$tp=$row['user_tp'];
		$email=$row['user_email'];
		array_push($arr, [
		  'userid'   => $userid,
		  'name' => $name,
		  'tp' => $tp,
		  'email' => $email,
		  'type' => $type
		]);
	}
	
	echo json_encode($arr);
	

	
	if(isset($_GET['deleteuser'])){
		$id=$_GET['deleteuser'];
		$query2="DELETE FROM user WHERE user_id='$id'";
		$run2=mysqli_query($sql_connection,$query2);
		
	} 
	
?>

