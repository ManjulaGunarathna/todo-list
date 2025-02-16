<?php
include('db.php');

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the task from the database
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();

    // Update task if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task_name = $_POST['task_name'];

        if (!empty($task_name)) {
            $sql = "UPDATE tasks SET task_name = '$task_name' WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "Task updated successfully!";
                header("Location: index.php"); // Redirect to the main page
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
} else {
    echo "Task ID is missing.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <!-- Edit Task Form -->
    <form action="edit.php?id=<?php echo $task['id']; ?>" method="POST">
        <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>
        <button type="submit">Update Task</button>
    </form>

    <a href="index.php">Go Back</a>
</body>
</html>
