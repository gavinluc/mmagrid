<?php
    
    $servername = "localhost";
    $username="checker";
    $password = "help";
    $dbname = "ufc";
   
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

?>