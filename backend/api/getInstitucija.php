<?php
header("Access-Control-Allow-Origin: *");
include("../controllers/vratiInstitucijeService.php");
$gradID = $_GET["gradid"];
$institucije = getInstitucije($gradID);
echo $institucije;
?>