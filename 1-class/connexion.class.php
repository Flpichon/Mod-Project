<?php
class connexion extends projet{
    public $nom;
    public $pageConnexion;

    public function __construct(){
        $this->Deconnexion();
        $this->nom = "auth";
        $this->pageConnexion = "Connexion.php";
    }

    public function GetPage(){
        $page = $_SERVER["PHP_SELF"];
        $page = explode("/",$page);
        $page = array_reverse($page);
        return $page[0];
    }

    public function VerifConnexion(){
        if(!isset($_SESSION[$this->nom]) || $_SESSION[$this->nom] !== true)
        {
            $page = $this->GetPage();
            if($page != $this->pageConnexion) header("Location:".URL_HOME.$this->pageConnexion);
        }
    }

    public function Connexion(){
        $new_connexion = new connexion;
        $login = $_POST["login"];
        $mdp = md5($_POST["mdp"]);
        $bind = array("login" => $login, "mdp" => $mdp);
        $req = "select * from utilisateur where suppr = 0 and login = :login and mdp = :mdp limit 0,1";
        $res = $new_connexion->sql($req, "id", $bind);
        
        if(!empty($res))
        {
            $_SESSION[$this->nom] =true;
            $_SESSION["login"] =$login;
            $_SESSION["mdp"] =$mdp;
            header("Location:index.php");
        }

    }

   public function Deconnexion(){
       if(isset($_GET["action"]) && $_GET["action"] == "Deconnexion")
       {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        header("Location: ".URL_HOME);
       }
    
    } 
}