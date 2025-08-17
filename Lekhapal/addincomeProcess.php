<?php
session_start();
include 'dbconnection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $amount = $_POST['income_amt'];
    $category = $_POST['inc_category'];
    $desc = $_POST['inc_description'];
    $date = $_POST['date'];

    // Insert expense
    $insertsql = "INSERT INTO incomes (user_id, category_id, amount,date, description) 
               VALUES ('$user_id', '$category','$amount',  '$date','$desc')";
    mysqli_query($conn, $insertsql);

    // Update user wallet
    $update = "UPDATE wallet
               SET cash_in_hand = cash_in_hand + $amount 
               WHERE id = '$user_id'";
    mysqli_query($conn, $update);

    header("Location: dashboard.php");
    exit();
}

?>