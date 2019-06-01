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
        <div class="container mt-5">
          <form action="module.php?mod=commande&action=ajout&id_utilisateur=<?php echo $_SESSION['userId'] ?>" method="POST">
              <?php 
                $cli = new client;
                $cli -> SelectList("id_client","id","email");
              ?>
              <table class="table table-bordered text-center">
                <thead>
                    <tr>
                    <th class="white-text" scope="col">#</th>
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
            <div class="md-v-line"></div><i class="fas fa-user mr-5 animated fadeInLeft"></i>
            <td><img class="card-img-top image-cmd" src="<?php echo URL_HOME.'img/images_produits/'.$produit['image'] ?>"  alt="Card image cap"></td>
            <td><?php echo $produit['libelle'] ?></td> 
            <td><?php echo $produit['prix_unitaire'] ?> €</td>
            <td><input name="quantite<?php echo $idProduit ?>" id="quantite" type="number"/></td>
            </tr>
            <input type="hidden" name="prix_unitaire<?php echo $idProduit ?>" value="<?php echo $produit['prix_unitaire'] ?>">
            <input type="hidden" name="id_produit<?php echo $idProduit ?>" value="<?php echo $produit['id'] ?>">
            <?php
        };
        ?>
              </tbody>
            </table>
            <input type="submit" class="btn btn-mdb-color" value="Valider"/>
          </form>
        </div>
        <?php
    }

    public static function GetCurrentCommande($id_utilisateur, $id_client) {
        $c = new commande;
        var_dump($id_utilisateur);
        var_dump($id_client);
        $bind = array("id_utilisateur" => $id_utilisateur, "id_client" => $id_client);
        $req = "Select * from commande where suppr = 0 and id_utilisateur= :id_utilisateur and id_client= :id_client and statut= 'en cours'";
        $champs = array("id");
        $res = $c->StructList($req, $champs, $bind);
        var_dump($res);
        $c->id = reset($res)['id'];
        return $c;
    }
}