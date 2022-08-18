<?php
$servername = "remotemysql.com";
$username = "1u1YPbLtRQ";
$password = "K8dRO4ne4D";
$dbname = "1u1YPbLtRQ";
//$Port= 3306
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
