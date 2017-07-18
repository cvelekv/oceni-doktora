<?php
include("../config.php"); // get db configuration so we can refference connection

function getDoctors(){
global $conn; //connection to database
$rarray = array();
$result = $conn->query("SELECT * from doktor");//execute query
$num_rows = $result->num_rows;
$doctors = array(); 
if($num_rows > 0) //if we have result
{
while($row = $result->fetch_assoc()) {// create associative array from result
$doctor = array(); //object can be associative array
$doctor['ime'] = $row['ime']; //setting properties from object
$doctor['prezime'] = $row['prezime'];
$doctor['slika'] = $row['slika'];
array_push($doctors,$doctor); // put doctor in doctors array
}
}
return json_encode($doctors); // create json from database data
}
?>