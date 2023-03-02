<?php
	
        $dbhost="drezmo.dazkon.com";
        $dbuser="dazkonco_drezmo";
        $dbpassword="Sgqr4YCWWHQr";
        $dbname="dazkonco_drezmodb";

        
           
            $sql_connection=mysqli_connect($dbhost,$dbuser,$dbpassword);
	        $db_connection=mysqli_select_db($sql_connection,$dbname);
        
    if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
    }
   // echo "Connected successfully";


?>