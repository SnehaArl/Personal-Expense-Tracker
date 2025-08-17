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
    if(mysqli_query($conn, $insertsql)) {
        // Update wallet if insert was successful
        $update_sql = "UPDATE wallet 
                      SET cash_in_hand = cash_in_hand + $amount 
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