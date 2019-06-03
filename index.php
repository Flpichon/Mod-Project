<?php 
include("0-config/config-genos.php");
include("0-config/code-affichage.php");
if (isset($_GET["mod"]) && isset($_GET['action'])) {
  $utilisateur = new utilisateur();
  if ($_GET['action'] === 'modif' || $_GET['action'] === 'suppr') {
    $utilisateur->id = $_GET['id'];
    $utilisateur->Load();
  }
  if ($_GET['action'] === 'ajout' || $_GET['action'] === 'modif') {
    $utilisateur->LoadForm();
    $utilisateur->mdp = md5($utilisateur->mdp);
  }
  $method = ($_GET['action'] === 'ajout') ? 'Add' : ($_GET['action'] === 'suppr' ? 'Delete' : 'Update');
  $utilisateur->$method();
  //header("Location: index.php");
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
  <div class="container-fluid">
  <?php modHeader('index'); ?>
    <div class="row">
      <div class="col-lg-3 col-12 mb-1 mt-5 text-right">
        <a type="button" href="form.php?mod=utilisateur&action=ajout" class="btn btn-mdb-color">Ajouter un Utilisateur</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
      <?php utilisateur::DisplayUsers() ?>
        </ul>
      </div>
    </div>
    <?php Footer(); ?>
  </div>
  <?php Js(); ?>
  </body>
