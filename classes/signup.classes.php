<?php

class Signup extends Dbh {

    protected function setUser($uid,  $password, $pwd, $email) {
        $sql = "INSERT INTO users (usersUid, usersPwd, usersEmail) VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      
        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
           $stmt = null;
           header("location: ../index.php?error=stmtfailed");
           exit();
       }
         $stmt = null;
    }
    protected function checkUser($uid, $email) {
        $sql = "SELECT users_uid FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = $this->connect()->prepare($sql);
      
        if (!$stmt->execute(array($uid, $email))) {
           $stmt = null;
           header("location: ../index.php?error=stmtfailed");
           exit();
       }
         $resultCheck = null;
       if ($stmt->rowCount() > 0) {
           $resultCheck = false;
       } else {
           $resultCheck = true;
       }
       return $resultCheck;
    }
}