<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="film-edit-container">
<h1>Film szerkesztése</h1>
<form method="post" action="<?php echo BASE_URI; ?>/films/<?php echo htmlspecialchars($film['id']); ?>/update">
    <label>Cím: <input name="title" value="<?php echo htmlspecialchars($film['title']); ?>"></label><br>
    <label>Leírás: <textarea name="description"><?php echo htmlspecialchars($film['description']); ?></textarea></label><br>
    <button type="submit">Mentés</button>
</form>
</div>
<style>
    /* =========================
   Film szerkesztése oldal
   ========================= */

/* Konténer */
.film-edit-container {
    max-width: 800px;
    margin: 30px auto;
    padding: 25px 30px;
    background-color: #1e1e1e;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.7);
    transition: transform 0.2s, box-shadow 0.3s;
}

.film-edit-container:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 25px rgba(229,9,20,0.8);
}

/* Főcím */
.film-edit-container h1 {
    color: #e50914;
    font-size: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    margin-bottom: 25px;
    transition: 0.3s;
}

.film-edit-container h1:hover {
    color: #ff1a36;
    text-shadow: 0 0 8px #e50914, 0 0 15px #ff1a36;
    transform: scale(1.05);
}

/* Label + input/textarea */
.film-edit-container label {
    display: block;
    margin-bottom: 18px;
    font-size: 1.15rem;
    color: #e0e0e0;
}

.film-edit-container label b {
    color: #e50914;
    margin-right: 6px;
}

.film-edit-container input,
.film-edit-container textarea,
.film-edit-container select {
    width: 100%;
    padding: 8px 12px;
    margin-top: 6px;
    margin-bottom: 12px;
    border-radius: 6px;
    border: 1px solid #333;
    background-color: #1e1e1e;
    color: #e0e0e0;
    font-size: 1rem;
    transition: 0.3s, box-shadow 0.3s, border-color 0.3s;
}

.film-edit-container input:focus,
.film-edit-container textarea:focus,
.film-edit-container select:focus {
    outline: none;
    border-color: #e50914;
    box-shadow: 0 0 5px #e50914;
}

/* Gomb */
.film-edit-container button {
    background-color: #e50914;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 1rem;
    transition: 0.3s, box-shadow 0.3s, transform 0.2s;
}

.film-edit-container button:hover {
    background-color: #ff1a36;
    box-shadow: 0 0 8px #e50914, 0 0 12px #ff1a36;
    transform: scale(1.05);
}

</style>

<?php require __DIR__ . '/../layouts/footer.php'; ?>