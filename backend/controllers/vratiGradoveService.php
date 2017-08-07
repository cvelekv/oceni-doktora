<?php
include("../config.php");
function getGradovi(){
    global $conn;

    $result = $conn->query("SELECT id,ime_grada from grad");
    $num_rows = $result->num_rows;
    $gradovi = array(); 
    if($num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $grad = array();

        $grad['ime_grada'] = $row['ime_grada'];
        $grad['id'] = $row['id'];
        array_push($gradovi,$grad);
        }
    }
   
    return json_encode($gradovi);
}
?>