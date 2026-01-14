<?php
include PHP_ROOT .'/views/partials/header.php'; ?>
<h1 class="titre">Liste des livres empruntés</h1>

<?php if (empty($livres)): ?>
    <p>Vous n'avez aucun livre emprunté actuellement.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date d'emprunt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre): ?>
                    <?php
                    $en_retard = $livre['date_rendu'] && strtotime($livre['date_rendu']) < time();
                    ?>
                    <tr class="<?= $retard ? 'retard' : '' ?>">
                        <td><?=  htmlspecialchars($livre['titre']) ?></td>
                        <td><?=  htmlspecialchars($livre['auteur']) ?></td>
                        <td><?=  htmlspecialchars($livre['date_sortie']) ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
<?php endif; ?>
<?php include PHP_ROOT . '/views/partials/footer.php'; ?>