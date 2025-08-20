<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <div class="container">
        <?php include 'header.php' ?>
        <?php include 'sidebar.php' ?>
        <?php include 'dbconnection.php' ?>

        <main id="dashboard-main">
            <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>

                <form method="get" action="">
                    <label>Display:</label>
                    <select name="filter" onchange="this.form.submit()">
                        <option value="today" <?php if (!isset($_GET['filter']) || $_GET['filter'] == 'today') echo 'selected'; ?>>Today</option>
                        <option value="month" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'month') echo 'selected'; ?>>This Month</option>
                        <option value="week" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'week') echo 'selected'; ?>>This Week</option>
                    </select>
                </form>
            </div>

            <?php
            $filter = $_GET['filter'] ?? 'current'; //if exists uses its value else default: current

            $condition = "";
            if ($filter == "today") {
                $condition = "AND DATE(date) = CURDATE()";
            }
            if ($filter == "week") {
                $condition = "AND YEARWEEK(date) = YEARWEEK(CURDATE())";
            } elseif ($filter == "month") {
                $condition = "AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())";
            }
            ?>


            <div class="content1">
                <h2>Wallet</h2>
                <div id="wallet-content">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT cash_in_hand FROM wallet WHERE user_id='$user_id'";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<h1> {$row['cash_in_hand']}</h1>";
                        }
                    } else {
                        echo "<p>No wallet data found</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="content2" style="color: #d65804ff;">
                <h2>Income</h2>
            </div>
            <div class="content3">
                <h2>Expense Added</h2>
                <div id="expense-content">
                    <?php
                    if (isset($_SESSION['just_logged_in']) && $_SESSION['just_logged_in'] === true) {
                        echo "<h1>0.00</h1>";
                        $_SESSION['just_logged_in'] = false; // reset flag
                    } else {
                        // Otherwise, show the most recent expense (after form submission)
                        $sql = "SELECT amount FROM expenses WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<h1>{$row['amount']}</h1>";
                        } else {
                            echo "<h1>0.00</h1>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="content4" style="background-color: #ffffff;color:#000;">Wallet
            </div>

            <div class="content5" style="background-color: #ffffff;color:#000;">Image
            </div>
        </main>
    </div>
</body>

</html>