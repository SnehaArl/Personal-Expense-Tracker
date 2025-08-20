<?php
session_start();
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $initial_budget = $_POST['initialBudget'];
    $user_id = $_SESSION['user_id'];

    // check if user already have a wallet
    $check = "SELECT * FROM wallet WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        // Wallet exists → update
        $sql = "UPDATE wallet SET cash_in_hand = $initial_budget WHERE user_id = '$user_id'";
    } else {
        // Wallet doesn’t exist → insert
        $sql = "INSERT INTO wallet (user_id, cash_in_hand) VALUES ('$user_id', $initial_budget)";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

