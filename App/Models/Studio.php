<?php
namespace App\Models;

use App\Database\Database;
use PDO;

class Studio {
    private $pdo;
      public function __construct() {
            $this->pdo = Database::getInstance();
      }
      // Összes stúdió lekérése
      public function getAll(): array {
            $stmt = $this->pdo->prepare("SELECT * FROM studios ORDER BY name");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      // Stúdió lekérése id alapján
      public function getById(int $id): array|false {
            $stmt = $this->pdo->prepare("SELECT * FROM studios WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      // Új stúdió létrehozása
      public function create(array $data): int {
            $stmt = $this->pdo->prepare("INSERT INTO studios (name) VALUES (:name)");
            $stmt->execute([
                  'name' => $data['name'] ?? null,
            ]);
            return (int)$this->pdo->lastInsertId();
      }
      // Stúdió frissítése
      public function update(int $id, array $data): bool {
            $stmt = $this->pdo->prepare("UPDATE studios SET name = :name WHERE id = :id");
            return $stmt->execute([
                  'name' => $data['name'] ?? null,
                  'id' => $id,
            ]);
      }

}
