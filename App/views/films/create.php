<?php ?>
<?php require __DIR__ . '/../layouts/header.php'; 
use App\Models\Director;

$directorModel = new Director();
$directors = $directorModel->getAll(); 

use App\Models\Studio;
$studioModel = new Studio();
$studios = $studioModel->getAll(); 

use App\Models\Category;
$categoryModel = new Category();
$categories = $categoryModel->getAll();

use App\Models\Language;
$languageModel = new Language();
$languages = $languageModel->getAll();

?>
<div class="newfilm-container">
    <h1 class="newfilm-title">Új film</h1>
    <form method="post" action="<?php echo BASE_URI; ?>/films/store">
        <label>Cím:
            <input name="title" type="text" required>
        </label>
        <label>Év:
            <input name="year" type="number" min="1900" max="2025" required>
        </label>
        <label>Rendező:
            <select name="director_id" required>
                <option value="">-- Válassz rendezőt --</option>
                <?php foreach ($directors as $director) : ?>
                    <option value="<?= $director['id']; ?>"><?= htmlspecialchars($director['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Stúdió:
            <select name="studio_id" required>
                <option value="">-- Válassz stúdiót --</option>
                <?php foreach ($studios as $studio) : ?>
                    <option value="<?= $studio['id']; ?>"><?= htmlspecialchars($studio['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Kategória:
            <select name="category_id" required>
                <option value="">-- Válassz kategóriát --</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Korhatár:
            <select name="rating_age" required>
                <option value="">-- Válassz korhatárt --</option>
                <option value="0">Nincs korhatár</option>
                <option value="6">6+</option>
                <option value="12">12+</option>
                <option value="16">16+</option>
                <option value="18">18+</option>
            </select>
        </label>
        <label>Nyelv:
            <select name="language_id" required>
                <option value="">-- Válassz nyelvet --</option>
                <?php foreach ($languages as $language) : ?>
                    <option value="<?= $language['id']; ?>"><?= htmlspecialchars($language['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Felirat:
            <input type="checkbox" name="subtitle" value="1">
        </label>
        <label>Leírás:
            <textarea name="description" rows="5" required></textarea>
        </label>
        <button type="submit">Mentés</button>
    </form>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>


<!-- =========== UI & UX ===============-->
<style>
    /* =========================
   Új Film Form - Egyedi stílus
   ========================= */
    .newfilm-container {
        max-width: 450px;
        margin: 40px auto;
        padding: 30px 35px;
        background-color: #1e1e1e;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .newfilm-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.8);
    }

    /* Cím */
    .newfilm-container .newfilm-title {
        font-size: 2rem;
        font-weight: 700;
        color: #e50914;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        text-align: center;
        margin-bottom: 25px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        transition: color 0.3s, text-shadow 0.3s, transform 0.3s;
    }

    .newfilm-container .newfilm-title:hover {
        color: #ff1a36;
        text-shadow: 0 0 8px #e50914, 0 0 15px #ff1a36;
        transform: scale(1.05);
    }

    /* Label és input/textarea */
    .newfilm-container label {
        display: block;
        margin-bottom: 15px;
        font-weight: 500;
        color: #e0e0e0;
    }

    .newfilm-container input,
    .newfilm-container textarea {
        width: 100%;
        padding: 10px 12px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #333;
        background-color: #2a2a2a;
        color: #e0e0e0;
        font-size: 1rem;
        transition: border 0.3s, box-shadow 0.3s;
    }

    .newfilm-container input:focus,
    .newfilm-container textarea:focus {
        border: 1px solid #e50914;
        box-shadow: 0 0 8px rgba(229, 9, 20, 0.6);
        outline: none;
    }

    /* Gomb */
    .newfilm-container button {
        display: block;
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
        background-color: #e50914;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    }

    .newfilm-container button:hover {
        background-color: #ff1a36;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(229, 9, 20, 0.6);
    }

    /* SELECT (legördülő) mezők */
    .newfilm-container select {
        width: 100%;
        padding: 10px 12px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #333;
        background-color: #2a2a2a;
        color: #e0e0e0;
        font-size: 1rem;
        cursor: pointer;
        transition: border 0.3s, box-shadow 0.3s, background-color 0.3s;
        appearance: none; /* natív nyíl eltüntetése */
        background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    /* Hover */
    .newfilm-container select:hover {
        border: 1px solid #444;
        background-color: #262626;
    }

    /* Focus */
    .newfilm-container select:focus {
        border: 1px solid #e50914;
        box-shadow: 0 0 8px rgba(229, 9, 20, 0.6);
        outline: none;
        background-color: #2e2e2e;
    }
</style>