<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "reactBD";


mysql_connect($host, $user, $password);
mysql_select_db($db);


if(isset($_POST['username'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "select * from users where username = '".$uname."'AND Pass ='".$password."' limit 1";

    $result = mysql_query($sql);

    if(mysql_num_rows($result) == 1) {
        echo "You have Sucessfully Logged in";
        exit();
    }
    else {
        echo "You have Entered Incorrect Password";
        exit();
    }
}
?>