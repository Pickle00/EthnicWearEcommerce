<?php
//<!--========== PHP CONNECTION TO DATABASE ==========-->
    $host = "localhost";
    $username = "root";
    $pass = "";

    $dbname = "ethnic_wear";
    //create connection
    $conn = mysqli_connect($host, $username, $pass, $dbname);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>