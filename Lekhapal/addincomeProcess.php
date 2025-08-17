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
    $insert = "INSERT INTO income (user_id, amount, category, description, date) 
               VALUES ('$user_id', '$amount', '$category', '$desc', '$date')";
    mysqli_query($conn, $insert);

    // Update user wallet and total_expenses
    $update = "UPDATE users 
               SET wallet = wallet - $amount, total_expenses = total_expenses + $amount 
               WHERE id = '$user_id'";
    mysqli_query($conn, $update);

    // Redirect back to dashboard
    header("Location: dashboard.php");
    exit();
}

?>