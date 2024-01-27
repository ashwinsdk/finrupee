<?php
require "func.php";

$server="localhost";
$user="root";
$password="";
$db="pec";

$conn= mysqli_connect($server,$user,$password,$db);

if (!$conn){
   die("connection failed:". mysqli_connect_error()); 
}

?>