<?php

    $host = 'localhost'; //ip of db
    $user = 'root'; // user of db
    $password = ''; // password if set on db
    $database = 'od_db'; // name of database 
    $conn = new mysqli($host, $user, $password, $database);// create connection
  
    if (mysqli_connect_errno()) { // if something breaks print the error
        exit('Connect failed: '. mysqli_connect_error());
    }
?>