<?php
$sname = "reactiontimeweb.carkfyqrpaoi.eu-north-1.rds.amazonaws.com";
$unmae = "admin";
$password = "bTm5^Pq&9xS#R7";

$db_name = "reactiontimeweb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if(!$conn) {
    echo "Connection Failed!";
}