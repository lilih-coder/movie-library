<?php
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../App/Database/Database.php';
require_once __DIR__ . '/../App/Models/Film.php';
require_once __DIR__ . '/../App/Controllers/FilmController.php';

use App\Controllers\FilmController;
use App\Database\Database;

// Adatbázis inicializálás (csak egyszer)
$db = new Database();
$sqlFile = __DIR__ . '/../sql/movies_db.sql';
$db->initializeDatabaseFromFile($sqlFile);

// Lista megjelenítés
$controller = new FilmController();
$controller->list();
