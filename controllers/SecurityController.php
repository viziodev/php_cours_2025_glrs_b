<?php 
require_once "./../services/UtilisateurService.php";
require_once "./../controllers/Controller.php";
class SecurityController extends Controller{
    private UtilisateurService $userService;
    public  function __construct()
    {
        parent::__construct();
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
             $userArray= $this->userService->seConnecter($login,$password);
             $userObject=Utilisateur::toUser($userArray);
            if ($userObject==null) {
                header("location:index.php");
                exit;
            }
              $_SESSION['user']=$userArray;      
              header("location:index.php?controller=compte&action=list");
             
    }
    public function loadForm(){
       
        $this->renderView("security/login",[]);
    }

    public function logout(){
        $_SESSION['user']=array();
        unset($_SESSION['user']);
        session_unset();      
        session_destroy();
        header("location:index.php?controller=security&action=form");
    }



}