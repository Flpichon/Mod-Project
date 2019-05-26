<?php 

class projet {
  
  use Genos {
    Delete as DeleteGenos;
  }
  public $id;
  public $suppr;

  public function __construct() {
    $this->id = 0;
    $this->suppr = 0;

  }

  public function Delete() {
    $this->Load();
    $this->suppr = 1;
    $this->Update();
  }
    
}