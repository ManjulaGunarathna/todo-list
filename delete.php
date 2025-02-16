<?php
include('db.php');

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the task from the database
    $sql = "DELETE FROM tasks WHERE id = $id"; // Use $id correctly in the query
    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully!";
        header("Location: index.php"); // Redirect to the main page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Task ID is missing.";
}
?>