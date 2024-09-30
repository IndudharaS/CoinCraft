<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coincraft";  

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    echo "Failed";
}

?>

