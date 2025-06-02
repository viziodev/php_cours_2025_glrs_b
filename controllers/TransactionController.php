<?php 
require_once "./../services/CompteService.php";
require_once "./../services/TransactionService.php";
require_once "./../models/Compte.php";
require_once "./../controllers/Controller.php";
class TransactionController extends Controller{
       private CompteService $compteService;
       private TransactionService $transactionService;
      public  function __construct()
      {
        $this->compteService=new CompteService();
        $this->transactionService=new TransactionService();
        $this->callAction();
      }

      public function callAction(){
        $action =$_REQUEST['action']??"list";//form
        switch ( $action) {
           case 'list':
               if(!isset($_REQUEST['id'])){
                header("location:index.php?controller=compte&action=list");
                exit;
                }  
               $this->showTransactions();
               break;
               case 'form':
                if(!isset($_REQUEST['id'])){
                  header("location:index.php?controller=compte&action=list");
                  exit;
                  } 
                 $this->loadForm();
                 break;

                 case 'create':
                  $this->createTransaction();
                        break;
           default:
               # code...
               break;
        }
       }

      public function showTransactions(){
          $id=$_REQUEST['id'];
          $compte=$this->compteService->searchCompteById($id);
          if ($compte==null) {
             header("location:index.php?controller=compte&action=list");
             exit;
          }
         $transactions= $this->transactionService->listerTransactionUnCompte($id);
         $statistiques=$this->transactionService->listerStatistiques($id);
          $this->renderView("transactions/list",[
            "compte"=>$compte,
            "transactions"=>$transactions,
            "statistiques"=>$statistiques
          ]);
     }

     public function loadForm(){
        $id=$_REQUEST['id'];
          $compte=$this->compteService->searchCompteById($id);
          if ($compte==null) {
             header("location:index.php?controller=compte&action=list");
             exit;
          }
        $this->renderView(
          "transactions/form",
          [
            "compte"=>$compte
          ]
      );
     }

     public function createTransaction(){
            extract($_REQUEST);
            $transaction=new Transaction($id,$montant,$type);
            $this->transactionService->addTransaction($transaction);
      //Redirection
       header("location:index.php?controller=transaction&action=list&id=$id");
  }
      
}