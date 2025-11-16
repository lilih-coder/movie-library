<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Film szerkesztése</h1>
<form method="post" action="<?php echo BASE_URI; ?>/films/<?php echo htmlspecialchars($film['id']); ?>/update">
    <label>Cím: <input name="title" value="<?php echo htmlspecialchars($film['title']); ?>"></label><br>
    <label>Leírás: <textarea name="description"><?php echo htmlspecialchars($film['description']); ?></textarea></label><br>
    <button type="submit">Mentés</button>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>