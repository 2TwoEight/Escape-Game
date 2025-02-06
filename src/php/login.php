<?php
session_start();
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['message'] = "Connexion réussie!";
        header("Location: /Escape-Game/index.php");
        exit();
    } else {
        $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect.";
        header("Location: /Escape-Game/index.php");
        exit();
    }
}
?>