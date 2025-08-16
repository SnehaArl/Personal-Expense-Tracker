<?php
session_start();
include("dbconnection.php");
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!--header start-->
        <header>
            <div class="lekhapal"><h1>Lekhapal</h1></div>

            <div class="profile">
                <span><?php echo $_SESSION['username']; ?></span>
                <span class="material-symbols-sharp">account_circle</span>
            </div>
        </header>
        <!--header end-->
</body>
</html>

