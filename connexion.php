<?php 
include("0-config/config-genos.php");
include("0-config/code-affichage.php");

if(isset($_GET["action"]) && $_GET["action"] == "connexion")
{
    $c = new connexion;
    $c->Connexion();
}
?>
<!doctype html>
<html lang="fr">
<?php Head("connexion"); ?>
<body class="unique-color-dark">
<section class="container">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 pb-5">
      <form action="?action=connexion" method="POST">
          <div class="card rounded-0">
            <div class="card-header p-0 border-bottom-0">
              <div class="unique-color text-white text-center py-2">
                <h3><i class="fa fa-envelope animated fadeInLeft"></i> connexion </h3>
                <p class="m-0">entrez vos informations</p>
              </div>
            </div>
            <div class="card-body  mdb-color p-3">
              <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                  </div>
                  <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                  </div>
                  <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                </div>
              </div>
              <div class="text-center">
                <input type="submit" value="Connexion" class="btn btn-info btn-block rounded-0 py-2">
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  </section>
  <?php Js(); ?>
  </body>
</html>