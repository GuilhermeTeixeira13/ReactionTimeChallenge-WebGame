<?php
session_start();
include "db_conn.php";



if(isset($_POST['uname']) && isset($_POST['password'])) {



    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$uname' AND userpassword='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $uname && $row['userpassword'] === $password) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: game.php");
            exit();
        }
        else {
            header("Location: game.php?error=Incorret Username or PasswordCHN");
            exit();
        }
    }else {
        header("Location: game.php?error=Incorret Username or Password");
        exit();
    }
    

} else {
    header("Location: game.php");
    exit();
}


?>