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

<style>
  * {
box-sizing: border-box;
 margin: 0;
 padding: 0;
 font-family: Arial, sans-serif;
}

body {
 display: flex;
 justify-content: center;
 align-items: center;
min-height: 100vh;
background-color: #ffe4e1;
 color: #333;
}

h1 {
 color: #c71585;
 font-size: 24px;
 text-align: center;
 margin-bottom: 15px;
}

.container {
background-color: #ffb6c1;
 border-radius: 15px;
 box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
 padding: 30px;
 width: 400px;
 max-width: 100%;
text-align: center;
}

form {
 display: flex;
gap: 10px;
 margin-bottom: 20px;
}

input[type="text"] {
width: 70%;
padding: 10px;
border: 1px solid #ff69b4;
border-radius: 5px;
background-color: #fff0f5;
color: #db7093;
font-size: 16px;
}

input[type="text"]:focus {
outline: none;
border-color: #db7093;
background-color: #fdeef4;
}

button {
padding: 10px;
width: 30%;
background-color: #ff69b4;
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
transition: background-color 0.3s ease;
}

button:hover {
background-color: #db7093;
}

.tasks {
margin-top: 20px;
}

.task {
background-color: #fff0f5;
padding: 10px;
border-radius: 5px;
margin-bottom: 10px;
display: flex;
justify-content: space-between;
align-items: center;
}

.task p {
margin: 0;
color: #333;
font-size: 16px;
}

.task-buttons a {
color: #c71585;
text-decoration: none;
font-size: 14px;
transition: color 0.3s ease;
}

.task-buttons a:hover {
color: #ffb6c1;
}

.edit-btn, .delete-btn {
padding: 5px 10px;
font-size: 14px;
border: none;
border-radius: 5px;
color: white;
cursor: pointer;
margin-left: 5px;
transition: background-color 0.3s ease;
}

.edit-btn {
background-color: #ff69b4;
}

.edit-btn:hover {
background-color: #ffb6c1;
}

.delete-btn {
background-color: #db7093;
}

.delete-btn:hover {
background-color: #c71585;
}

</style>
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