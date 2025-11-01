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

    // Új film létrehozása, visszaadja az új id-t vagy 0-t
    public function create(array $data): int {
        $stmt = $this->pdo->prepare("
            INSERT INTO movies (title, studio_id, director_id, category_id, description)
            VALUES (:title, :studio_id, :director_id, :category_id, :description)
        ");
        $stmt->execute([
            'title' => $data['title'] ?? null,
//            'year' => $data['year'] ?? null,
            'studio_id' => $data['studio_id'] ?? null,
            'director_id' => $data['director_id'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'description' => $data['description'] ?? null,
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    // Film frissítése
    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare("
            UPDATE movies SET title = :title, year = :year, studio_id = :studio_id,
            director_id = :director_id, category_id = :category_id, description = :description
            WHERE id = :id
        ");
        return $stmt->execute([
            'title' => $data['title'] ?? null,
            //'year' => $data['year'] ?? null,
            'studio_id' => $data['studio_id'] ?? null,
            'director_id' => $data['director_id'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'description' => $data['description'] ?? null,
            'id' => $id,
        ]);
    }

    // Film törlése
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
