<?php
class ligne_produit extends projet {

    public $id;
    public $quantite;
    public $prix_ligne;
    public $id_produit;
    public $id_commande;
    public $suppr;

    public function __construct() {
        $this->id = 0;
        $this->quantite = 0;
        $this->prix_ligne = '';
        $this->id_produit = 0;
        $this->id_commande = 0;
        $this->suppr = 0;
        
    }

    
}