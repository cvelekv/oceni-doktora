<?php
include("../config.php");
function getInstitucije($gradID){
    global $conn;
    
    $result = $conn->query("SELECT * from institucija WHERE grad_id=$gradID");
    $num_rows = $result->num_rows;

    $institucije = array();
    if($num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $institucija = array();
            $institucija['id'] = $row['id'];
            $institucija['ime_institucije'] = $row['ime_institucije'];
            array_push($institucije,$institucija);
        }

    }
    return json_encode($institucije);
}