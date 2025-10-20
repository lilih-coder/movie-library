<?php
namespace App\Controllers;

use App\Models\Film;

class FilmController extends BaseController {

    private $filmModel;

    public function __construct() {
        $this->filmModel = new Film();
    }

    // Film lista megjelenítése
    public function list() {
        $films = $this->filmModel->getAll();
        require __DIR__ . '/../Views/films/list.php';
    }

    // Egy film részlete
    public function detail($id) {
        $film = $this->filmModel->getById($id);
        require __DIR__ . '/../Views/films/detail.php';
    }
}
