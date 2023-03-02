<?php
	
        $dbhost="localhost";
        $dbuser="root";
        $dbpassword="";
        $dbname="drezmo";

        
           
            $sql_connection=mysqli_connect($dbhost,$dbuser,$dbpassword);
	        $db_connection=mysqli_select_db($sql_connection,$dbname);
        
    


?>