<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
            <i class="bx bxs-lock"></i>
          </div>

          <div class="input-box">
            <input
              type="password"
              id="confirmPassword"
              placeholder="Confirm Password"
              required />
            <i class="bx bxs-lock"></i>
          </div>

          <div id="error-message" style="color: red; margin-bottom: 10px"></div>

          <input type="submit" class="btn" value="Register" /> 
        </form>
      </div>

</body>
</html>