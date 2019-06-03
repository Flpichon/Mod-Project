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

    public function CountCommande() {
      $c = new commande;
      $bind = array("id_user" => $this->id);
      $req = "select count(*) as nbr from commande where id_utilisateur = :id_user and suppr = 0";
      $res = $c->sql($req,"nbr", $bind);
      return reset($res[0]);
    }

    public static function DisplayUsers() {
        $u = new utilisateur;
        $req = "Select * from utilisateur where suppr = 0";
        $champs = array("id","nom","prenom","login");
        $liste = $u->StructList($req,$champs);
        ?>
        <div class="row">
          <div class="col-xs-12 col-md-6">
          <ul class="row list-group list-group-horizontal d-flex justify-content-around m-1">
        <?php
        foreach($liste as $key => $user) {
          $u->id = $user['id'];
          $u->Load();
          $nbr = $u->CountCommande();
        ?>
            <li class="col-12 list-group-item font-weight-bold mb-2 bg-all white-text align-middle p-2">
            <div class="md-v-line"></div><i class="fas fa-user mr-3 animated fadeInLeft"></i>
            <span><?php echo $key+1 ." : " ?></span> 
            <span class="user-info text_style" user="<?php echo $user['login'] ?>" cmd="<?php echo  $nbr ?>" ><span class="title_style text-default">NOM :</span><?php echo str_repeat('&nbsp;', 1).$user['nom'].str_repeat('&nbsp;', 2) ?></span>
            <span class="text_style"><span class="title_style text-default">PRENOM :</span><?php echo str_repeat('&nbsp;', 1).$user['prenom'].str_repeat('&nbsp;', 2) ?></span>
            <span class="text_style"><span class="title_style text-default">LOGIN :</span><?php echo str_repeat('&nbsp;', 1).$user['login'].str_repeat('&nbsp;', 2) ?></span>
            <span class="badge badge-danger badge-pill ml-2 float-right p-2 animated zoomIn">
                <a href="index.php?mod=utilisateur&action=suppr&id=<?php echo $user['id']?>" onclick="return(confirm('Voulez vous vraiment supprimer cet utilisateur ?'))">
                <i class="fas fa-times fa-lg white-text"></i>
                </a>
            </span>
            <span class="badge badge-success badge-pill float-right p-2 animated zoomIn">
                <a href="form.php?mod=utilisateur&action=modif&id=<?php echo $user['id']?>">
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
          <form action="index.php?mod=utilisateur&action=ajout" method="POST">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="bg-brey text-white text-center py-2">
                    <p class="m-0">Saisissez les informations de l'utilisateur</p>
                  </div>
                </div>
                <div class="card-body  bg-all p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                    </div>
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
        $utilisateur = new utilisateur;
        $utilisateur->id = $_GET["id"];
        $utilisateur->Load();
        ?>
        <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6 pb-5">
          <form action="index.php?mod=utilisateur&action=modif&id=<?php echo $utilisateur->id ?>" method="POST">
              <div class="card rounded-0">
                <div class="card-header p-0 border-bottom-0">
                  <div class="bg-brey text-white text-center py-2">
                    <p class="m-0">Modifer les informations de l'utilisateur</p>
                  </div>
                </div>
                <div class="card-body  bg-all p-3">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $utilisateur->nom ?>" type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $utilisateur->prenom ?>" type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-edit text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $utilisateur->login ?>" type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-info animated fadeInLeft"></i></div>
                      </div>
                      <input value="<?php echo $utilisateur->email ?>" type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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

    public static function GetUserById($user_id) {
      $u = new utilisateur;
      $bind = array("id" => $user_id);
      $req = "Select * from utilisateur where suppr = 0 and id= :id";
      $champs = array("id","login");
      $res = $u->StructList($req, $champs, $bind);
      $u->id = reset($res)['id'];
      $u->login =  reset($res)['login'];
      return $u;
    }

}