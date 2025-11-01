<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Film megjelenítése</h1>
    <label>Cím: <input name="title" value="<?php echo htmlspecialchars($film['title']); ?>"></label><br>
    <label>Leírás: <textarea name="description"><?php echo htmlspecialchars($film['description']); ?></textarea></label><br>

<?php require __DIR__ . '/../layouts/footer.php'; ?>