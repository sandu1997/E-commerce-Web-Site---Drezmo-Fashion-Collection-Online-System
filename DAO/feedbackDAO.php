<?php
	session_start();
	include ("connection.php");
?>

<?php

	
	
	$proid=$_GET['proid'];
	$limit=$_GET['limit'];
	$arr=[];
	
	$query="SELECT feedback.feedback_date,feedback.feedback_comment,feedback.feedback_ratings,user.user_name FROM feedback,user WHERE feedback.feedback_product_id='$proid' AND feedback.feedback_user_id=user.user_id LIMIT $limit; ";
	$result=mysqli_query($sql_connection,$query);
	while($row=mysqli_fetch_assoc($result)){
		$username=$row['user_name'];
		$date=$row['feedback_date'];
		$comment=$row['feedback_comment'];
		$rating=$row['feedback_ratings'];
		array_push($arr, [
		  'username' => $username,
		  'date' => $date,
		  'comment' => $comment,
		  'rating' => $rating
		]);
	}
	
	echo json_encode($arr);

	


	$userid=$_SESSION['id'];
	if(isset($_GET['comment'])){
		$productid=$_GET['productid'];
		$rate=$_GET['rate'];
		$comment=$_GET['comment'];
		
		$query5="INSERT INTO feedback (feedback_product_id,feedback_user_id,feedback_comment,feedback_ratings) VALUES ('$productid','$userid','$comment','$rate')";
		$run5=mysqli_query($sql_connection,$query5);
		
	}


?>

