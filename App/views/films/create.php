<?php ?>
<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="newfilm-container">
    <h1 class="newfilm-title">Új film</h1>
    <form method="post" action="<?php echo BASE_URI; ?>/films/store">
        <label>Cím:
            <input name="title" type="text" required>
        </label>
        <label>Év:
            <input name="year" type="number" min="1900" max="2025" required>
        </label>
        <label>Stúdió:
            <input name="title" type="text" required>
        </label>
        <label>Rendező:
            <input name="title" type="text" required>
        </label>
        <label>Kategória:
            <input name="title" type="text" required>
        </label>
        <label>Korhatár:
            <input name="title" type="text" required>
        </label>
        <label>Nyelv:
            <input name="title" type="text" required>
        </label>
        <label>Felirat:
            <input name="title" type="text" required>
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
    box-shadow: 0 6px 20px rgba(0,0,0,0.7);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.newfilm-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.8);
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
    text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
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
    box-shadow: 0 0 8px rgba(229,9,20,0.6);
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
    box-shadow: 0 4px 12px rgba(229,9,20,0.6);
}
</style>