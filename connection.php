<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '1234';  
    $db_name = "fs_db";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  