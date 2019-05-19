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
  <body>
  <section class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Section Administrative<small>Connexion(test)</small></h1>

            <form action="?action=connexion" method="POST">
                <article class="form-group">
                    <label for="">Login</label>
                    <input type="text" name="login" class="form-control">
                </article>
                <article class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="text" name="mdp" class="form-control">
                </article>
                <button class="btn btn-default" type="reset">Annuler</button>
                <button class="btn btn-primary" type="submit">Se Connecter</button>
            </form>
        </div>
    </div>
  </section>
    
  
  <?php Js(); ?>
  </body>
</html>