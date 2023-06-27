<?php
    session_start();
    $cit = $_COOKIE["cid"];
    include "db_conn.php";

    if(isset($_POST['username']) && isset($_POST['psw']) && isset($_POST['psw-repeat'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['username']);
        $pass = validate($_POST['psw']);
        $re_pass = validate($_POST['psw-repeat']);

        $user_data = 'uname='. $uname;
        
        if(empty($uname)) {
            header("Location: sign.php?error=Username is required");
            exit();
        }else if(empty($pass)) {
            header("Location: sign.php?error=Password is required");
            exit();
        }else if(empty($re_pass)) {
            header("Location: sign.php?error=Password is required");
            exit();
        }else if($pass !== $re_pass) {
            header("Location: sign.php?error=The confirmation password does not match&$user_data");
            exit();
        }

        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE Username='$uname'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            header("Location: sign.php?error=The username already exists&$user_data");
            exit();
        }else {
            $sql2 = "INSERT INTO users(Username, Userpassword, Localidade) VALUES ('$uname', 
            '$pass', '$cit')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2) {
                $_SESSION['Username'] = $uname;
                header("Location: home.php");
                exit();
            }else {
                header("Location: sign.php?error=unknown error occured&$user_data");
                exit();
            }
        }

    } else {
        header("Location: sign.php");
        exit();
    }
?>