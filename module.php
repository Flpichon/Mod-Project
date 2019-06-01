<?php
    include("0-config/config-genos.php");
    include("0-config/code-affichage.php");
    $mod = ucfirst($_GET['mod']);
    $display = "Display".$mod;
    if (isset($_GET["mod"]) && isset($_GET['action'])) {
        $mod = new $_GET["mod"]();
        var_dump($_GET['mod']);
        var_dump($_GET['action']);
        if ($_GET['action'] === 'modif' || $_GET['action'] === 'suppr') {
          $mod->id = $_GET['id'];
          $mod->Load();
        }
        if ($_GET['action'] === 'ajout' || $_GET['action'] === 'modif') {
          $mod->LoadForm();
          var_dump($mod);
        }
        $method = ($_GET['action'] === 'ajout') ? 'Add' : ($_GET['action'] === 'suppr' ? 'Delete' : 'Update');
        var_dump($method);
        var_dump($mod);
        $mod->$method();
        header("Location: module.php?mod=".$_GET["mod"]);
      }
?>
<!doctype html>
    <html lang="fr">
    <?php Head("formulaire module"); ?>
        <body class="unique-color-dark">
            <div class="container">
            <?php modHeader( $_GET['mod']) ?>
            <?php AddButton( $_GET['mod']) ?> 
            <?php  $_GET["mod"]::$display(); ?>
            <?php Js(); ?>
            </div>
        </body>
    </html>