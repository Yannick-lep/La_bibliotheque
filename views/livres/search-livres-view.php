<?php include PHP_ROOT . '/views/partials/header.php'; ?>

<h1 class="title">Recherche de livres</h1>

<div class="search-bar">
    <form method="POST">
        <input type="text" name="search" placeholder="Rechercher un livre..."
            value="<?php echo htmlspecialchars($searchTerm); ?>" required>
        <button type="submit">
            <img src="<?= WEB_ROOT . "/assets/img/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                alt="Search icon"></button>
    </form>
</div>

<?php if (!empty($searchTerm)): ?>
    <h3 class="subtitle">Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</h3>

    <?php if (!empty($livres)): ?>
        <ul>
            <?php foreach ($livres as $livre): ?>
                <li>
                    <strong><?php echo htmlspecialchars($livre['titre']); ?></strong><br>
                    Auteur : <?php echo htmlspecialchars($livre['auteur']); ?><br>
                    Genre : <?php echo htmlspecialchars($livre['genre'] ?? '—'); ?>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun livre trouvé.</p>
    <?php endif; ?>
<?php endif; ?>

<?php include PHP_ROOT . '/views/partials/footer.php'; ?>