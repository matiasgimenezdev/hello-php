<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | PAW Backend</title>
</head>
<body>
    <header>
        <h1><?= $titulo ?></h1>

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