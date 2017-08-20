<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'od_db';
$conn = new mysqli($host, $user, $password, $db);
    if (mysqli_connect_errno()) { // if something breaks print the error
        exit('Connect failed: '. mysqli_connect_error());
    }
?>
