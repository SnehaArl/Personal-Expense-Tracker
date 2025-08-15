<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $uname = $_POST['username'];
    $mail = $_POST['email'];
    $pass =$_POST['password'];
}

 $sql="INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUES ('$name','$uname','$mail','$pass')";
 
if (mysqli_query($conn, $sql)) {
     header("Location:login.php");
}
 else {
    echo "<p style='color:red'>Error: " . mysqli_error($conn) . "</p>";
}
?>