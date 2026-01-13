<?php require PHP_ROOT . '/views/partials/head.php'; ?>
<h1 class="title">Inscription</h1>

<form method="post">
    <?php if (array_key_exists("id_users", $user)) { ?>
        <input type="hidden" name="id_users" value="<?= $user['id_users'] ?>">
    <?php } ?>
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?= $user['name'] ?>">
    </div>
    <div>
        <label for="login">Login</label>
        <input type="text" name="login" id="login" value="<?= $user['login'] ?>">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password_confirm">Password confirm</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">
    <?php if (!empty($errors)) { ?>
        <div class="error">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
    <?php } ?>
</form>
<?php require PHP_ROOT . '/views/partials/tail.php'; ?>