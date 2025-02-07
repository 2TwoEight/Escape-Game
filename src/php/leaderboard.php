<?php
session_start();
include("../config/database.php");

// Récupère les meilleurs scores pour chaque utilisateur et chaque scénario
$stmt = $pdo->prepare("
    SELECT users.username, scores.scenario_id, MAX(scores.score) AS score, scores.time_taken, scores.mistakes, scores.completed_at
    FROM scores
    JOIN users ON scores.user_id = users.id
    GROUP BY users.username, scores.scenario_id
    ORDER BY score DESC, scores.time_taken ASC
");
$stmt->execute();
$scores = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
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
        <h1>Classement des scores</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Utilisateur</th>
                    <th>Scénario</th>
                    <th>Score</th>
                    <th>Temps pris (s)</th>
                    <th>Fautes</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; ?>
                <?php foreach ($scores as $score): ?>
                    <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo htmlspecialchars($score['username']); ?></td>
                        <td><?php echo htmlspecialchars($score['scenario_id']); ?></td>
                        <td><?php echo htmlspecialchars($score['score']); ?></td>
                        <td><?php echo htmlspecialchars($score['time_taken']); ?></td>
                        <td><?php echo htmlspecialchars($score['mistakes']); ?></td>
                        <td><?php echo htmlspecialchars($score['completed_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>