
<?php
$servername = "sql11.freemysqlhosting.net";
$username = "sql11165670";
$password = "l6u8JgWnQi";
$dbname = "sql11165670";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected to MySQL";
?>
