<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
        <h2>Login</h2>
  </div>
         
  <form method="post" action="login.php">
        <label>Username</label><br>
        <input type="text" name="username" ><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit" class="btn" name="login_user">Login</button>
        <p>
                Not yet a member? <a href="register.php">Sign up</a>
        </p>
        <?php include('errors.php'); ?>
  </form>
</body>
</html>