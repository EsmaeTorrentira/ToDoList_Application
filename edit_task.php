<?php
require 'db.php';

if (isset($_GET['id'])) {
 $id = $_GET['id'];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$task = $_POST['task'];
$stmt = $pdo->prepare("UPDATE tasks SET task = :task WHERE id = :id");
$stmt->execute(['task' => $task, 'id' => $id]);
header("Location: index.php");
} else {
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch();
}
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
<div class="container">
<h1>Edit Task</h1>
<form action="edit_task.php?id=<?php echo $id; ?>" method="post">
<input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
<button type="submit">Update Task</button>
</form>
</div>
</body>
</html>