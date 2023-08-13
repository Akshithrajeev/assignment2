<?php
include 'db_config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Check if the user exists and the password matches
$stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
$stmt->execute([$username]);

if ($user = $stmt->fetch()) {
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['loggedin'] = true;
        header("Location: success.html");
    } else {
        // Incorrect password
        header("Location: signin.html?error=invalid");
    }
} else {
    // User doesn't exist
    header("Location: signin.html?error=invalid");
}
?>
