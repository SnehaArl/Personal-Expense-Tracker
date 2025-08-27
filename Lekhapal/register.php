<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="introtest.css" />
</head>
<body>
  <div class="container">
      <div class="form-box register">
        <form action="registrationInsert.php" method="post">
          <h1>Registration</h1>

          <div class="input-box">
            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="text" id="username" name="username" placeholder="Username" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="email" id="email" name="email" placeholder="Email" required />
            <i class="bx bxs-envelope"></i>
          </div>

          <div class="input-box">
            <input
              type="password" id="password" name="password" placeholder="Password" required />
             <i class="bx bx-show eye-icon" data-target="password"></i>
          </div>

          <div class="input-box">
            <input
              type="password"
              id="confirmPassword"
              placeholder="Confirm Password"
              required />
           <i class="bx bx-show eye-icon" data-target="confirmPassword"></i>
          </div>

          <div id="error-message" ></div>

          <input type="submit" class="btn" value="Register" /> 
        </form>
      </div>
 <div class="LogoBox">
      <div class="LogoBox-panel">
        <h1>Welcome To Lekhapal!</h1>
        <p>Already have an account?</p>
         <button
          class="btn register-btn"
          onclick="location.href='login.php'">
          login
        </button>
      </div>
      </div>
  </div>
    <script src="UI.js" defer></script>
</body>
</html>