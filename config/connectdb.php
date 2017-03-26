
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "timky_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("C'est tout cassé :( " . $conn->connect_error);
}
?>
