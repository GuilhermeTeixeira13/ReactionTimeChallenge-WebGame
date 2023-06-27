<?php
$servername = "reactiontimeweb.carkfyqrpaoi.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "bTm5^Pq&9xS#R7";
$dbname = "reactiontimeweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table

$sql = "CREATE TABLE users (
    Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(256) NOT NULL,
    Userpassword text NOT NULL,
    Localidade text NOT NULL,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>