<?php 


class produit extends projet {

    public $id;
    public $libelle;
    public $description;
    public $prix_unitaire;
    public $image;
    public $suppr;
    public $id_categorie;

    public function __construct() {

        $this->id = 0;
        $this->libelle = "";
        $this->description = "";
        $this->prix_unitaire = "";
        $this->image = "";
        $this->suppr = 0;
        $this->id_categorie = 0;
    }
    public static function GetCategorie() {
        $c = new categorie;
        $req = "Select * from categorie where suppr = 0";
        $champs = array("id","libelle");
        return $c->StructList($req,$champs);
    }
    public static function GetProduits() {
        $p = new produit;
        $req = "Select * from produit where suppr = 0";
        $champs = array("id","libelle","prix_unitaire","image","id_categorie");
        return $p->StructList($req,$champs);
    }
    public static function Ajout() {
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="module.php?mod=produit&action=ajout" method="POST" enctype="multipart/form-data">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="unique-color text-white text-center py-2">
                    <p class="m-0">Saisissez le produit</p>
                  </div>
                </div>
                <div class="card-body  mdb-color p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="libelle" name="libelle" placeholder="libellé" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" placeholder="prix" step="0.01" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="file" accept="image/jpeg image/png" class="form-control" id="image" name="image">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <select class="form-control" id="id_categorie" name="id_categorie">
                        <?php
                            $liste = produit::GetCategorie();
                            foreach ($liste as $key => $categorie) {
                               ?>
                               <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['libelle'] ?></option>
                               <?php
                            }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="text-center">
                    <input type="submit" value="Ajouter" class="btn btn-info btn-block rounded-0 py-2">
                  </div>
                </div>
    
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
    }

    public static function DisplayProduit() {
        $p = new produit;
        $req = "SELECT * from produit where suppr = 0";
        $champs = array("id","libelle","description","prix_unitaire","image","id_categorie");
        $liste = $p->StructList($req,$champs);
        ?>
        <div class="row">
        <?php
        foreach ($liste as $produit) {
            $cat = categorie::GetCategorieById($produit['id_categorie']);
            ?>
            <div class="col-md-4 col-12 mt-2 mb-2">
                <div class="card mdb-color white-text">
                    <img class="card-img-top rounded mx-auto d-block bord" src="<?php echo URL_HOME.'img/images_produits/'.$produit['image'] ?>"  alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><a><?php echo $produit['libelle'] ?></a></h4>
                        <span class="badge badge-primary badge-pill float-right p-2 animated zoomIn">
                            <i class="fas fa-box fa-lg white-text"><?php  echo str_repeat('&nbsp;', 3).$cat->libelle ?></i>
                        </span>
                        <p class="card-text white-text"><?php echo $produit['description'] ?></p>
                        <p class="card-text white-text"><?php echo $produit['prix_unitaire'] ?> €</p>
                        <span class="badge badge-danger badge-pill mr-2 float-left p-2 animated zoomIn">
                            <a href="module.php?mod=produit&action=suppr&id=<?php echo $produit['id']?>">
                            <i class="fas fa-times fa-lg white-text"></i>
                            </a>
                        </span>
                        <span class="badge badge-success badge-pill float-left p-2 animated zoomIn">
                            <a href="form.php?mod=produit&action=modif&id=<?php echo $produit['id']?>">
                            <i class="fas fa-wrench fa-lg white-text"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }

    public static function Modif() {
      $produit = new produit;
      $produit->id = $_GET["id"];
      $produit->Load();
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="module.php?mod=produit&action=modif&id=<?php echo $produit->id ?>" method="POST" enctype="multipart/form-data">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="unique-color text-white text-center py-2">
                    <p class="m-0">Modifiez le produit</p>
                  </div>
                </div>
                <div class="card-body  mdb-color p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $produit->libelle ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="<?php echo $produit->prix_unitaire ?>" step="0.01" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="description" name="description" value="<?php echo $produit->description ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="file" id="files" accept="image/jpeg image/png" class="form-control" value="<?php echo (__Dir__."/img/images_produits/".$produit->image)?>" id="image" name="image">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <select class="form-control" id="id_categorie" name="id_categorie">
                        <?php
                            $liste = produit::GetCategorie();
                            foreach ($liste as $key => $categorie) {
                               ?>
                               <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['libelle'] ?></option>
                               <?php
                            }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="text-center">
                    <input type="submit" value="Ajouter" class="btn btn-info btn-block rounded-0 py-2">
                  </div>
                </div>
    
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
    }

    public static function GetProduitById($id_produit) {
        $produit = new produit;
        $bind = array("id_produit" => $id_produit);
        $req = "Select * from produit where suppr = 0 and id= :id_produit";
        $champs = array("id","libelle");
        $res = $produit->StructList($req, $champs, $bind);
        $produit->id = reset($res)['id'];
        $produit->libelle = reset($res)['libelle'];
        return $produit;
    }

}