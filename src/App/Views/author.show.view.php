<!DOCTYPE html>
<html lang="es">
<head>
    <?php require "Fragments/head.view.php" ?>
</head>
<body>
    <header>
        <h1><?= $title ?>: <?= ucfirst($author -> fields["name"])?></h1>
        <?php
            require "Fragments/nav.view.php"
        ?>
    </header>
    <main>
        <p>Name: <?= $author -> fields["name"] ?></p>
        <p>Email: <a href="mailto:<?= $author -> fields["email"]?>"> <?= $author -> fields["email"] ?></a></p>
    </main>
</body>
</html>