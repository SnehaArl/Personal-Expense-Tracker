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
   <style>
        #dashboard-main{
            background-color: var(--clr-background);
            grid-area: main;
            display:grid;
            grid-template-columns: repeat(3,1fr);
            grid-template-rows: 0.2fr 1fr 1fr;
            grid-template-areas: 
            "top-bar top-bar top-bar"
            "content1 content2 content3"
            "content4 content4 content4";
            grid-gap:1rem;
            padding:2rem;
        }
        .content1{
            grid-area: content1;
            margin-bottom: 1rem;
            background-color: #d65804ff;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
        }
        .content2{
            grid-area: content2;
            margin-bottom: 1rem;
             background-color: #ffffff;
            border-radius: 20px;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
        }
        .content3{
            grid-area: content3;
            margin-bottom: 1rem;
            background-color: #d65804ff;
            border-radius: 20px;
            border-radius: 20px;
            box-shadow: var(--clr-boxshadow);
        }
        .content4{
            grid-area: content4;
            
        }
   </style>
</head>
<body>
    <div class="container">
    <?php include 'header.php'?>
    <?php include 'sidebar.php'?>

    <main id="dashboard-main">
        <div class="top-bar">
                <span id="menu" class="material-symbols-sharp" onclick='openSidebar()'>menu</span>
        </div>

        <div class="content1" style="color:#ffffff;">Wallet</div>
        <div class="content2" style="color:#000;">Expenses</div>
        <div class="content3" style="color:#ffffff;">Income</div>
        <div class="content4" style="background-color: #000;color:#ffffff;">Image</div>
    </main>
</div>
</body>
</html>