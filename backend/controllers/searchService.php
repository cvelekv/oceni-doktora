<?php
include("../config.php"); // get db configuration so we can refference connection
include("../controllers/doctorsService.php");
// pravi json
function searchDoctors($searchQuery){
global $conn; //connection to database
$doctorName = $searchQuery["searchdoctor"];
//$grad = $searchQuery["grad"];
//$institucija = $searchQuery["institucija"];
$result; 
$result = $conn->query("SELECT * FROM doktor WHERE ime LIKE '%$doctorName%' OR prezime LIKE '%$doctorName%' ");


$num_rows = $result->num_rows;
// echo $num_rows;
$gradovi = array();
if($num_rows > 0){
    while($row = $result->fetch_assoc()) {
    $grad = array();
    $grad = $row;
    $grad['ukupna'] = getAvOcena($row['id']);
    array_push($gradovi,$grad);
    }
}

return json_encode($gradovi);

}
?>

