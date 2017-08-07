<?php
header("Access-Control-Allow-Origin: *");
include("../controllers/vratiInstitucijeService.php");
$institucije = getInstitucije();
echo $institucije;
?>