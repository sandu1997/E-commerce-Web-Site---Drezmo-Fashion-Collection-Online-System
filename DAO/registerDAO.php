<?php

    include ("connection.php");

        $fname=$_GET["fname"];
        $lname=$_GET["lname"];
        $username=$_GET["username"];
        $password=$_GET["password"];
        $nic=$_GET["nic"];
        $no=$_GET["adno"];
        $street=$_GET["adstreet"];
        $town=$_GET["adtown"];
        $tp=$_GET["telephone"];
        $email=$_GET["email"];
		$country=$_GET["country"];
        $type=$_GET["type"];
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query="INSERT INTO user (user_first_name,user_last_name,user_name,user_password,user_nic,user_address_no,user_address_street,user_address_town,user_tp,user_email,user_type,user_country) VALUES('$fname','$lname','$username','$hashed_password','$nic','$no','$street','$town','$tp','$email','$type','$country')";
    $run=mysqli_query($sql_connection,$query);

    if ($run) {
        echo "Register Successful!";
     }else{
         echo "faild";
     }



    mysqli_close($sql_connection);



    
?>