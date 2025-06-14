<?php
var_dump(67890);die();
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
   
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        echo "Login successful! Welcome, " . htmlspecialchars($user['username']);
    } else {
        echo "Invalid username or password.";
    }
}
?>