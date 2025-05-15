<?php 
require_once "./../services/CompteService.php";
require_once "./../models/Compte.php";
class CompteController{
      private CompteService $compteService;
      public  function __construct()
      {
        $this->compteService=new CompteService();
      }
     public function showList(){
         $comptes=$this->compteService->listerCompte();
        //Reponse
        require_once "../views/layout/header.inc.php";
        require_once "../views/comptes/list.html.php";
        require_once "../views/layout/footer.inc.php";
     }

     public function loadForm(){
        require_once "../views/layout/header.inc.php";
        require_once "../views/comptes/form.html.php";
        require_once "../views/layout/footer.inc.php";
    }

    public function createCompte(){
        //Recuperer les donnees du Formulaire
         $solde=$_GET['solde'];
        //Creer un Objet de type Compte
        $compte=new Compte($solde);
        if ($this->compteService->searchCompteByNum($compte->getNumero())==null) {
            $this->compteService->addCompte($compte);
            
        }
        header("location:index.php?page=list");
    }
}