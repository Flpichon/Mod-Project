<?php
include("0-config/config-genos.php");
include("0-config/code-affichage.php");
$mod = $_GET['mod'];
?>
    <!doctype html>
    <html lang="fr">
    <?php Head("formulaire module"); ?>
        <body class="unique-color-dark">
        <div class="container">
        <?php modHeader($mod) ?>  
        <?php Js(); ?>
        </body>
    </html>