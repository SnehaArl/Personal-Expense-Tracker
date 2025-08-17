<?php
session_start();
include 'dbconnection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $amount = $_POST['expense_amt'];
    $category = $_POST['exp_category'];
    $desc = $_POST['exp_description'];
    $date = $_POST['date'];

    // Insert expense
    $insertsql = "INSERT INTO expenses (user_id, category_id, amount,date, description) 
               VALUES ('$user_id', '$category','$amount',  '$date','$desc')";

    // Update user wallet
    if(mysqli_query($conn, $insertsql)) {
        // Update wallet if insert was successful
        $update_sql = "UPDATE wallet 
                      SET cash_in_hand = cash_in_hand - $amount 
                      WHERE user_id = '$user_id'";
        
        if(mysqli_query($conn, $update_sql)) {
            header("Location: dashboard.php");
        } else {
            echo "Error updating wallet: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding income: " . mysqli_error($conn);
    }
    header("Location: dashboard.php");
}

?>