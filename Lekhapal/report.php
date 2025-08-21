<?php
    session_start()
?>
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
    <script src="script.js" defer></script>
</head>
<body>
     <div class="container">

        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>
        <?php include 'dbconnection.php'; ?>

        <main>
            <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
            </div>
            <div class="sort">
                <span id="">Filter by:</span>
                     <form method="" action="">
                    <label>Display:</label>
                    <select name="filter" onchange="this.form.submit()">
                        <option value="" selected disabled>--Select--</Option>
                    </select>

                    <span id="">type:</span>
                     <form method="" action="">
                    <label>Display:</label>
                    <select name="filter" onchange="this.form.submit()">
                        <option value="" selected disabled>--Select--</Option>
                    </select>

                    <span id="">Category:</span>
                     <form method="" action="">
                    <label>Display:</label>
                    <select name="filter" onchange="this.form.submit()">
                        <option value="" selected disabled>--Select--</Option>
                    </select>
                </form>
            </div>
        </main>
</body>
</html>