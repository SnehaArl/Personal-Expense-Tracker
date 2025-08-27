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

        <main id="dashboard-main">
            <div class="top-bar">
                <!--<span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
                <div class="sort">-->

                <?php
                $user_id = $_SESSION['user_id'];
                $filter   = $_GET['filter'] ?? 'all';
                $type     = $_GET['type'] ?? '';
                $category = $_GET['category'] ?? '';
                ?>

                <form method="get" action="">

                    <label>Filter By:</label>
                    <select name="filter" onchange="this.form.submit()">
                        <option value="" disabled <?php if (!isset($_GET['filter'])) echo 'selected'; ?>>--Select--</option>
                        <option value="1month" <?php if (isset($_GET['filter']) && $_GET['filter'] == '1month') echo 'selected'; ?>>This Month</option>
                        <option value="6months" <?php if (isset($_GET['filter']) && $_GET['filter'] == '6months') echo 'selected'; ?>>Last 6 Months</option>
                        <option value="year" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'year') echo 'selected'; ?>>This Year</option>
                        <option value="all" <?php if (isset($_GET['filter']) && $_GET['filter'] == 'all') echo 'selected'; ?>>All</option>
                    </select>

                    <!-- Type Filter -->
                    <label>Type:</label>
                    <select name="type" onchange="this.form.submit()">
                        <option value="" disabled <?php if (!isset($_GET['type'])) echo 'selected'; ?>>--Select--</option>
                        <option value="expense" <?php if (isset($_GET['type']) && $_GET['type'] == 'expense') echo 'selected'; ?>>Expense</option>
                        <option value="income" <?php if (isset($_GET['type']) && $_GET['type'] == 'income') echo 'selected'; ?>>Income</option>
                    </select>

                    <!-- Category Filter -->
                    <label>Category:</label>
                    <select name="category" onchange="this.form.submit()">
                        <option value="" <?php if (!isset($_GET['category']) || $_GET['category'] == "") echo 'selected'; ?>>--Select--</option>
                        <?php
                        if (isset($_GET['type'])) {
                            if ($_GET['type'] == 'expense') {
                                $sql = "SELECT * FROM expense_categories";
                            } elseif ($_GET['type'] == 'income') {
                                $sql = "SELECT * FROM income_categories";
                            }

                            if (isset($sql)) {
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = (isset($_GET['category']) && $_GET['category'] == $row['id']) ? 'selected' : '';
                                    echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </form>

                <?php
                if (!empty($type)) {
                    if ($type == 'expense') {
                        $table = "expenses";
                        $c_col = "categories_id";
                        $c_table = "expense_categories";
                    } else {
                        $table = "incomes";
                        $c_col = "category_id";
                        $c_table = "income_categories";
                    }

                    $sql = "SELECT t.*, c.name AS category_name 
            FROM $table t 
            JOIN $c_table c ON t.$c_col = c.id 
            WHERE t.user_id = $user_id";

                    // Category filter
                    if ($category != '') {
                        $sql .= " AND t.$c_col = '$category'";
                    }
                    switch ($filter) {
                        case 'today':
                            $sql .= " AND DATE(t.date) = CURDATE()";
                            break;
                        case 'week':
                            $sql .= " AND YEARWEEK(t.date, 1) = YEARWEEK(CURDATE(), 1)";
                            break;
                        case 'month':
                            $sql .= " AND MONTH(t.date) = MONTH(CURDATE()) 
                      AND YEAR(t.date) = YEAR(CURDATE())";
                            break;
                        case '6months':
                            $sql .= " AND t.date >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
                            break;
                        case 'year':
                            $sql .= " AND YEAR(t.date) = YEAR(CURDATE())";
                            break;
                        case 'all':
                        default:
                            // No date filter
                            break;
                    }
                    $sql .= " ORDER BY t.date DESC";

                    $result = mysqli_query($conn, $sql);

                    // 5. Show results in table
                    if (mysqli_num_rows($result) > 0) {
                        echo "<h3>Report ($type)</h3>";
                        echo "<table border='1' cellpadding='5'>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Category</th>
                </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                    <td>{$row['date']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['category_name']}</td>
                  </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No records found.</p>";
                    }
                }
                ?>
            </div>

        </main>
    </div>
</body>

</html>