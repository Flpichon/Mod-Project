<?php 
class categorie extends projet {
    public $id;
    public $libelle;
    public $suppr;

    public function __construct() {
        $this->id = 0;
        $this->libelle = "";
        $this->suppr = 0;
    }

    public static function DisplayCategorie() {
        $c = new categorie;
        $req = "Select * from categorie where suppr = 0";
        $champs = array("id","libelle");
        $liste = $c->StructList($req,$champs);
        ?>
        <ul class="row list-group list-group-horizontal d-flex justify-content-around">
        <?php
        foreach($liste as $key => $categorie) {
        ?>
          
            <li class="col-xs-12 col-md-5 list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-box mr-5 animated fadeInLeft"></i>
            <span><?php echo $key+1 ?></span> 
            <span><?php echo $categorie['libelle'] ?></span>
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn">
                <a href="module.php?mod=categorie&action=suppr&id=<?php echo $categorie['id']?>">
                <i class="fas fa-times fa-lg white-text"></i>
                </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn">
                <a href="form.php?mod=categorie&action=modif&id=<?php echo $categorie['id']?>">
                <i class="fas fa-wrench fa-lg white-text"></i>
                </a>
            </span>
            </li>
        <?php 
        }
        ?>
        </ul>
        <?php
    }

    public static function Ajout() {
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="module.php?mod=categorie&action=ajout" method="POST">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="unique-color text-white text-center py-2">
                    <p class="m-0">Saisissez le libellé de la catégorie</p>
                  </div>
                </div>
                <div class="card-body  mdb-color p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-box text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="libelle" name="libelle" placeholder="libellé" required>
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


    public static function Modif() {
      $categorie = new categorie;
      $categorie->id = $_GET["id"];
      $categorie->Load();
      ?>
      <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
        <form action="module.php?mod=categorie&action=modif&id=<?php echo $categorie->id ?>" method="POST">
            <div class="card rounded-0">
              <div class="card-header p-0 border-bottom-0">
                <div class="unique-color text-white text-center py-2">
                  <p class="m-0">Modifer les informations de la categorie</p>
                </div>
              </div>
              <div class="card-body  mdb-color p-3">
                <div class="form-group">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                    </div>
                    <input value="<?php echo $categorie->libelle ?>" type="text" class="form-control" id="libelle" name="libelle" placeholder="libelle" required>
                  </div>
                </div>
                <div class="text-center">
                  <input type="reset" value="Annuler" class="btn btn-info btn-block rounded-0 py-2">
                  <input type="submit" value="Modifier" class="btn btn-info btn-block rounded-0 py-2">
                </div>
              </div>
  
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }

  public static function GetCategorieById($id) {
    $c = new categorie;
    $bind = array("id" => $id);
    $req = "Select * from categorie where suppr = 0 and id= :id";
    $champs = array("id","libelle");
    $res = $c->StructList($req, $champs, $bind);
    $c->id = reset($res)['id'];
    $c->libelle = reset($res)['libelle'];
    return $c;
  }

}