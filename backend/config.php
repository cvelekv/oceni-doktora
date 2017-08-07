<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
    if (mysqli_connect_errno()) { // if something breaks print the error
        exit('Connect failed: '. mysqli_connect_error());
    }
?>
