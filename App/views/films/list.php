<?php require __DIR__ . '/../layouts/header.php'; ?>

<h1>Filmek listája</h1>

<a href="<?= BASE_URI ?>/films/create">Új film hozzáadása</a>

<form method="get" action="<?= BASE_URI ?>/films" style="margin-top:20px; margin-bottom:20px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">

    <div>
        <label for="director_id" style="font-weight:bold; display:block; margin-bottom:5px;">Rendező:</label>
        <select name="director_id" id="director_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($directors as $director) : ?>
                <option value="<?= $director['id'] ?>" <?= ($filters['director_id'] == $director['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($director['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="category_id" style="font-weight:bold; display:block; margin-bottom:5px;">Kategória:</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id'] ?>" <?= ($filters['category_id'] == $category['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="studio_id" style="font-weight:bold; display:block; margin-bottom:5px;">Stúdió:</label>
        <select name="studio_id" id="studio_id" class="form-select">
            <option value="">-- Mind --</option>
            <?php foreach ($studios as $studio) : ?>
                <option value="<?= $studio['id'] ?>" <?= ($filters['studio_id'] == $studio['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($studio['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit" style="padding:8px 16px; margin-top:20px;">Szűrés</button>
    </div>

</form>

<table border="1" cellpadding="5" class="card">
    <div class="table-header card">
        <div>
            <tr>
                <th class="cell">Cím</th>
                <th class="cell">Stúdió</th>
                <th class="cell">Rendező</th>
                <th class="cell">Kategória</th>
                <th class="cell">Korhatár</th>
                <th class="cell">Nyelv</th>
                <th class="cell">Felirat</th>
                <th class="cell">Műveletek</th>
                <th class="cell">Értékelés</th>
                <th class="cell">Poszter</th>
            </tr>
        </div>
    </div>
    <?php foreach ($films as $film) : ?>
        <div class="table-body">
            <tr>
                <td><?= htmlspecialchars($film['title']) ?></td>
                <td><?= htmlspecialchars($film['studio_name']) ?></td>
                <td><?= htmlspecialchars($film['director_name']) ?></td>
                <td><?= htmlspecialchars($film['category_name']) ?></td>
                <td><?= htmlspecialchars($film['rating_age']) ?></td>
                <td><?= htmlspecialchars($film['language_name']) ?></td>
                <td><?= $film['subtitle'] ? 'Igen' : 'Nem' ?></td>
                
                <td style="text-align:left;">
                    <a href="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>">Megtekintés</a>
                    <a href="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>/edit">Szerkesztés</a><br>
                    <br>
                    <form method="post" action="<?= BASE_URI ?>/films/<?= htmlspecialchars($film['id']) ?>/delete" style="display:inline;">
                        <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?');">Törlés</button>
                    </form>
                </td>
                <td>
                    <div class="stars">
                        <span data-value="1">★</span>
                        <span data-value="2">★</span>
                        <span data-value="3">★</span>
                        <span data-value="4">★</span>
                        <span data-value="5">★</span>
                    </div>
                </td>
                <td>
                    <?php if (!empty($film['poster_url'])) : ?>
                        <img src="<?= htmlspecialchars($film['poster_url']) ?>" alt="Poszter" style="max-width:100px; max-height:150px;">
                    <?php else : ?>
                        N/A
                    <?php endif; ?>
                </td>
                <script>
                    const stars = document.querySelectorAll('.stars span');

                    stars.forEach(star => {
                        star.addEventListener('mouseover', () => {
                            highlight(star.dataset.value);
                        });

                        star.addEventListener('mouseout', () => {
                            highlight(document.querySelector('.stars').dataset.selected || 0);
                        });

                        star.addEventListener('click', () => {
                            document.querySelector('.stars').dataset.selected = star.dataset.value;
                            highlight(star.dataset.value);
                        });
                    });

                    function highlight(value) {
                        stars.forEach(star => {
                            if (star.dataset.value <= value) {
                                star.classList.add('active');
                            } else {
                                star.classList.remove('active');
                            }
                        });
                    }
                </script>

            </tr>
        </div>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>