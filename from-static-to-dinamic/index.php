<?php
    $titulo = "Hello world, ". htmlspecialchars($_GET['nombre'] ?? "PAW");
    require 'index.view.php';
?>
