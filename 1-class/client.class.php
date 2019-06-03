<?php

class client extends projet {

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $suppr;

    public function __construct(){
         $this->id = 0;
         $this->nom = "";
         $this->prenom = "";
         $this->email = "";
         $this->suppr = 0;
    }

    public static function DisplayClient() {
        $u = new client;
        $req = "Select * from client where suppr = 0";
        $champs = array("id","nom","prenom","email");
        $liste = $u->StructList($req,$champs);
        ?>
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <ul class="row list-group list-group-horizontal d-flex justify-content-around m-1">
        <?php
        foreach($liste as $key => $client) {
        ?>
            <li class="col-12 list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-3 animated fadeInLeft"></i>
            <span><?php echo $key+1 ?>:</span> 
            <span class="text_style"><span class="title_style text-default">NOM :</span><?php echo str_repeat('&nbsp;', 1).$client['nom'].str_repeat('&nbsp;', 2) ?></span>
            <span class="text_style"><span class="title_style text-default">PRENOM :</span><?php echo str_repeat('&nbsp;', 1).$client['prenom'].str_repeat('&nbsp;', 2) ?></span><br>
            <span class="text_style ml-5"><span class="title_style text-default">EMAIL :</span><?php echo str_repeat('&nbsp;', 1).$client['email'].str_repeat('&nbsp;', 2) ?></span>
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn align-middle"">
                <a href="module.php?mod=client&action=suppr&id=<?php echo $client['id']?>">
                <i class="fas fa-times fa-lg white-text"></i>
                </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn align-middle"">
                <a href="form.php?mod=client&action=modif&id=<?php echo $client['id']?>">
                <i class="fas fa-wrench fa-lg white-text"></i>
                </a>
            </span>
            </li>
        <?php 
        }
        ?>
        </ul>
          </div>
          <div class="col-xs-12 col-md-6">
          <canvas id="pieChart"></canvas>
          </div>
        </div>
        <?php
    }

    public static function Ajout() {
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="module.php?mod=client&action=ajout" method="POST">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="unique-color text-white text-center py-2">
                    <p class="m-0">Saisissez les informations du client</p>
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
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                  <div class="text-center">
                    <input type="reset" value="Annuler" class="btn btn-info btn-block rounded-0 py-2">
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
        $client = new client;
        $client->id = $_GET["id"];
        $client->Load();
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="module.php?mod=client&action=modif&id=<?php echo $client->id ?>" method="POST">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="unique-color text-white text-center py-2">
                    <p class="m-0">Modifer les informations du client</p>
                  </div>
                </div>
                <div class="card-body  mdb-color p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $client->nom ?>" type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $client->prenom ?>" type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $client->email ?>" type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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

    public static function GetClientById($client_id) {
      $cli = new client;
      $bind = array("id" => $client_id);
      $req = "Select * from client where suppr = 0 and id= :id";
      $champs = array("id","email");
      $res = $cli->StructList($req, $champs, $bind);
      $cli->id = reset($res)['id'];
      $cli->email =reset($res)['email'];
      return $cli;
    }

}