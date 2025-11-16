<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Film megjelenítése</h1>
    <label><b>Cím:</b><?php echo htmlspecialchars($film['title']); ?> </label><br>
    <label><b>Leírás:</b> <?php echo nl2br(htmlspecialchars($film['description'])); ?></label><br>
<a href="<?php echo BASE_URI; ?>/films/<?php echo htmlspecialchars($film['id']);?>/edit">Szerkesztés</a>

<?php require __DIR__ . '/../layouts/footer.php'; ?>