<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
        <h2>Register</h2>
  </div>
        
  <form method="post" action="register.php">
          <label>Username</label><br>
          <input type="text" name="username" value="<?php echo $username; ?>"><br>
          <label>Email</label><br>
          <input type="email" name="email" value="<?php echo $email; ?>"><br>
          <label>Password</label><br>
          <div class="input-group">
          <input type="password" name="password_1"><br>
          </div>
          <div class="input-group">
          <label>Confirm password</label><br>
          <input type="password" name="password_2"><br><br>
          </div>
          <button type="submit" class="btn" name="reg_user">Register</button>
        <p>
                Already a member? <a href="login.php">Sign in</a>
        </p>
        <?php include('errors.php'); ?>
  </form>
</body>
</html>