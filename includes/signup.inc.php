<?php

if (isset($_POST['submit'])) {
//grabbing the data 
  $uid = $_POST['uid'];  
  $uid = $_POST['pwd'];
  $uid = $_POST['pwdrepeat'];
  $uid = $_POST['email'];

// Instantiate SignupContr class
  include "../classes/dbh.classes.php";
  include "../classes/signup.classes.php";
  include "../classes/signup-contr.classes.php";
  $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

  //running error handlers and sign up user
$signup->signUpUser();


//Going back to front page
header("location: ../index.php?error=none");
}