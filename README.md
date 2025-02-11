# Escape-Game

Escape-Game est un jeu d'évasion en ligne où les utilisateurs doivent résoudre des énigmes et trouver des indices pour s'échapper de différents scénarios. Le jeu est développé en utilisant Vue.js pour le frontend et PHP pour le backend.

## Table des matières

- [Installation](#installation)
- [Utilisation](#utilisation)
- [Fonctionnalités](#fonctionnalités)

## Installation

### Prérequis

- [WAMP](https://www.wampserver.com/) ou tout autre serveur web local avec PHP et MySQL
- [Node.js](https://nodejs.org/) et npm (pour installer les dépendances frontend)

### Étapes d'installation

1. Clonez le dépôt :

    ```bash
    git clone https://github.com/votre-utilisateur/Escape-Game.git
    ```

2. Accédez au répertoire du projet :

    ```bash
    cd Escape-Game
    ```

3. Installez les dépendances frontend :

    ```bash
    npm install
    ```

4. Configurez la base de données :

    - Créez une base de données MySQL.
    - Importez le fichier `database.sql` dans votre base de données.
    - Modifier `database.php`.

6. Démarrez votre serveur web local (WAMP, XAMPP, etc.).

7. Accédez au projet dans votre navigateur :

    ```
    http://localhost/Escape-Game
    ```

## Utilisation

### Navigation

- **Accueil** : Page d'accueil du jeu.
- **Connexion** : Modal pour se connecter.
- **Inscription** : Modal pour s'inscrire.
- **Classement** : Page affichant le classement des scores.
- **Historique des parties** : Page affichant l'historique des parties de l'utilisateur.

### Jouer

1. Connectez-vous ou inscrivez-vous.
2. Sélectionnez un scénario et commencez à jouer.
3. Résolvez les énigmes et trouvez les indices pour vous échapper.
4. Votre score sera enregistré et ajouté au classement.

## Fonctionnalités

- **Scénarios interactifs** : Plusieurs scénarios avec des énigmes et des indices. (un seul disponible pour le moment)
- **Minuteur** : Un minuteur pour chaque scénario.
- **Classement** : Affiche les meilleurs scores des utilisateurs.
- **Historique des parties** : Affiche l'historique des parties de l'utilisateur.
- **Système de connexion et d'inscription** : Permet aux utilisateurs de créer un compte et de se connecter.

## Jouable en Ligne

https://tflorentescapegame.alwaysdata.net/index.php