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

        <!--main start-->
        <main>
            <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
            </div>
            <div class="form-container">
            <div class="addincome">
                <div class="income-title">Add Income</div>
                <form action="" method="post">
                    <div class="form-group">
                    <label>Amount</label>
                    <input type="text" id="income_amt" name="income_amt" required>
                    </div>

                    <div class="form-group">
                    <label>Category</label>
                    <select name="income" id="income" required>
                        <option value="">--Select--</Option>
                        <option value="">Salary</option>
                        <option value="">Bonus</option>
                        <option value="">Other</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Description</label>
                    <textarea id="income_desc" name="income_desc" rows="4" cols="12" required></textarea>
                    </div>

                    <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="date" name="date" required>
                    </div>
  
                    <button type="submit" id="addinc-btn">Add Income</button>
                </form>
            </div>
            </div>
        </main>
        <!--main end-->
    </div>
</body>
</html>