<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@next"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Escape Game</a>
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
                    <a class="nav-link" href="src/leaderboard.html">Classement</a>
                </li>
            </ul>
        </div>
    </nav>


<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="registerForm" method="POST" action="src/php/register.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="POST" action="src/php/login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Contenu principal -->
    <div class="container mt-3">
        <h1>Bienvenue à l'Escape Game</h1>
        <div id="scenario1">
            <h2> <a href="src/scenarios/scenario1/scenar1.html"> Scénario 1 </a></h2>
            
        </div>
        <div id="scenario2">
            <h2>Scénario 2</h2>
            <iframe src="src/scenarios/scenario2/scenar2.html" frameborder="0" width="100%" height="500px"></iframe>
        </div>
        <div id="scenario3">
            <h2>Scénario 3</h2>
            <iframe src="src/scenarios/scenario3/scenar3.html" frameborder="0" width="100%" height="500px"></iframe>
        </div>
    </div>
</body>
</html>