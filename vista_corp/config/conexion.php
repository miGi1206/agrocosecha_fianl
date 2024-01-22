<?php 
// variables de coneccion 
$servername = "localhost";
$username= "root";
$password= "";
$dbname = "bd_agrocosecha";

// crear la conexion 

$conn = mysqli_connect($servername,$username,$password,$dbname);

// check de la conexion 

if(!$conn){
    die("connection failed:".mysqli_connecti_error());
}