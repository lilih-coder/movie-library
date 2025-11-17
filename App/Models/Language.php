<?php
namespace App\Models;

use App\Database\Database;
use PDO;

class Language {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    // Összes nyelv lekérése
    public function getAll(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM languages ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nyelv lekérése ID alapján
    public function getById(int $id): array|false {
        $stmt = $this->pdo->prepare("SELECT * FROM languages WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Új nyelv hozzáadása
    public function create(array $data): int {
        $stmt = $this->pdo->prepare("INSERT INTO languages (name) VALUES (:name)");
        $stmt->execute(['name' => $data['name'] ?? null]);
        return (int)$this->pdo->lastInsertId();
    }

    // Nyelv frissítése
    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare("UPDATE languages SET name = :name WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'] ?? null,
            'id' => $id,
        ]);
    }

    // Nyelv törlése
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM languages WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
