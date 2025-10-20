<?php
namespace App\Models;

use App\Database\Database;
use PDO;

class Film {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    // Összes film lekérése
    public function getAll(): array {
        $stmt = $this->pdo->prepare("
            SELECT movies.*, studios.name AS studio_name, directors.name AS director_name, categories.name AS category_name
            FROM movies
            LEFT JOIN studios ON movies.studio_id = studios.id
            LEFT JOIN directors ON movies.director_id = directors.id
            LEFT JOIN categories ON movies.category_id = categories.id
            ORDER BY movies.title
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Egy film részlete
    public function getById(int $id): array|false {
        $stmt = $this->pdo->prepare("
            SELECT movies.*, studios.name AS studio_name, directors.name AS director_name, categories.name AS category_name
            FROM movies
            LEFT JOIN studios ON movies.studio_id = studios.id
            LEFT JOIN directors ON movies.director_id = directors.id
            LEFT JOIN categories ON movies.category_id = categories.id
            WHERE movies.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
