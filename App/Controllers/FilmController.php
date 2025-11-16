<?php
namespace App\Controllers;

use App\Models\Film;
use App\Models\Studio;
class FilmController extends BaseController {

    private $filmModel;
    private $studioModel;

    public function __construct() {
        $this->filmModel = new Film();
        $this->studioModel = new Studio();
    }

    // Film lista megjelenítése
    public function list($filters = []) {
        $films = $this->filmModel->getAll($filters);
        $directors = $this->filmModel->getDirectors();
        $categories = $this->filmModel->getCategories();
        $studios = $this->studioModel->getAll();
        require __DIR__ . '/../Views/films/list.php';
    }

    // Egy film részlete
    public function detail($id) {
        $film = $this->filmModel->getById($id);
        require __DIR__ . '/../Views/films/detail.php';
    }

    // Új film űrlap
    public function create() {
        require __DIR__ . '/../Views/films/create.php';
    }

    // Új film mentése
    public function store() {
        $data = $_POST;
        // egyszerű validáció példa
        if (empty($data['title'])) {
            $_SESSION['error'] = 'Cím megadása kötelező.';
            header('Location: ' . BASE_URI . '/films/create');
            exit;
        }
        $newId = $this->filmModel->create($data);
        header('Location: ' . BASE_URI . '/films/' . $newId);
        exit;
    }

    // Szerkesztés űrlap
    public function edit($id) {
        $film = $this->filmModel->getById((int)$id);
        require __DIR__ . '/../Views/films/edit.php';
    }

    // Frissítés mentése
    public function update($id) {
        $data = $_POST;
        $this->filmModel->update((int)$id, $data);
        header('Location: ' . BASE_URI . '/films/' . $id);
        exit;
    }

    // Törlés
    public function delete($id) {
        $this->filmModel->delete((int)$id);
        header('Location: ' . BASE_URI . '/films');
        exit;
    }

}
