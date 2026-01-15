<?php include PHP_ROOT . '/views/partials/header.php'; ?>

<h1 class="title">Recherche de livres</h1>

<div class="search-bar">
    <form method="POST">
        <input type="text" name="search" placeholder="Rechercher un livre..."
            value="<?php echo htmlspecialchars($searchTerm); ?>" required>
        <button type="submit" name="search-button">
            <img src="<?= WEB_ROOT . "/assets/img/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                alt="Search icon"></button>
    </form>
</div>
<?php if ($error !== ''): ?>
    <div class="error" style="text-align: center; margin-top: 5rem; font-size: 2rem;">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>
<?php if (!empty($searchTerm)): ?>
    <h3 class="subtitle">Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</h3>

    <?php if (!empty($livres)): ?>
        <ul>
            <?php foreach ($livres as $livre): ?>
                <li>
                    <strong><?php echo htmlspecialchars($livre['titre']); ?></strong><br>
                    Auteur : <?php echo htmlspecialchars($livre['auteur']); ?><br>
                    Genre : <?php echo htmlspecialchars($livre['genre'] ?? '—'); ?>

                    <?php if (!is_logged_in()) { ?>
                        <br><strong><a href="?page=login">Connectez-vous pour emprunter</a></strong>
                    <?php } else { ?>
                        <form method="POST" style="margin-top: 8px;">
                            <input type="hidden" name="id_livre" value="<?= $livre['id_livre']; ?>">
                            <input type="hidden" name="search" value="<?= $searchTerm; ?>">
                            <button type="submit" name="emprunter-button" class="btn btn-primary">
                                Emprunter
                            </button>
                        </form>
                    <?php } ?>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun livre trouvé.</p>
    <?php endif; ?>
<?php endif; ?>

<?php include PHP_ROOT . '/views/partials/footer.php'; ?>