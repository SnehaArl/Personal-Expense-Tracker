<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
     <!--Left side bar start-->
        <aside id="aside">
            <div class="top">
                <span id="menuopen" class="material-symbols-sharp" >menu_open</span>
                <span id="menutitle"><h2>Menu</h2></span>
                <span id="close" class="material-symbols-sharp" onclick='closeSidebar()'>close</span>
            </div>

            <div class="sidebar">
                <a href="dashboard.php">
                <span class="material-symbols-sharp">dashboard</span>
                <h3>Dashboard</h3>
                 </a>

                <a href="addexpense.php">
                <span class="material-symbols-sharp">add_shopping_cart</span>
                <h3>Add Expenses</h3>
                 </a>

                <a href="addincome.php">
                <span class="material-symbols-sharp">add_card</span>
                <h3>Add income</h3>
                 </a>

                <a href="#">
                <span class="material-symbols-sharp">finance</span>
                <h3>Reports</h3>
                 </a>

                <a>
               <span class="material-symbols-sharp">settings</span> 
               <h3>Setting</h3>
               </a>

                <a href="logout.php">
                <span class="material-symbols-sharp">logout</span>
                <h3>Log Out</h3>
                 </a>

                <a href="#">
                <span class="material-symbols-sharp">contact_support</span>
                <h3>Contact Us</h3>
                 </a>
            </div>
        </aside>
        <!--Left side bar end-->
        <div class="sidebar-overlay"></div>

</body>
</html>