<?php
namespace App\Models;
use App\Database\Database;
use PDO;
class Category {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    // Összes kategória lekérése
    public function getAll(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM categories ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kategória lekérése id alapján
    public function getById(int $id): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Új kategória létrehozása
    public function create(array $data): int {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute([
            'name' => $data['name'] ?? null,
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    // Kategória frissítése
    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = :name WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'] ?? null,
            'id' => $id,
        ]);
    }

    // Kategória törlése
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}