<?php ?>
<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Új film</h1>
<form method="post" action="<?php echo BASE_URI; ?>/films/store">
    <label>Cím: <input name="title"></label><br>
    <label>Év: <input name="year" type="number"></label><br>
    <label>Leírás: <textarea name="description"></textarea></label><br>
    <button type="submit">Mentés</button>
</form>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
