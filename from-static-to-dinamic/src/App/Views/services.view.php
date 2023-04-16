<!DOCTYPE html>
<html lang="es">
<head>
    <?php require "Fragments/head.view.php"?>
</head>
<body>
    <header>
        <h1><?= $title ?></h1>        
        <?php
            require "Fragments/nav.view.php"
        ?>
    </header>
    <main>
        <h2><?=$main?></h2>
    </main>
</body>
</html>