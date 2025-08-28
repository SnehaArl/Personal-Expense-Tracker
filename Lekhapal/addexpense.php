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

        <!--main start-->
        <main id="main">
            <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
            </div>
            <div class="form-container">
                <div class="addexpense">
                    <div class="expense-title">Add Expenses</div>
                    <form id="addExpenseForm" action="addexpenseProcess.php" method="post">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" id="expense_amt" name="expense_amt">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="exp_category" id="exp_category" required>
                                <option value="">--Select--</Option>
                                <?php
                                $sql = "SELECT * FROM expense_categories";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="exp_description" name="exp_description" rows="4" cols="12" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" id="date" name="date">
                        </div>

                        <button type="submit" id="addexp-btn" name="submit">Add Expenses</button>
                    </form>
                </div>
            </div>
        </main>
        <!--main end-->
    </div>

    <script>
       /* document.addEventListener("DOMContentLoaded", function() {
            //  Prevent past dates
            let today = new Date().toISOString().split("T")[0];
            document.getElementById("date").setAttribute("min", today);
        });*/

        document.getElementById("addExpenseForm").addEventListener("submit", function(e) {
            let isValid = true;
            let errors = [];

            // Amount check
            let amount = document.getElementById("expense_amt").value.trim();
            if (amount === "" || !/^[0-9]+(\.[0-9]{1,2})?$/.test(amount)) {
                isValid = false;
                errors.push("Enter a valid income amount (numbers only, max 2 decimals).");
            }

            // Description check
            let description = document.getElementById("exp_description").value.trim();
            if (description === "") {
                isValid = false;
                errors.push("Income description cannot be empty.");
            }

            if (!isValid) {
                e.preventDefault();
                alert(errors.join("\n"));
            }
        });
    </script>

</body>

</html>