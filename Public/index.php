<?php
// egyszerű front controller / router
require __DIR__ . '/../Config/config.php';
// autoload ha van
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
} else {
    // ha nincs composer autoload, betöltjük a szükséges osztályokat manuálisan
    require __DIR__ . '/../App/Controllers/FilmController.php';
    require __DIR__ . '/../App/Models/Film.php';
    require __DIR__ . '/../App/Database/Database.php';
    // ha van BaseController, add hozzá itt:
    if (file_exists(__DIR__ . '/../App/Controllers/BaseController.php')) {
        require __DIR__ . '/../App/Controllers/BaseController.php';
    }
}

use App\Controllers\FilmController;
use App\Database\Database;

// Adatbázis inicializálás (csak egyszer)
$db = \App\Database\Database::getInstance();
$sqlFile = __DIR__ . '/../sql/movies_db.sql';
$db->initializeDatabaseFromFile($sqlFile);

$controller = new FilmController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$uri = str_replace(BASE_URI, '', $uri);

// routing táblázat (GET/POST kombinációk)
if ($uri === '/' || $uri === '/index.php') {
    header('Location: ' . BASE_URI . '/films');
    exit;
}

if ($method === 'GET' && $uri === '/films') {
    $controller->list();
    exit;
}

if ($method === 'GET' && $uri === '/films/create') {
    $controller->create();
    exit;
}

if ($method === 'POST' && $uri === '/films/store') {
    $controller->store();
    exit;
}

if ($method === 'GET' && preg_match('#^/films/(\d+)$#', $uri, $m)) {
    $controller->detail((int)$m[1]);
    exit;
}

if ($method === 'GET' && preg_match('#^/films/(\d+)/edit$#', $uri, $m)) {
    $controller->edit((int)$m[1]);
    exit;
}

if ($method === 'POST' && preg_match('#^/films/(\d+)/update$#', $uri, $m)) {
    $controller->update((int)$m[1]);
    exit;
}

if ($method === 'POST' && preg_match('#^/films/(\d+)/delete$#', $uri, $m)) {
    $controller->delete((int)$m[1]);
    exit;
}

// alap 404
http_response_code(404);
echo '404 Not Found';
?>