<?php
include 'db_config.php';

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];

// Hash the password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Insert into the database
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$new_username, $hashed_password]);

// Redirect to the signin page
header("Location: signin.html");
?>
