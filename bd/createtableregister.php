<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reactBD";

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