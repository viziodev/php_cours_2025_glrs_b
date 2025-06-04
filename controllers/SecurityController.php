<?php 
require_once "./../services/UtilisateurService.php";
require_once "./../controllers/Controller.php";
class SecurityController extends Controller{
    private UtilisateurService $userService;
    public  function __construct()
    {
        $this->userService=new UtilisateurService();
        $this->layout="connexion";
        $this->callAction();
    }

    public function callAction(){
        $action =$_REQUEST['action']??"form";//form
        switch ( $action) {
           case 'form':
               $this->loadForm();
               break;
           case 'login':
                $this->login();
                break;
           case 'logout':
                $this->logout();
                   break;
           
           default:
               # code...
               break;
        } 
    }

    public function login(){
          extract($_REQUEST);
          $userConnect= $this->userService->seConnecter($login,$password);
            if ($userConnect==null) {
                header("location:index.php");
                exit;
            }

            if ($userConnect->getRole()=="ADMIN") {
                  header("location:index.php?controller=compte&action=list");
              }
            if($userConnect->getRole()=="Client"){

            }
    }
    public function loadForm(){
        $this->renderView("security/login",[]);
    }

    public function logout(){
        
    }



}