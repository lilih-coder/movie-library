<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Filmek listája</h1>
<table border="1" cellpadding="5">
    <tr>
        <th>Cím</th>
        <th>Stúdió</th>
        <th>Rendező</th>
        <th>Kategória</th>
        <th>Korhatár</th>
    </tr>
    <?php foreach($films as $film): ?>
    <tr>
        <td><?= htmlspecialchars($film['title']) ?></td>
        <td><?= htmlspecialchars($film['studio_name']) ?></td>
        <td><?= htmlspecialchars($film['director_name']) ?></td>
        <td><?= htmlspecialchars($film['category_name']) ?></td>
        <td><?= htmlspecialchars($film['rating_age']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
