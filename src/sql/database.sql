CREATE DATABASE IF NOT EXISTS Escape_Game;

use Escape_Game;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE scores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    scenario_id INT,
    score INT,
    time_taken INT,
    mistakes INT,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);