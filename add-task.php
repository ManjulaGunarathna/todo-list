<?php
include('db.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_name'])) {
    $task_name = $_POST['task_name'];

    // Insert the new task into the database
    $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect to the main page
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Error: " . $conn->error; // Display error message if query fails
    }
}
?>
