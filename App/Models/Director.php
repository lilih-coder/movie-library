<?php
namespace App\Models;

use App\Database\Database;
use PDO;
class Director{
      private $pdo;
      
      public function __construct() {
            $this->pdo = Database::getInstance();
      }
      
      // Összes rendező lekérése
      public function getAll(): array {
            $stmt = $this->pdo->prepare("SELECT * FROM directors ORDER BY name");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      // Rendező lekérése id alapján
      public function getById(int $id): array|false {
            $stmt = $this->pdo->prepare("SELECT * FROM directors WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      // Új rendező létrehozása
      public function create(array $data): int {
            $stmt = $this->pdo->prepare("INSERT INTO directors (name) VALUES (:name)");
            $stmt->execute([
                  'name' => $data['name'] ?? null,
            ]);
            return (int)$this->pdo->lastInsertId();
      }
      // Rendező frissítése
      public function update(int $id, array $data): bool {
            $stmt = $this->pdo->prepare("UPDATE directors SET name = :name WHERE id = :id");
            return $stmt->execute([
                  'name' => $data['name'] ?? null,
                  'id' => $id,
            ]);
      }
      // Rendező törlése
      public function delete(int $id): bool {
            $stmt = $this->pdo->prepare("DELETE FROM directors WHERE id = :id");
            return $stmt->execute(['id' => $id]);
      }
}

/*
<?php 
require __DIR__ . '/../layouts/header.php'; 
use App\Models\Director;

$directorModel = new Director();
$directors = $directorModel->getAll(); // Ez most egy tömb lesz minden rendezővel
?>
*/ 