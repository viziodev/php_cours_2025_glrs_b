<?php 
require_once "./models/Compte.php";
class CompteService{
    private array $comptes=[];

    
  //Request ==$_GET,$_POST $_REQUEST
  //Response ==> require_once("list.compte.html.php")
    /**
     * Get the value of comptes
     */
    public function listerCompte(): array
    {
          return $this->comptes;
    }
    public function addCompte(Compte $compte): void
    {
        $this->comptes[] = $compte;
    }

    /*
      public function action(): void
       {
          1.Request ==$_GET,$_POST $_REQUEST ==>Recuperer les donnees provenant de la vue
          2.useCase()
          3.Response ==> require_once("vue.html.php")==>Mettre a jour la vue
       }
     */
}