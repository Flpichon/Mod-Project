<?php
    include("0-config/config-genos.php");
    include("0-config/code-affichage.php");
    if (isset($_GET["mod"]) && isset($_GET['action'])) {
        $mod = ucfirst($_GET['mod']);
        $action = ucfirst($_GET['action']);
    }
?>
<!doctype html>
    <html lang="fr">
    <?php Head("formulaire module"); ?>
        <body class="unique-color-dark">
            <div class="container">
            <?php modHeader($mod) ?>
            <?php $mod::$action(); ?>
            <?php Js(); ?>
            </div>
        </body>
    </html>