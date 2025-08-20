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
   <!-- <style>
        #dashboard-main {
            background-color: var(--clr-background);
            grid-area: main;
            display: grid;
            grid-template-columns:  repeat(3,1fr);
            grid-template-rows: 0.2fr 1fr 1fr;
            grid-template-areas:
                "top-bar top-bar top-bar"
                "content1 content2 content3"
                "content4 content4 content4";
            grid-gap: 1rem;
            padding: 2rem;
        }

        .content1 {
            grid-area: content1;
            margin-bottom: 1rem;
            background-color: #ffffff;
            color: #d65804ff;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content2 {
            grid-area: content2;
            margin-bottom: 1rem;
            background-color: #ffffff;
            border-radius: 20px;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content3 {
            grid-area: content3;
            margin-bottom: 1rem;
            background-color: #ffffff;
            color: #d65804ff;
            border-radius: 20px;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .content1 h1,
        .content3 h1{
            color: #000;
        }

        .content2 span{
            font-size: 7rem;
            color: #d65804ff;
            padding-top: 3rem;
        }

        .content4 {
            grid-area: content4;
        }
    </style> -->
</head>

<body>
    <div class="container">
        <?php include 'header.php' ?>
        <?php include 'sidebar.php' ?>
        <?php include 'dbconnection.php' ?>

        <main id="dashboard-main">
            <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
              <!--  <span id="filter">
                    <select name="filter" id="filter-select">
                        <option value="today">Today</option>
                </span>-->
            </div>

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
                <span class="material-symbols-rounded">bar_chart_4_bars</span>
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
                <div class="content4" style="background-color: #ffffff;color:#000;">Image
                </div>
        </main>
    </div>
</body>

</html>