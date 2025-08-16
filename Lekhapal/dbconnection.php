<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lekhapal";

//creating connection
$conn = new mysqli($servername, $username, $password, $database);
if(!$conn){
    die("sorry failed to connect:".mysqli_connect_error());
}

?>