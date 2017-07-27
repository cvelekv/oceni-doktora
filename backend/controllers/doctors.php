<?php
include("../config.php"); // get db configuration so we can refference connection

// pravi json
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

$doctor['id'] = $row['id'];
$doctor['ime'] = $row['ime']; //setting properties from object
$doctor['prezime'] = $row['prezime'];
$doctor['slika'] = $row['slika'];
$doctor['prosek'] = getAvOcena($row['id']);
$doctor['institucija'] = getInstitucija($row['institucija_id']);
$doctor['grad'] = getGradImeInst($row['institucija_id']);
array_push($doctors,$doctor); // put doctor in doctors array
}
}
 return json_encode($doctors); // create json from database data
 
}
// racuna prosek ocena
function getAvOcena($doktorID){
	global $conn; 
	global $sum;
	$ocene = array();
	$doktor_id_ocena = $conn->query("SELECT ocena,doktor_id FROM ocena WHERE doktor_id=$doktorID");
	$doktor_id = $conn->query("SELECT id FROM doktor");

	$num_rows = $doktor_id_ocena->num_rows;
	
	$row1 = $doktor_id->fetch_assoc();
	$sum=0;
	if($num_rows > 0)
	{	
    	while($row = $doktor_id_ocena->fetch_array())
    	{ 		
    		$sum+=$row['ocena'];			
		}
	}	
	if($sum != null)
	return number_format($sum/$num_rows, 2, '.', '');
	else
		return $sum;
   
}

//vadi instituciju
function getInstitucija($institucijaID){
	global $conn; 
	
	$institucija_id=$conn->query("SELECT id,ime_institucije FROM institucija");
	$num_rows = $institucija_id->num_rows;

	if($num_rows > 0){
		while($row = $institucija_id->fetch_array()){
			if($row['id'] == $institucijaID){
				return $row['ime_institucije'];
			}
		}
	}
}



// vadi id grada iz tabele institucija
function getGradIDInstitucija($institucijaID){
	global $conn;
	$grad_id_inst = $conn->query("SELECT id,grad_id FROM institucija");

	$num_rows = $grad_id_inst->num_rows;
	
	if ($num_rows>0){
		while($row = $grad_id_inst->fetch_array()){
			if($row['id'] == $institucijaID){
				return $row['grad_id'];
			}
		}
	}
}

//vadi ime grada na osnovu id-ja institucije
function getGradImeInst($IDtest){
	global $conn;
	global $test;

	$grad_id = $conn->query("SELECT id, ime_grada FROM grad");

	$num_rows = $grad_id->num_rows;
	$test = getGradIDInstitucija($IDtest);

	if($num_rows > 0){
		while($row = $grad_id->fetch_array()){
			if($row['id'] == $test){
				return $row['ime_grada'];
			}
		}
	}
}
?>