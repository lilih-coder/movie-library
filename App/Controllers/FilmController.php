<?php
namespace App\Controllers;

use App\Models\Film;
use App\Models\Studio;
use App\Models\Director;
use App\Models\Category;
use App\Models\Language;

class FilmController extends BaseController {

    private $filmModel;
    private $studioModel;
    private $directorModel;
    private $categoryModel;
    private $languageModel;

    public function __construct() {
        $this->filmModel = new Film();
        $this->studioModel = new Studio();
        $this->directorModel = new Director();
        $this->categoryModel = new Category();
        $this->languageModel = new Language();
    }

    // Film lista megjelenítése
    public function list($filters = []) {
        $films = $this->filmModel->getAll($filters);
        $directors = $this->directorModel->getAll();
        $categories = $this->categoryModel->getAll();
        $studios = $this->studioModel->getAll();
        $languages = $this->languageModel->getAll();
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
