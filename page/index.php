<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">

    <title>Sing up</title>
</head>
<body >
<?php include('./session/register.php') ?>
<form method="POST" action="">
    <div class="loginbox">
       
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Please enter your username" id="username"  required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Please enter your email" id="email"  required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Please enter your password" id="password"  required>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary">
            <input type="hidden" name="action" value="register">
        </div>
        <p>Already have an account? <a href="login.php">Sign in</a></p>
    </div>
</form>
</body>
  </html>