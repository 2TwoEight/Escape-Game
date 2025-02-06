<?php
session_start();
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        $_SESSION['message'] = "Inscription réussie!";
        header("Location: /Escape-Game/index.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Integrity constraint violation
            $_SESSION['error'] = "Le nom d'utilisateur ou l'email existe déjà.";
        } else {
            $_SESSION['error'] = "Une erreur est survenue. Veuillez réessayer.";
        }
        header("Location: /Escape-Game/index.php");
        exit();
    }
}
?>