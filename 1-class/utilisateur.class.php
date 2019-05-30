<?php

class utilisateur extends projet {

    public $id;
    public $nom;
    public $prenom;
    public $login;
    public $email;
    public $mdp;
    public $id_statut;
    public $suppr;

    public function __construct(){
         $this->id = 0;
         $this->nom = "";
         $this->prenom = "";
         $this->login = "";
         $this->email = "";
         $this->mdp = "";
         $this->id_statut = 1;
         $this->suppr = 0;
    }

    public static function DisplayUsers() {
        $u = new utilisateur;
        $req = "Select * from utilisateur ";
        $champs = array("id","nom","prenom","login");
        $liste = $u->StructList($req,$champs);
        foreach($liste as $key => $user) {
        ?>
            <li class="list-group-item font-weight-bold mb-2 mdb-color white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-5 animated fadeInLeft"></i>
            <span><?php echo $key+1 ?></span> 
            <span><?php echo $user['nom'] ?></span>
            <span><?php echo $user['prenom'] ?></span>
            <span><?php echo $user['login']?></span>
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
        <?php 
        }
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
                    <p class="m-0">Saisissez les informations de l'utilisateur</p>
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
                        <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
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