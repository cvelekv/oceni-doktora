<?php
include("../controllers/doctors.php"); // include controller doctors, here we put doctor actions
$doktori = getDoctors(); // function that returns all doctors
echo $doktori; // echo doctors to the user
?>