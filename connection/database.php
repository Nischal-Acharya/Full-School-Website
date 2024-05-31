<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'technicalpashupati'; 

$connection = mysqli_connect($server, $username, $password, $database);
$connectionobj = new mysqli($server, $username, $password, $database);
?>