<?php 
namespace App\Controllers;

use App\Models\Compte;
use App\Config\Controller;
use App\Services\CompteService;
use App\Services\UtilisateurService;

class CompteController extends Controller{
    private CompteService $compteService;
    private UtilisateurService $userService;
      public  function __construct()
      {
         parent::__construct();
         $this->compteService=new CompteService();
         $this->userService=new UtilisateurService();
         $this->callAction();
      }

       public function callAction(){
        if (!isset($_SESSION['user'])) {
            header("location:index.php");
            exit;
         }
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
        $clientId=$_SESSION['user']['role']=="ADMIN"?null:$_SESSION['user']['id'];
        $nbrePage=0;
        if(empty($numero)){
            $comptes=$this->compteService->listerCompte($clientId,$currentPage);
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
    $data=[
    "comptes"=> $comptes,
    "nbrePage"=> $nbrePage,
    ];
        $this->renderView("comptes/list",$data);
     }

     public function loadForm(){
        $clients= $this->userService->listeClient();
        $this->renderView("comptes/form",[
              "clients"=>$clients
        ]);
    }

    public function createCompte(){
             //1-Recuperer les donnees du Formulaire
              extract($_REQUEST);
             //2-Valider les donnees
             if ($this->validator->isEmpty($titulaire,'titulaire',"Veuiller  Selectionnez le titulaire du compte")){
                    unset($_POST['titulaire']);
             }
             
             if ($this->validator->isEmpty($solde,'solde',"Le Solde est obligatoire") || !$this->validator->isNumber($solde,'solde',"Le solde superieur doit etre superieur a  10000")){
                       unset($_POST['solde']);
             }
             //$erreurs contient des valeurs ==> c'est a dire il y'a erreur
               if ($this->validator->isValid()) {
                  $compte=new Compte($solde,$titulaire);
                  $this->compteService->addCompte($compte);
               }else{
                   $_SESSION['erreurs']= $this->validator->getErreurs();
                   $_SESSION['data']= $_POST;

                   header("location:index.php?controller=compte&action=form");
                   exit;
               }
    
           

        //Redirection
         header("location:index.php?controller=compte&action=list");
         exit;
    }
}