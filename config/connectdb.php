
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timky_db";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
//echo "Connected to MySQL";

?>
