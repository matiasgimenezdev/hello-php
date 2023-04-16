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

        <?php if($processed) : ?>
                <div class="notification">
                    Request processed succesfully. 
                </div>
        <?php endif; ?>
        
    </header>
    <main>
        <h2><?= $main ?></h2>
        <form action="/contact" method="POST">
            <label for="subject"><strong>Subject (*)</strong></label>
            <input type="text" name="subject">
            <label for="email"><strong>Email (*)</strong></label>
            <input type="email" name="email">
            <label for="description"><strong>Description (*)</strong></label>
            <textarea name="description"cols="30" rows="10"></textarea>
            <input type="submit" name="submit" value="Send">
        </form>
    </main>
</body>
</html>