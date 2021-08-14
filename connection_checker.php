<?php
$servername   = "localhost";
$database = "crm_shamil_40";
$username = "crm_shamil_40";
$password = "R7K9Rf943Tds3";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>