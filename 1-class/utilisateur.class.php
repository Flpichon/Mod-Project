<?php

class utilisateur extends projet {

    public $id;
    public $nom;
    public $prenom;
    public $login;
    public $email;
    public $mdp;
    public $suppr;

    public function __construct(){
         $this->id = 0;
         $this->nom = "";
         $this->prenom = "";
         $this->login = "";
         $this->email = "";
         $this->mdp = "";
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

}