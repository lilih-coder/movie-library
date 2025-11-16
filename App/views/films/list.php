<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Filmek listája</h1>

    <a href="<?= BASE_URI ?>/films/create">Új film hozzáadása</a>

    <form method="get" action="<?= BASE_URI ?>/films" style="margin-top:20px; margin-bottom:20px;">
        <select name="director_id" id="director_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($directors as $director): ?>
                <option value="<?= $director['id'] ?>" <?= ($filters['director_id'] == $director['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($director['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= ($filters['category_id'] == $category['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="studio_id" id="studio_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($studios as $studio): ?>
                <option value="<?= $studio['id'] ?>" <?= ($filters['studio_id'] == $studio['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($studio['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>  
        <button type="submit">Szűrés</button>
    </form>
<table border="1" cellpadding="5">
    <tr>
        <th>Cím</th>
        <th>Stúdió</th>
        <th>Rendező</th>
        <th>Kategória</th>
        <th>Korhatár</th>
        <th>Műveletek</th>
    </tr>
    <?php foreach($films as $film): ?>
    <tr>
        <td><?= htmlspecialchars($film['title']) ?></td>
        <td><?= htmlspecialchars($film['studio_name']) ?></td>
        <td><?= htmlspecialchars($film['director_name']) ?></td>
        <td><?= htmlspecialchars($film['category_name']) ?></td>
        <td><?= htmlspecialchars($film['rating_age']) ?></td>
        <td>
            <a href="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>">Megtekintés</a> |
            <a href="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>/edit">Szerkesztés</a> |
            <form method="post" action="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>/delete" style="display:inline;">
                <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?');">Törlés</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
