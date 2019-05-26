<?php 
include("0-config/config-genos.php");
include("0-config/code-affichage.php");
$u = new utilisateur();
$u->id = $_SESSION['userId'];
$u->Load();
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
    <div class="row d-flex justify-content-end">
      <div class="col-3  mt-2 ">
        <img style="width: 200px" src="img/logo_transparent.png"
          class="img-fluid rounded text-center animated fadeInRight" alt="Responsive image">
      </div>
    </div>
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
              <li class="nav-item active">
                <a class="nav-link" href="#">Utilisateurs
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Catégorie produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Client</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Commande</a>
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
    <div class="row">
      <div class="col-lg-3 col-12 mb-1 text-right">
        <button type="button" class="btn btn-mdb-color">Ajouter un Utilisateur</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul class="list-group px-lg-4">
          <li class="list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-5 animated fadeInLeft"></i> Infos 1
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-times fa-lg white-text"></i>
              </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-wrench fa-lg white-text"></i>
              </a>
            </span>
          </li>
          <li class="list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-5 animated fadeInLeft"></i> Infos 2
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-times fa-lg white-text"></i>
              </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-wrench fa-lg white-text"></i>
              </a>
            </span>
          </li>
          <li class="list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-5 animated fadeInLeft"></i> Infos 3
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-times fa-lg white-text"></i>
              </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn">
              <a href="">
                <i class="fas fa-wrench fa-lg white-text"></i>
              </a>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <?php Js(); ?>
  </body>
