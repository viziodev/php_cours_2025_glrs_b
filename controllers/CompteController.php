<?php 
require_once "./../services/CompteService.php";
require_once "./../models/Compte.php";
require_once "./../controllers/Controller.php";
class CompteController extends Controller{
      public  function __construct()
      {
         $this->compteService=new CompteService();
         $this->callAction();
      }

       public function callAction(){
        $action =$_REQUEST['action']??"list";//form
        switch ( $action) {
           case 'list':
               $this->showList();
               break;
           case 'form':
                $this->loadForm();
                   break;
            case 'create':
                 $this->createCompte();
                       break;
           default:
               # code...
               break;
        }
       }

     public function showList(){
        $numero=$_REQUEST['numero']??"";
        $currentPage=$_REQUEST['page']??1;
       
        $nbrePage=0;
        if(empty($numero)){
            $comptes=$this->compteService->listerCompte($currentPage);
            $nbrePage=$this->compteService->getNbrePage();
        }else{
            $numero=$_REQUEST['numero'];
            $compte=$this->compteService->searchCompteByNum($numero);
            $comptes=[];
            if ($compte!=null) {
                $comptes=[$compte];
                $nbrePage=1;
            }
        }

        $this->renderView("comptes/list",[
            "comptes"=> $comptes,
            "nbrePage"=> $nbrePage,
        ]);
     }

     public function loadForm(){
        $this->renderView("comptes/form");
    }

    public function createCompte(){
        //Recuperer les donnees du Formulaire
           $solde=$_REQUEST['solde'];
          //Creer un Objet de type Compte
           $compte=new Compte($solde);
            $this->compteService->addCompte($compte);

        //Redirection
         header("location:index.php?page=list");
    }
}