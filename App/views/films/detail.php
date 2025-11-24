<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="film-display-container">
<h1>Film megjelenítése</h1>
<label><b>Cím:</b><?php echo htmlspecialchars($film['title']); ?> </label><br>
<label><b>Leírás:</b> <?php echo nl2br(htmlspecialchars($film['description'])); ?></label><br>
<a href="<?php echo BASE_URI; ?>/films/<?php echo htmlspecialchars($film['id']); ?>/edit">Szerkesztés</a>
</div>
<style>
    /* =========================
   Film megjelenítése oldal
   ========================= */

    /* Konténer a film részleteknek */
    .film-display-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 25px 30px;
        background-color: #1e1e1e;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .film-display-container:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 25px rgba(229, 9, 20, 0.8);
    }

    /* Főcím */
    .film-display-container h1 {
        color: #e50914;
        font-size: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        margin-bottom: 25px;
        transition: 0.3s;
    }

    .film-display-container h1:hover {
        color: #ff1a36;
        text-shadow: 0 0 8px #e50914, 0 0 15px #ff1a36;
        transform: scale(1.05);
    }

    /* Label + adat */
    .film-display-container label {
        display: block;
        margin-bottom: 18px;
        font-size: 1.15rem;
        color: #e0e0e0;
    }

    .film-display-container label b {
        color: #e50914;
        margin-right: 6px;
    }

    /* Szöveges leírásnál több sor */
    .film-display-container label br+br {
        margin-bottom: 12px;
    }

    /* Szerkesztés link */
    .film-display-container a {
        display: inline-block;
        margin-top: 15px;
        padding: 6px 14px;
        background-color: #e50914;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: 0.3s, box-shadow 0.3s, transform 0.2s;
    }

    .film-display-container a:hover {
        background-color: #ff1a36;
        box-shadow: 0 0 8px #e50914, 0 0 12px #ff1a36;
        transform: scale(1.05);
    }
</style>

<?php require __DIR__ . '/../layouts/footer.php'; ?>