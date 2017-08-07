<?php
header("Access-Control-Allow-Origin: *"); //This allows you to send request to same machine (from origin to origin)
include("../controllers/vratiGradoveService.php"); // include controller doctors, here we put doctor actions
$gradovi = getGradovi(); 
echo $gradovi; 
?>