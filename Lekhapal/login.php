<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>लेखापाल</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="login.css" />
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
            <input type="password" name="psw" placeholder="Password" required />
            <i class="bx bxs-lock"></i>
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

      
  </body>
</html>
