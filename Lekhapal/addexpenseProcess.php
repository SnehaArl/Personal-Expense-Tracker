<?php
session_start();
include 'dbconnection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $amount = $_POST['expense_amt'];
    $category = $_POST['exp_category'];
    $desc = $_POST['exp_description'];
    $date = $_POST['date'];

    // to check current balance
    $check_sql = "SELECT cash_in_hand FROM wallet WHERE user_id = '$user_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $current_balance = $row['cash_in_hand'];

        // Check if current balance is sufficient
        if ($current_balance < $amount) {
            echo "Error: Not enough balance in wallet!";
            exit();
        }
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
            exit();
        } else {
            echo "Error updating wallet: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding income: " . mysqli_error($conn);
    }
    header("Location: dashboard.php");
    exit();
}
}
?>