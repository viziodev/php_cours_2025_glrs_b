<?php 
require_once "./../services/CompteService.php";
require_once "./../models/Compte.php";
require_once "./../controllers/Controller.php";
class TransactionController extends Controller{

      public  function __construct()
      {
        $this->compteService=new CompteService();
        $this->callAction();
      }

      public function callAction(){
        $action =$_REQUEST['action']??"list";//form
        switch ( $action) {
           case 'list':
               $this->showTransactions();
               break;
           default:
               # code...
               break;
        }
       }

      public function showTransactions(){
          $this->renderView("transactions/list");
     }
      
}