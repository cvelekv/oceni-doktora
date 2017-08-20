<?php
include("../config.php"); // get db configuration so we can refference connection
include("../controllers/doctorsService.php");
include("../controllers/vratiGradoveService.php");
include("../controllers/vratiInstitucijeService.php");


// pravi json
function searchDoctors($searchQuery){
global $conn; //connection to database
$doctorName = $searchQuery["searchdoctor"];
$gradID = $searchQuery["gradID"];
$institucijaID = $searchQuery["instID"];
$institucijaResult = $conn->query("SELECT id FROM institucija WHERE grad_id=$gradID"); //Daj sve institucije za grad id
$num_rows = $institucijaResult->num_rows;
$arrayOfDoctors = array();

if($num_rows>0) {

while($row1 = $institucijaResult->fetch_assoc()){ //za svaki red u bazi uradi... 

    $id = $row1["id"]; //izvuci id iz konkretnog reda
    $doktoriResult = $conn->query("SELECT * FROM doktor WHERE (ime LIKE '%$doctorName%' OR prezime LIKE '%$doctorName%') AND institucija_id = $id"); //pokupi sve doktore za instituciju pod id-em
    if($id == $institucijaID){
    if($doktoriResult->num_rows > 0){
        while($rowDoc = $doktoriResult->fetch_assoc()){ //Dok ima redova u bazi
            $doktor = $rowDoc; // napravi objekat doktor
            $doktor["ukupna"] = getAvOcena($doktor["id"]); // Setuj mu property ocena iz servisa za doktore        
            array_push($arrayOfDoctors, $doktor); //dodaj u niz doktora
     }}
    }
    
}   
return json_encode($arrayOfDoctors);
}
}
?>

