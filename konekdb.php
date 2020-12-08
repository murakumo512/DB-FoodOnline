 <?php
$servername = "localhost";  //
//$servername = "2001:470:24:8e4:610b:a93d:7078:3e58";
$username = "root";
$password = "";
$dbname = "ta_c09";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?> 