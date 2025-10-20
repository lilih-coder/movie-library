<?php
namespace App\Database;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";charset=utf8mb4",
                DB_USER,
                DB_PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Adatbázis hiba: " . $e->getMessage());
        }
    }

    // Singleton
    public static function getInstance(): PDO {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }

    // SQL fájl futtatása, egyszer
    public function initializeDatabaseFromFile(string $sqlFilePath): void {
        $flagFile = __DIR__ . '/db_initialized.flag';

        // Ha már egyszer lefutott, ne fusson újra
        if (file_exists($flagFile)) {
            return;
        }

        try {
            $sql = file_get_contents($sqlFilePath);
            $this->pdo->exec($sql);
            // Létrehozunk egy flag fájlt, hogy ne fusson újra
            file_put_contents($flagFile, 'initialized');
            echo "Adatbázis inicializálás kész: $sqlFilePath<br>";
        } catch (PDOException $e) {
            die("Hiba az SQL fájl futtatása során: " . $e->getMessage());
        }
    }
}
