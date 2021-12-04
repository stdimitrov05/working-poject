<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <title>Home</title>
</head>
<head>

    <p class="name">Hi <?php
    include './session/auth_session.php';
    echo $_SESSION['username'], '!  ';
    ?>Welcome back!<span  style="font-size:30px;cursor:pointer;color:#ff0209;float: right;" onclick="openNav()">&#9776; </span></p>
  
    <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a href="./home.php">Home</a>
    <a href="#">About</a>
    <a href="./contact/index.php">Commentars</a>
    <a href="#">Contact</a>
  </div>
</div>

</head>
<body>

</body>
<script src="./javascript/nav.js"></script>
</html>