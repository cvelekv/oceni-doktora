<?php
header("Access-Control-Allow-Origin: *");
include("../controllers/searchService.php");

$json = file_get_contents('php://input');

$searchQuery = json_decode($json, true);

$results = searchDoctors($searchQuery);
echo $results;

?>