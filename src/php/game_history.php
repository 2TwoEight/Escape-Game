<?php
session_start();
include("../config/database.php");

$user_id = $_SESSION['user_id'];

// Récupère l'historique des parties depuis la base de données
$stmt = $pdo->prepare("SELECT scenario_id, score, time_taken, mistakes, completed_at FROM game_history WHERE user_id = :user_id ORDER BY completed_at DESC");
$stmt->execute(['user_id' => $user_id]);
$history = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des parties</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../../index.php">Escape Game</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="src/php/logout.php">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Inscription</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="leaderboard.php">Classement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="game_history.php">Historique des parties</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <h1>Historique des parties</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Scénario</th>
                    <th>Score</th>
                    <th>Temps pris (s)</th>
                    <th>Fautes</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $game): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($game['scenario_id']); ?></td>
                        <td><?php echo htmlspecialchars($game['score']); ?></td>
                        <td><?php echo htmlspecialchars($game['time_taken']); ?></td>
                        <td><?php echo htmlspecialchars($game['mistakes']); ?></td>
                        <td><?php echo htmlspecialchars($game['completed_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>