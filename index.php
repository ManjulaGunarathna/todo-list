<?php
// Include database connection
include('db.php');

// Add task to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];

    if (!empty($task_name)) {
        $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New task added successfully');</script>"; // JavaScript alert
        } else {
            echo "<script>alert('There was an error');</script>" . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch tasks to display
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Task Manager</h1>
    
    <!-- Task Add Form -->
    <form action="index.php" method="POST">
        <input type="text" name="task_name" placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>

    <!-- Display Tasks -->
    <h2>Tasks</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["task_name"] ."-" . $row["created_at"] . " 
                        <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | 
                        <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                      </li>";
            }
        } else {
            echo "<li>No tasks found</li>";
        }
        ?>
    </ul>
</body>
</html>
