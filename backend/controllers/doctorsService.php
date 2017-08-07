<?php
include("../config.php"); // get db configuration so we can refference connection

// pravi json
function getDoctors(){
global $conn; //connection to database

// $rarray = array();
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
$doctor['ukupna'] = getAvOcena($row['id']);
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

	$doktor_id_ocena = $conn->query("SELECT znanje,dostupnost,komunikacija,profesionalnost,doktor_id FROM ocena WHERE doktor_id=$doktorID");
	$num_rows = $doktor_id_ocena->num_rows;
	$ocena = array();
	$sumzna=0;
	$sumdost=0;
	$sumkom=0;
	$sumprof=0;
	
	if($num_rows > 0)
	{	
    	while($row = $doktor_id_ocena->fetch_array())
    	{ 	
    		$sumzna+=$row['znanje'];
			$sumdost+=$row['dostupnost'];
			$sumkom+=$row['komunikacija'];
			$sumprof+=$row['profesionalnost'];		
		}
	}	

	$ocena['znanje']=$sumzna;
	$ocena['dostupnost']=$sumdost;
	$ocena['komunikacija']=$sumkom;
	$ocena['profesionalnost']=$sumprof;
	$ocena['ukupna']=0;
	
	if($ocena != null && $num_rows != null) {
	$ocena['znanje']=number_format($sumzna/$num_rows, 2, '.', '');
	$ocena['dostupnost']=number_format($sumdost/$num_rows, 2, '.', '');
	$ocena['komunikacija']=number_format($sumkom/$num_rows, 2, '.', '');
	$ocena['profesionalnost']=number_format($sumprof/$num_rows, 2, '.', '');
	$ocena['ukupna']=number_format(($ocena['znanje']+$ocena['dostupnost']+$ocena['komunikacija']+$ocena['profesionalnost'])/4, 2, '.', '');
	return $ocena;
	}
	else {
    return $ocena;
	}
}



//vadi instituciju
function getInstitucija($institucijaID){
	global $conn; 
	
	$institucija_id=$conn->query("SELECT id,ime_institucije FROM institucija where id=$institucijaID");
	$num_rows = $institucija_id->num_rows;

	if($num_rows > 0){
		while($row = $institucija_id->fetch_array()){

				return $row['ime_institucije'];
			
		}
	}
}



// vadi id grada iz tabele institucija
function getGradIDInstitucija($institucijaID){
	global $conn;
	$grad_id_inst = $conn->query("SELECT id,grad_id FROM institucija where id=$institucijaID");

	$num_rows = $grad_id_inst->num_rows;
	
	if ($num_rows>0){
		while($row = $grad_id_inst->fetch_array()){
			
				return $row['grad_id'];
			
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