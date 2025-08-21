<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $uname = $_POST['username'];
    $mail = $_POST['email'];
    $pass =$_POST['password'];
}

 $sql="INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUES ('$name','$uname','$mail','$pass')";

 //i.e.if true
if (mysqli_query($conn, $sql)) {
    //getting the last inserted auto-incremented id back for wallet table
    $user_id = mysqli_insert_id($conn);

    $walletsql = "INSERT INTO wallet (user_id, cash_in_hand) VALUES ('$user_id', 0)";
    mysqli_query($conn, $walletsql);
    header("Location:login.php");
    exit();
}
 else {
    echo "<p style='color:red'>Error: " . mysqli_error($conn) . "</p>";
}
?>