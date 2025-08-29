<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>लेखापाल</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body, html {
  height: 100%;
  background: #fff;
}

.intro-wrapper {
  display: flex;
  height: 100vh;
  width: 100vw;
}


.left-panel {
  background: #4CA771;
  color: #fff;
  width: 40%;
  height: 100vh;
  clip-path: polygon(
    0 0,            /* top-left */
    100% 0,         /* top-right */
    100% 40%,       /* right-top before point */
    120% 50%,       /* outward point */
    100% 60%,       /* right-bottom after point */
    100% 100%,      /* bottom-right */
    0 100%          /* bottom-left */
  );
  display: flex;
  justify-content: center;
  align-items: center;
}



.left-panel h1 {
  font-size: 36px;
  font-weight: bold;
}


.main-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.headline {
  font-size: 32px;
  margin-bottom: 30px;
}

.headline .black {
  color: #000;
}

.headline .green {
  color: #4CA771;
  font-weight: 600;
}

.button-group {
  display: flex;
  gap: 20px;
}

.btn {
  padding: 12px 28px;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

.login-btn {
  background-color: #4CA771;
  color: #fff;
}

.register-btn {
  background-color: #000000;
  color: #ffff;
}

.btn:hover {
  opacity: 0.9;
}

  </style>
</head>
<body class="intro-page">
  <div class="intro-wrapper">
    <div class="left-panel">
      <h1>Lekhapal</h1>
    </div>

    <div class="main-content">
      <h2 class="headline">
        <span class="black">Your </span>
        <span class="green">Finance </span>
        <span class="black">Keeper</span>
      </h2>

      <div class="button-group">
        <button class="btn login-btn" onclick="location.href='login.php'">Login</button>
        <button class="btn register-btn" onclick="location.href='register.php'">Register</button>
      </div>
    </div>
  </div>
</body>
</html>