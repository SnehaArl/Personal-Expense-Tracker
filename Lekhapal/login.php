<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>लेखापाल</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="introtest.css" />
  </head>

  <body>
    <div class="container">
      <div class="form-box login">
        <form action="checklogin.php" method="post">
          <h1>Login</h1>
          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required />
            <i class="bx bxs-user"></i>
          </div>
          <div class="input-box">
            <input type="password" id= "loginpassword" name="psw" placeholder="Password" required /> <!--added id="loginpassword"-->
            <i class="bx bx-show eye-icon" data-target="loginpassword"></i> <!--changed lockicon to eye-->
          </div>
          <div class="forgot-link">
            <a href="#">Forget Password?</a>
          </div>
          <input type="submit" class="btn" value="Login" name="login" />
          <div class="register-link">
            <p>Don't have an account? <a href="#">Register</a></p>
          </div>
        </form>
      </div>

      <div class="LogoBox">
        <div class="LogoBox-panel">
          <h1>Welcome To Lekhapal!</h1>
          <p>Dont have an account?</p>
          <button
            class="btn register-btn"
            onclick="location.href='register.php'">
            Register
          </button>
        </div>
      </div>
</div>
      
  </body>
</html>
