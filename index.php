<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhP</title>
    <link rel="" href="">
    <link rel="stylesheet" href="style/style.css">
    <script src="script.js" defer></script>
</head>
<body>
  <header>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>

<ul>
  <?php
  if (isset($_SESSION['userid'])) {
    echo '<li><a href="includes/logout.inc.php">LOGOUT</a></li>';
  }
  else {
    echo '<li><a href="signup.php">SIGNUP</a></li>';
    echo '<li><a href="login.php">LOGIN</a></li>';
  }
  ?>
 
  <li><a href="#">Sign-up</a></li>
  <li><a href="#">LOGIN</a></li>
</ul>
</div>
</header>
  <div class="container">
    <img src="img/img_snow_wide.jpg" alt="Snow" style="width:100%;">
    
    <div class="centered"><h1>WELCOME!</h1></div>
  </div>
 
</div>


<section class="index-login">
  <div class="wrapper">
    <div class="index-login-signup">
      <h4>SIGN UP</h4>
      <p>Sign up here!</p>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="text" name="email" placeholder="E-mail"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
        <br>
        <button type="submit" name="submit">SIGN UP</button><br>
      </form>
    </div>

    <div class="index-login-login">
      <h4>LOGIN</h4>
      <p>Sign up here!</p>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <br>
        <button type="submit" name="submit">LOGIN</button><br>
      </form>
    </div>
  </div>

</section>

</body>
</html>
