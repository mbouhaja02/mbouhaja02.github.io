<?php
$servername = "sql11.freemysqlhosting.net";
$username = "sql11667951"; // default username for localhost
$password = "a24zS7vPKb"; // default password for localhost is usually empty
$dbname = "sql11667951"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
