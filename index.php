<?php
// index.php
require 'db.php';

// Fetch tasks from the database
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>To-Do List</title>


</head>
<body>
<div class="container">
<h1>To-Do List</h1>
<form action="add_task.php" method="post">
<input type="text" name="task" placeholder="Add a new task..." required>
<button type="submit">Add Task</button>
</form>
<ul class="task-list">
<?php foreach ($tasks as $task): ?>
<li class="task">
<span><?php echo htmlspecialchars($task['task']); ?></span>

</li>
<?php endforeach; ?>
 </ul>
</div>
</body>
</html>

