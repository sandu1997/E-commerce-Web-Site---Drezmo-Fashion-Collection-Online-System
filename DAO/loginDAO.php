<?php

    include ("connection.php");
        $username=$_GET["username"];
        $password=$_GET["password"];
		
        /* $hashed_password = password_hash($password, PASSWORD_DEFAULT); */
   
    include ("connection.php");

	$id="";$usertype="";
	
    $query="SELECT user_id,user_password,user_type FROM user WHERE user_name='$username'";
    $result = mysqli_query($sql_connection,$query);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['user_id'];
			$hashed_password=$row['user_password'];
			$usertype=$row['user_type'];
        }
        
		if($id==""){
			echo "wrong username";
		}elseif(password_verify($password, $hashed_password)){
			session_start();
			$_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
			
			if($usertype=="admin"){
				echo "admin";
			}elseif($usertype=="customer"){
				echo "customer";
			}else{
				echo "staff";
			}
		}else{
			echo "wrong password";
		}
		
		
		
	
    mysqli_close($sql_connection);

?>