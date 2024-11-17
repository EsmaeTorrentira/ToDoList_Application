<?php
// add_task.php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
$task = $_POST['task'];
 $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
$stmt->execute(['task' => $task]);
}

header("Location: index.php");
?>