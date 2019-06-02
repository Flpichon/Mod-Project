<?php
    include("0-config/config-genos.php");
    include("0-config/code-affichage.php");
    $mod = ucfirst($_GET['mod']);
    $display = "Display".$mod;
    if (isset($_GET["mod"]) && isset($_GET['action']) && $_GET["mod"] !== 'commande') {
        $mod = new $_GET["mod"]();
        if ($_GET['action'] === 'modif' || $_GET['action'] === 'suppr') {
          $mod->id = $_GET['id'];
          $mod->Load();
        }
        if ($_GET['action'] === 'ajout' || $_GET['action'] === 'modif') {
          $mod->LoadForm();
        }
        $method = ($_GET['action'] === 'ajout') ? 'Add' : ($_GET['action'] === 'suppr' ? 'Delete' : 'Update');

        if ($_GET['mod'] === 'produit' && ($_GET['action'] === 'ajout' || $_GET['action'] === 'modif')) {
          $info = pathinfo($_FILES['image']['name']);
          $name = $info['basename'];
          if ($name !== '') {
          $mod->image = $name;
          $ext = $info['extension']; 
          $target =  (__Dir__."/img/images_produits/".$name);
          move_uploaded_file( $_FILES['image']['tmp_name'], $target);
          }
        }
        $mod->$method();
       header("Location: module.php?mod=".$_GET["mod"]);
      }
    if (isset($_GET["mod"]) && isset($_GET['action']) && $_GET["mod"] === 'commande') {
      $id_utilisateur = $_GET['id_utilisateur'];
      $commande = new commande();
      $commande->id_utilisateur = $id_utilisateur;
      $commande->id_client = $_POST['id_client'];
      $commande->statut = 'en cours';
      $commande->Add();
      $commande_c = $commande::GetCurrentCommande($id_utilisateur, $_POST['id_client']);
      $table = $_POST;
      array_shift($table);
      $tableSort = array();
      foreach ($table as $key => $value) {
        preg_match_all('!\d+!', $key, $id);
        $id = reset($id[0]);
        if(!array_key_exists($id, $tableSort)) {
          $tableSort[$id][] = $value;
        } else {
        array_push($tableSort[$id], $value);
        }
      }
      $prix_commande = 0;
      foreach ($tableSort as $key => $value) {
        if($value[0] !== '' && $value[0] !== 0) {
        $lP = new ligne_produit;
        $lP->quantite = $value[0];
        $prix_ligne = $value[0] * $value[1];
        $lP->id_produit = $key;
        $lP->id_commande = $commande_c->id;
        $lP->prix_ligne = $prix_ligne;
        $prix_commande+= $prix_ligne;
        var_dump($lP);
        $lP->Add();
        }
      }
      $commande_c->Load();
      $commande_c->prix = $prix_commande;
      $commande_c->statut = 'terminée';
      $commande_c->Update();
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