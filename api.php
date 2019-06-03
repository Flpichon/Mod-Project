
    <?php
    include("0-config/config-genos.php");
    include("0-config/code-affichage.php");
    if (isset($_GET['list']) && $_GET["mod"] === 'produit') {
      $produit = new produit;
      $req = 'select id, libelle from produit where suppr = 0';
      $res = $produit->sql($req,"libelle");
      return $res;
    }