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

}