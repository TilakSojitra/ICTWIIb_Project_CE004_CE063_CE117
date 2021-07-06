<?php
// Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "voter";

$connect = mysqli_connect($servername, $username, $password, $database);

if(!$connect){
    die("Sorry We are fail to connect" . mysqli_connect_error());
}
// else{
//     echo "Connection Successfull";
// }
?>