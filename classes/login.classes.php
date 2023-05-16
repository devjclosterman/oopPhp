<?php

class Login extends Dhb {

protected function getUser($uid, $pwd) {
    $stmt = $this->connect()->prepare("SELECT * FROM users WHERE usersUid = ?;");

    if (!$stmt->execute(array($uid, $pwd))) {
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    if ($stmt->rowCount() === 0) {
        $stmt = null;
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);
   
    if ($checkPwd == false) {
        $stmt = null;
        header("location: ../index.php?error=wrongpassword");
        exit();
    } else if ($checkPwd == true) {
       $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_uid = ? AND users_email = ? AND users_pwd = ?;");
   
       if ($stmt->execute(array($uid, $uid, $pwd))) {
        $stmt = null;
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    if ($stmt->rowCount() === 0) {
        $stmt = null;
        header("location: ../index.php?error=usernotfound");
        exit();
    }
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
session_start();
$_SESSION['userid'] = $user[0]['users_id'];
$_SESSION['useruid'] = $user[0]['users_uid'];

    }
     
    $stmt = null;
}
}