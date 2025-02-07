<?php
session_start();
include("../config/database.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $_SESSION['user_id'];
    $scenario_id = $data['scenario_id'];
    $score = $data['score'];
    $time_taken = $data['time_taken'];
    $mistakes = $data['mistakes'];

    try {
        // Enregistrer le score dans la table scores
        $stmt = $pdo->prepare("INSERT INTO scores (user_id, scenario_id, score, time_taken, mistakes) VALUES (:user_id, :scenario_id, :score, :time_taken, :mistakes)");
        $stmt->execute([
            'user_id' => $user_id,
            'scenario_id' => $scenario_id,
            'score' => $score,
            'time_taken' => $time_taken,
            'mistakes' => $mistakes
        ]);

        // Enregistrer les informations de la partie dans la table game_history
        $stmt = $pdo->prepare("INSERT INTO game_history (user_id, scenario_id, score, time_taken, mistakes) VALUES (:user_id, :scenario_id, :score, :time_taken, :mistakes)");
        $stmt->execute([
            'user_id' => $user_id,
            'scenario_id' => $scenario_id,
            'score' => $score,
            'time_taken' => $time_taken,
            'mistakes' => $mistakes
        ]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>