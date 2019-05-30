<?php 
class categorie extends project {
    public $id;
    public $libelle;
    public $suppr;

    public function __construct() {
        $this->id = 0;
        $this->libelle = "";
        $this->suppr = "";
    }

    public static function Ajout() {
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="index.php?mod=utilisateur&action=ajout" method="POST">
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
                        <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
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
}