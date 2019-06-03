<?php
class commande extends projet {

    public $id;
    public $date;
    public $statut;
    public $prix;
    public $id_utilisateur;
    public $id_client;
    public $suppr;

    public function __construct() {
        $this->id = 0;
        $this->date = date("Y-m-d H:i:s");
        $this->statut = 'en cours';
        $this->prix = '';
        $this->id_utilisateur = 0;
        $this->id_client = 0;
        $this->suppr = 0;
    }

    public static function Ajout() {
        $liste = produit::GetProduits();
            ?>
        <div class="container mt-2">
          <div class="row">
            <div class="col-12">
              <form action="module.php?mod=commande&action=ajout&id_utilisateur=<?php echo $_SESSION['userId'] ?>" method="POST">
                <div class="row">
                  <div class="col-xs-12 col-md-5">                
                    <span class="white-text">Sélectionnez un client :</span>
                    <?php 
                      $cli = new client;
                      $query = "select * from client where suppr = 0";
                      $config = array ();
                      $config[ "class" ] = "browser-default custom-select mb-4" ;
                      $config["sql"] = $query;
                      $cli -> SelectList("id_client","id","email",$config);
                    ?>
                  </div>
                </div>

              <div class="table-responsive text-nowrap">
              <table class="table table-bordered text-center">
                <thead>
                    <tr>
                    <th class="white-text d-none d-sm-block" scope="col">#</th>
                    <th class="white-text" scope="col">Produit</th>
                    <th class="white-text" scope="col">Prix unitaire</th>
                    <th class="white-text" scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
              <?php
        foreach ($liste as $key => $produit) {
            $idProduit = $produit['id'];
            ?>
            <tr class="font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <td class="d-none d-sm-block"><img class="card-img-top image-cmd" src="<?php echo URL_HOME.'img/images_produits/'.$produit['image'] ?>"  alt="Card image cap"></td>
            <td><?php echo $produit['libelle'] ?></td> 
            <td><?php echo $produit['prix_unitaire'] ?> €</td>
            <td>
            <span class="white-text">Sélectionnez la quantité :<br/><br/></span>
            <input name="quantite<?php echo $idProduit ?>" id="quantite" type="number"/>
            </td>
            </tr>
            <input type="hidden" name="prix_unitaire<?php echo $idProduit ?>" value="<?php echo $produit['prix_unitaire'] ?>">
            <input type="hidden" name="id_produit<?php echo $idProduit ?>" value="<?php echo $produit['id'] ?>">
            <?php
        };
        ?>
              </tbody>
            </table>
            </div>
            <input type="submit" class="btn btn-mdb-color" value="Valider"/>
          </form>
        </div>
      </div>
    </div>
        <?php
    }

    public static function GetCurrentCommande($id_utilisateur, $id_client) {
        $c = new commande;
        $bind = array("id_utilisateur" => $id_utilisateur, "id_client" => $id_client);
        $req = "Select * from commande where suppr = 0 and id_utilisateur= :id_utilisateur and id_client= :id_client and statut= 'en cours'";
        $champs = array("id");
        $res = $c->StructList($req, $champs, $bind);
        $c->id = reset($res)['id'];
        return $c;
    }

    public function GetLignesProduit() {
      $lP = new ligne_produit;
      $bind = array("id_commande" => $this->id);
      $req = "Select * from ligne_produit where suppr = 0 and id_commande= :id_commande";
      $champs = array("quantite","prix_ligne","id_produit");
      $res = $lP->StructList($req, $champs, $bind);
      return $res;
    }

    public static function DisplayCommande() {
        $c = new commande;
        $req = 'Select * from commande where suppr = 0';
        $champs = array("id","date", "statut", "prix", "id_utilisateur", "id_client");
        $liste = $c->StructList($req,$champs);
        ?>
        <ul class="row list-group list-group-horizontal d-flex justify-content-around m-1">
        <?php
        foreach ($liste as $key => $commande) {
          $u = utilisateur::GetUserById($commande['id_utilisateur']);
          $cli = client::GetClientById($commande['id_client']);
          $c->id = $commande['id'];
          $c->Load();

            ?>
              <li class="col-xs-12 col-sm-8 list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
               <div class="row center-md-text">
                 <div class="col-xs-12 col-md-4">
                 <span class="title_num_cmd text-default">N° Commande : </span><span class="text_num_cmd white-text"><?php echo str_repeat('&nbsp;', 2).$commande['id'] ?></span><br/>
                 </div>
                 <div class="col-xs-12 col-md-4">
                    <span class="title_style text-default">DATE : </span><span><?php echo str_repeat('&nbsp;', 2).$commande['date'] ?></span><br/>
                    <span class="title_style text-default">PRIX : </span><span><?php echo str_repeat('&nbsp;', 2).$commande['prix'] ?></span><br/>
                    <span class="title_style text-default">STATUT : </span><span><?php echo str_repeat('&nbsp;', 2).$commande['statut']?></span><br/>
                    <span class="title_style text-default">LOGIN : </span><span><?php echo str_repeat('&nbsp;', 2).$u->login?></span><br/>
                    <span class="title_style text-default">EMAIL : </span> <span><?php echo str_repeat('&nbsp;', 2).$cli->email?></span>
                 </div>
                 <div class="col-xs-12 col-md-4">
                <a class="btn btn-primary float-md-right roundbtn" data-toggle="collapse" href="#collapseExample<?php echo $key+1 ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key+1 ?>">
                  détails
                </a><br>
                <a class="btn btn-danger float-md-right roundbtn" onclick="return(confirm('Voulez vous vraiment supprimer cette commande ?'))" href="module.php?mod=commande&action=suppr&id_commande=<?php echo $commande['id']?>" >
                  Supprimer
                </a>
                 </div>
               </div> 


                <div class="collapse center-md-text" id="collapseExample<?php echo $key+1 ?>">
                <div class="mt-3">
                  <hr class="white">
                <span class="title_style text-default">détails commande N° <?php echo str_repeat('&nbsp;', 1).$commande['id'] ?></span>
                    <?php $details = $c->GetLignesProduit();
                    foreach ($details as $key => $ligne_produit) {
                      $produit = produit::GetProduitById($ligne_produit['id_produit']);              
                      ?>
                       <div class="col-xs-12 col-md-8 border">                     
                       <span class="title_style text-default">PRODUIT : </span><span> <?php echo str_repeat('&nbsp;', 1).$produit->libelle.str_repeat('&nbsp;', 2)?></span></span>
                       <span class="title_style text-default">QUANTITÉ : </span><span> <?php echo str_repeat('&nbsp;', 1).$ligne_produit['quantite'].str_repeat('&nbsp;', 2) ?></span></span>
                       <span class="title_style text-default">PRIX : </span><span> <?php echo str_repeat('&nbsp;', 1).$ligne_produit['prix_ligne']?>€</span></span>
                    </div>
                      <?php
                    }
                    ?>
                </div>
              </div>
              </li>
            <?php
        }
        ?>
        </ul>
        <?php
    }
}