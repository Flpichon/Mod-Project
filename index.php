<?php 
include("0-config/config-genos.php");
include("0-config/code-affichage.php");
if (isset($_GET["mod"]) && isset($_GET['action'])) {
  $utilisateur = new utilisateur();
  $utilisateur->LoadForm();
  $utilisateur->Add();
  header("Location: index.php");
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Mod</title>
</head>
<?php Head("connexion"); ?>
<body class="unique-color-dark">
  <div class="container">
  <?php modHeader('index'); ?>
    <div class="row">
      <div class="col-lg-3 col-12 mb-1 text-right">
        <a type="button" href="form.php?mod=utilisateur&action=ajout" class="btn btn-mdb-color">Ajouter un Utilisateur</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
      <?php utilisateur::DisplayUsers() ?>
        </ul>
      </div>
    </div>
  </div>
  <?php Js(); ?>
  </body>
