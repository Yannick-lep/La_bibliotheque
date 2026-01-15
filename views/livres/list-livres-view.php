<?php
$titleBibliothèque = "Liste des livres";
require PHP_ROOT. '/views/partials/header.php';
    if (count($livres) === 0) :
        echo '<h3>Aucun livre !</h3>';
        echo '<a href="' .  WEB_ROOT . '?page=add-livres" role="button">Ajouter un livre</a>';
        die();
    endif;
?>
    <h1 class="title">Liste des livres</h1>
    <div class="button"><a href="<?= WEB_ROOT . '?page=add-livres' ?>" role="button">Ajouter un livre</a></div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Auteur</th>
                <th>Titre</th>
                <th>Résumé</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre) : ?>
                <tr>
                    <td><?= $livre['id_livre']; ?></td>
                    <td><?= $livre['auteur']; ?></td>
                    <td><?= $livre['titre']; ?></td>
                    <td><?= $livre['resume']; ?></td>
                    <td><?= $livre['genre']; ?></td>
                    <td>
                        <a href="<?= WEB_ROOT . '?page=edit-livres&id=' . $livre['id_livre'] ?>" role="button">Edit</a>
                        <a href="<?= WEB_ROOT . '?page=del-livres&id=' . $livre['id_livre'] ?>" role="button" onclick="return confirm('Etes vous certain de vouloir supprimer ce livre ?');" style="background-color: lightcoral;">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php require PHP_ROOT . '/views/partials/footer.php';  ?>