<?php
include ("connection.php");


    $month=$_GET["month"]."%";



	$query="SELECT count(order_id) as completed FROM orders WHERE order_status='received' AND order_date LIKE '$month'";
	$result=mysqli_query($sql_connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        $completed= $row['completed'];
    }	
	$query2="SELECT count(order_id) as canceled FROM orders WHERE order_status='canceled' AND order_date LIKE '$month'";
	$result2=mysqli_query($sql_connection,$query2);
    while($row=mysqli_fetch_assoc($result2)){
        $canceled= $row['canceled'];
    }	
	$query3="SELECT sum(order_total_price) as expected FROM orders WHERE order_date LIKE '$month'";
	$result3=mysqli_query($sql_connection,$query3);
    while($row=mysqli_fetch_assoc($result3)){
        $expected= $row['expected'];
    }
	$query4="SELECT sum(order_total_price) as revenue FROM orders WHERE order_status='received' AND order_date LIKE '$month'";
	$result4=mysqli_query($sql_connection,$query4);
    while($row=mysqli_fetch_assoc($result4)){
        $revenue= $row['revenue'];
    }







            echo
                "<table style='width:40%'>
					<tr>
						<td>Completed Orders Count: </td><td><h5>$completed</h5></td>
					</tr>
					<tr>
						<td>Canceled Orders Count: </td><td><h5>$canceled</h5></td>
					</tr>
					<tr>
						<td>Revenue Of All Expected Oreders: </td><td><h5>Rs. $expected</h5></td>
					</tr>
					<tr>
						<td>Revenue Of Completed Orders: </td><td><h5 style='color:red;font-weight: bold;'>Rs. $revenue</h5></td>
					</tr>
				</table>";

?>