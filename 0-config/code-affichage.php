<?php

function Head($titre = "") {?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URL_HOME ?>css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo URL_HOME ?>css/mdb.min.css" >
    <link rel="stylesheet" href="<?php echo URL_HOME ?>css/style.min.css" >
    <link rel="stylesheet" href="<?php echo URL_HOME ?>css/all.css" >
    <title><?php echo $titre; ?></title>
  </head>

<?php }

function Js(){
    ?>
    <script src="<?php echo URL_HOME ?>js/jquery.min.js" ></script>
    <script src="<?php echo URL_HOME?>js/popper.min.js"></script>
    <script src="<?php echo URL_HOME ?>js/bootstrap.min.js" ></script>
    <script src="<?php echo URL_HOME ?>js/mdb.min.js" ></script>
    <script src="<?php echo URL_HOME ?>js/script.js" ></script>
<?php }

function Footer(){
    ?>
    <div class="bottom section-padding mt-5">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 text-center white-text">
						<div class="copyright">
							<p>© <span>2019</span> <a href="https://github.com/Flpichon/Mod-Project" class="transition">Mod-Project</a> All rights reserved.</p>
						</div>
          </div>
				</div>
			</div>
		</div>
    <?php
}

function modHeader($mod) {
  $u = new utilisateur();
  $u->id = $_SESSION['userId'];
  $u->Load();
  if (isset($mod) && $mod !== 'index') {
    
  }
  ?>
    <!--    <div class="row d-flex justify-content-end">
      <div class="col-3  mt-2 ">
        <img style="width: 200px" src="img/logo_transparent.png"
          class="img-fluid rounded text-center animated fadeInRight" alt="Responsive image">
      </div>
    </div> -->
    <div class="row">
      <div class="col-12  mb-5">
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark unique-color animated fadeInDown">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item  <?php echo ($mod ==='index') ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">Utilisateurs
                </a>
              </li>
              <li class="nav-item <?php echo ($mod === 'produit') ? 'active' : '' ?>">
                <a class="nav-link" href="module.php?mod=produit">Produits</a>
              </li>
              <li class="nav-item <?php echo ($mod ==='categorie') ? 'active' : '' ?>">
                <a class="nav-link" href="module.php?mod=categorie">Catégorie produits</a>
              </li>
              <li class="nav-item <?php echo ($mod ==='client') ? 'active' : '' ?>">
                <a class="nav-link" href="module.php?mod=client">Clients</a>
              </li>
              <li class="nav-item <?php echo ($mod ==='commande') ? 'active' : '' ?>">
                <a class="nav-link" href="module.php?mod=commande">Commandes</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i><?php echo $u->nom ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default"
                  aria-labelledby="navbarDropdownMenuLink-333">
                  <a class="dropdown-item" href="#">Compte</a>
                  <a class="dropdown-item" href="?action=Deconnexion">Déconnexion</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <!--/.Navbar -->
      </div>
    </div>
    <?php
}
function AddButton($mod) {
  switch ($mod) {
    case 'produit':
      $toAdd = ' AJOUTER UN PRODUIT';
      break;
    case 'categorie':
      $toAdd = 'AJOUTER UNE CATEGORIE';
      break;
    case 'client':
      $toAdd = 'AJOUTER UN CLIENT';
    break;
    case 'commande':
      $toAdd = 'PASSER UNE COMMANDE';
    break;
    default:
      $toAdd = 'AJOUTER';
      break;
  }
  ?>
    <div class="col-lg-3 col-12 mb-1 text-right">
    <a type="button" href="form.php?mod=<?php echo $mod ?>&action=ajout" class="btn btn-mdb-color"><?php echo $toAdd ?></a>
  </div>
  <?php
}

function Fail() {
  ?>
  <div id="failAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Erreur</strong>
    Veuillez saisir un login et un mot de passe valide.
  </div>
  <?php
}