<?php
$servername = "localhost";   // Your database server (typically 'localhost')
$username = "root";          // Your database username (default 'root' for XAMPP)
$password = "";              // Your database password (default is empty for XAMPP)
$dbname = "todo_app";        // The name of the database you want to connect to

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If there is an error with the connection, display it
    die("Connection failed: " . $conn->connect_error);
}else{
// If connection is successful
//echo "Connected successfully to the database!";
}
?>