<?php
$servername = "reactiontimeweb.carkfyqrpaoi.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "bTm5^Pq&9xS#R7";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE reactiontimeweb";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>