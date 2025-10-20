<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../App/Database/Database.php';
require_once __DIR__ . '/../App/Models/Film.php';
require_once __DIR__ . '/../App/Controllers/FilmController.php';

use App\Controllers\FilmController;
use App\Database\Database;

// Adatbázis inicializálás (csak egyszer)
$db = \App\Database\Database::getInstance();$sqlFile = __DIR__ . '/../sql/movies_db.sql';
$db->initializeDatabaseFromFile($sqlFile);

// Lista megjelenítés
$controller = new FilmController();
$controller->list();
