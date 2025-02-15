<?php
include('db.php'); // Connect to database

// Get tasks from the database
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result =$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>My To-Do List</h1>

    <!-- Task form -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task_name" placeholder="Enter a new task" required>
        <button type="submit">Add Task</button>
    </form>
<!– Task list –>
    <ul>
        <?php while($row = $result->fetch_assoc())  ?>
            <li>
                <?php $echorow['task_name']; ?> 
                - <?php echo ucfirst($row['status']); ?> 
                <a href="delete_task.php?id=<?php $echorow['id']; ?>">Delete</a>
                <a href="update_task.php?id=<?php echo $row['id']; ?>">Mark as Done</a>
            </li>
        <?php  ?>
    </ul>

</body>
</html>