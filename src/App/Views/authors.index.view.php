<!DOCTYPE html>
<html lang="es">
<head>
    <?php require "Fragments/head.view.php" ?>
</head>
<body>
    <header>
        <h1><?= $title ?></h1>
        <?php
            require "Fragments/nav.view.php"
        ?>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($authors as $author):?>
                    <tr>
                        <td><?= $author -> fields["id"] ?></td>
                        <td>
                            <a href="/author?id=<?= $author -> fields["id"] ?>">
                            <?= $author -> fields["name"] ?>
                            </a>
                        </td>
                        <td><?= $author -> fields["email"] ?></td>
                    </tr>
                
                <?php endforeach;?>
            </tbody>
        </table>

    </main>
</body>
</html>