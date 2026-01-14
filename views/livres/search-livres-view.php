<?php
include 'views/partials/header.php';
?>

<h2>Recherche de livres</h2>

<form method="POST">
    <input type="hidden" name="page" value="resultats-livres">
    <input 
        type="text" 
        name="search" 
        placeholder="Rechercher un livre..."
        required
    >
    <button type="submit">🔍</button>
</form>

<h3>Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</h3>

<?php if (!empty($livres)) : ?>
    <ul>
        <?php foreach ($livres as $livre) : ?>
            <li>
                <strong><?php echo htmlspecialchars($livre['titre']); ?></strong><br>
                Auteur : <?php echo htmlspecialchars($livre['auteur']); ?><br>
                Genre : <?php echo htmlspecialchars($livre['genre'] ?? '—'); ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Aucun livre trouvé.</p>
<?php endif; ?>

<?php include 'views/partials/footer.php'; ?>