<?php
include PHP_ROOT . '/views/partials/header.php';
?>

<h1 class="title">Liste des livres empruntés</h1>

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
                <tr>
                    <td><?= htmlspecialchars($livre['titre']) ?></td>
                    <td><?= htmlspecialchars($livre['auteur']) ?></td>
                    <td>
                        <?php
                        if ($livre['date_sortie'] !== null) {
                            // Date d'emprunt
                            $dateEmprunt = new DateTime($livre['date_sortie']);

                            // Date de retour = +1 mois
                            $dateRetour = clone $dateEmprunt;
                            $dateRetour->modify('+1 month');

                            // Vérifier si le livre est en retard
                            $en_retard = $dateRetour < new DateTime();
                            ?>
                            <small>
                                Remis le <?= htmlspecialchars($dateEmprunt->format('Y/m/d')) ?><br>
                                <?php if ($en_retard): ?>
                                    <strong>
                                        Ce livre devait etre rendu avant le <?= $dateRetour->format('Y/m/d'); ?>
                                    </strong><br>
                                    <strong class="error">Une pénalité de Retard pourrait être appliquée.</strong>
                                <?php else: ?>
                                    <strong>
                                        Pensez à rendre ce livre avant le <?= $dateRetour->format('Y/m/d'); ?>
                                    </strong>
                                <?php endif; ?>
                            </small>
                        <?php } else { ?>
                            <small>Réservé</small>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form method="post" action="?page=mes-livres">
        <input type="submit" value="historique" name="envoyer">
    </form>
<?php endif; ?>
<?php if (!empty($historique)): ?>
    <h2 class="title">Historique de mes emprunts</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historique as $livre): ?>
                <?php
                $dateEmprunt = new DateTime($livre['date_sortie']);
                $dateRetour = $livre['date_rendu'] ? new DateTime($livre['date_rendu']) : null;
                ?>
                <tr>
                    <td><?= htmlspecialchars($livre['titre']) ?></td>
                    <td><?= htmlspecialchars($livre['auteur']) ?></td>
                    <td><?= $dateEmprunt->format('Y/m/d') ?></td>
                    <td><?= $dateRetour ? $dateRetour->format('Y/m/d') : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php
include PHP_ROOT . '/views/partials/footer.php';
?>